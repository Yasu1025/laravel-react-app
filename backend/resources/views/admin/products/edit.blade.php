@extends('admin.layouts.app')
@section('title')
  Product edit
@endsection

@section('content')
  <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-6">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit Product</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="w-96 mx-auto">
            <div class="pb-4">
              <div class="relative">
                <label for="name" class="leading-7 text-sm text-gray-600">name</label>
                <input type="text" id="name" name="name" placeholder="product name"
                  value="{{ $product->name }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('name')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="qty" class="leading-7 text-sm text-gray-600">Quantity</label>
                <input type="number" id="qty" name="qty" placeholder="Quantity" value="{{ $product->qty }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('qty')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                <input type="number" id="price" name="price" placeholder="Price" value="{{ $product->price }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('price')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="color_id" class="leading-7 text-sm text-gray-600">Colors</label>
                <select name="color_id[]" id="color_id"
                  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded"
                  multiple>
                  @foreach ($colors as $color)
                    <option @if (collect(old('color_id'))->contains($color->id) || $product->colors->contains($color->id)) selected @endif value="{{ $color->id }}">
                      {{ $color->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('color_id')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="size_id" class="leading-7 text-sm text-gray-600">Sizes</label>
                <select name="size_id[]" id="size_id"
                  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded"
                  multiple>
                  @foreach ($sizes as $size)
                    <option @if (collect(old('size_id'))->contains($size->id) || $product->sizes->contains($size->id)) selected @endif value="{{ $size->id }}">
                      {{ $size->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('size_id')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="desc" class="leading-7 text-sm text-gray-600">Description</label>
                <textarea id="desc" name="desc" placeholder="Description"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $product->desc }}</textarea>
                @error('desc')
                  <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="thumbnail" class="leading-7 text-sm text-gray-600">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" placeholder="thumbnail"
                  value="{{ old('thumbnail') ?? '' }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('thumbnail')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>

            <div class="pb-4">
              <div class="relative">
                <label for="first_image" class="leading-7 text-sm text-gray-600">First Image</label>
                <input type="file" id="first_image" name="first_image" placeholder="first_image"
                  value="{{ old('first_image') ?? '' }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('first_image')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="second_image" class="leading-7 text-sm text-gray-600">Second Image</label>
                <input type="file" id="second_image" name="second_image" placeholder="second_image"
                  value="{{ old('second_image') ?? '' }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('second_image')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="pb-4">
              <div class="relative">
                <label for="third_image" class="leading-7 text-sm text-gray-600">Third Image</label>
                <input type="file" id="third_image" name="third_image" placeholder="third_image"
                  value="{{ old('third_image') ?? '' }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('third_image')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>


            <div class="p-2 w-full">
              <button type="submit"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update
                Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
