<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Color;
use App\Models\product;
use App\Models\Size;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.products.index')->with([
      'products' => Product::with(['colors', 'sizes'])->latest()->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $colors = Color::all();
    $sizes = Size::all();
    return view('admin.products.create')->with([
      'colors' => $colors,
      'sizes' => $sizes,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddProductRequest $request)
  {
    if ($request->validated()) {
      $data = $request->all();
      $image_keys = ['thumbnail', 'first_image', 'second_image', 'third_image'];
      foreach ($image_keys as $image_key) {
        if ($request->has($image_key)) {
          $data[$image_key] = $this->saveImage($request->file($image_key));
        }
      }

      $data['slug'] = Str::slug($request->name);

      $product = Product::create($data);
      // For intermediate table
      $product->colors()->sync($request->color_id);
      $product->sizes()->sync($request->size_id);
      return redirect()->route('admin.products.index')->with([
        'success' => 'Product has been added!!!'
      ]);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    $colors = Color::all();
    $sizes = Size::all();
    return view('admin.products.edit')->with([
      'product' => $product,
      'colors' => $colors,
      'sizes' => $sizes,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, Product $product)
  {
    if ($request->validated()) {
      $data = $request->all();
      $image_keys = ['thumbnail', 'first_image', 'second_image', 'third_image'];
      foreach ($image_keys as $image_key) {
        if ($request->has($image_key)) {
          $this->removeImageFromStorage($product->$image_key);
          $data[$image_key] = $this->saveImage($request->file($image_key));
        }
      }

      $data['slug'] = Str::slug($request->name);

      $product->update($data);
      // For intermediate table
      $product->colors()->sync($request->color_id);
      $product->sizes()->sync($request->size_id);
      return redirect()->route('admin.products.index')->with([
        'success' => 'Product has been updated!!!'
      ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    $this->removeImageFromStorage($product->thumbnail);
    $this->removeImageFromStorage($product->first_image);
    $this->removeImageFromStorage($product->second_image);
    $this->removeImageFromStorage($product->third_image);

    $product->delete();
    return redirect()->route('admin.products.index')->with([
      'success' => 'Product has been deleted!!!'
    ]);
  }

  // private ------------------------------------
  private function saveImage($file): string
  {
    $image_name = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('images/products/', $image_name, 'public');
    return 'storage/images/products/' . $image_name;
  }

  private function removeImageFromStorage($file)
  {
    $path = public_path($file);
    if (File::exists($path)) {
      File::delete($path);
    }
  }
}
