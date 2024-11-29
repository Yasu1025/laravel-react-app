<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  // Get all the products
  public function index()
  {
    return ProductResource::collection(
      Product::with(['colors', 'sizes', 'reviews'])->latest()->get()
    )->additional([
      'colors' => Color::has('products')->get(),
      'sizes' => Size::has('products')->get()
    ]);
  }

  // Get the product by slug
  public function show(Product $product)
  {
    if (!$product) {
      abort(404);
    }
    return ProductResource::make(
      $product->load(['colors', 'sizes', 'reviews'])
    );
  }

  // Filter products by color
  public function filterProductByColor(Color $color)
  {
    return ProductResource::collection(
      $color->products()->with(['colors', 'sizes', 'reviews'])->latest()->get()
    )->additional([
      'colors' => Color::has('products')->get(),
      'sizes' => Size::has('products')->get()
    ]);
  }

  // Filter products by size
  public function filterProductBySize(Size $size)
  {
    return ProductResource::collection(
      $size->products()->with(['colors', 'sizes', 'reviews'])->latest()->get()
    )->additional([
      'colors' => Color::has('products')->get(),
      'sizes' => Size::has('products')->get()
    ]);
  }

  // Search for products by term
  public function findProductByTerm(string $searchTerm)
  {
    return ProductResource::collection(
      Product::where('name', 'LIKE', '%' . $searchTerm . '%')
        ->with(['colors', 'sizes', 'reviews'])->latest()->get()
    )->additional([
      'colors' => Color::has('products')->get(),
      'sizes' => Size::has('products')->get()
    ]);
  }
}
