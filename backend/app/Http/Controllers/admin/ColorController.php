<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.colors.index')->with([
      'colors' => Color::latest()->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.colors.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddColorRequest $request)
  {
    if ($request->validated()) {
      Color::create($request->validated());
      return redirect()->route('admin.colors.index')->with([
        'success' => 'Color has been added!!!'
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
  public function edit(color $color)
  {
    return view('admin.colors.edit')->with([
      'color' => $color
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateColorRequest $request, color $color)
  {
    if ($request->validated()) {
      $color->update($request->validated());
      return redirect()->route('admin.colors.index')->with([
        'success' => 'Color has been updated!!!'
      ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(color $color)
  {
    $color->delete();
    return redirect()->route('admin.colors.index')->with([
      'success' => 'Color has been deleted!!!'
    ]);
  }
}
