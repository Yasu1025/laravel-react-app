@extends('admin.layouts.app')
@section('title')
  Size edit
@endsection

@section('content')
  <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-6">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit size</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('admin.sizes.update', $size->id) }}">
          @csrf
          @method('PUT')
          <div class="w-96 mx-auto">
            <div class="pb-4">
              <div class="relative">
                <label for="name" class="leading-7 text-sm text-gray-600">name</label>
                <input type="name" id="name" name="name" placeholder="size name" value="{{ $size->name }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('name')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="p-2 w-full">
              <button type="submit"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add
                Size</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
