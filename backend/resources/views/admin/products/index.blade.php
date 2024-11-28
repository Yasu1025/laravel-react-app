@extends('admin.layouts.app')
@section('title')
  Products
@endsection

@section('content')
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-6">
        <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Products({{ $products->count() }})</h1>
      </div>
      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
        <div class="flex ml-auto">
          <a href="{{ route('admin.products.create') }}"
            class="ml-auto mb-4 text-white bg-indigo-400 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">+
            Create
            New Products</a>
        </div>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th
                class="w-10 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
              </th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
              <th class="title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                Colors
              </th>
              <th class="title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                Sizes
              </th>
              <th class="title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                Qty
              </th>
              <th class="title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                Price
              </th>
              <th class="title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                Image
              </th>
              <th class="title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                Status
              </th>
              <th
                class="w-10 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
              </th>
              <th
                class="w-10 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $key => $p)
              <tr>
                <td class="px-4 py-3">{{ $key + 1 }}</td>
                <td class="px-4 py-3">{{ $p->name }}</td>
                <td class="px-4 py-3">
                  @foreach ($p->colors as $color)
                    <span>{{ $color->name }}</span>
                  @endforeach
                </td>
                <td class="px-4 py-3">
                  @foreach ($p->sizes as $size)
                    <span>{{ $size->name }}</span>
                  @endforeach
                </td>
                <td class="px-4 py-3">{{ $p->qty }}</td>
                <td class="px-4 py-3">{{ $p->price }}</td>
                <td class="px-4 py-3">
                  <img src="{{ asset($p->thumbnail) }}" alt="{{ $p->name }}" width="30" height="30" />
                  @if ($p->first_image)
                    <img class="mt-1" src="{{ asset($p->first_image) }}" alt="{{ $p->name }}" width="30"
                      height="30" />
                  @endif
                  @if ($p->second_image)
                    <img class="mt-1" src="{{ asset($p->second_image) }}" alt="{{ $p->name }}" width="30"
                      height="30" />
                  @endif
                  @if ($p->third_image)
                    <img class="mt-1" src="{{ asset($p->third_image) }}" alt="{{ $p->name }}" width="30"
                      height="30" />
                  @endif
                </td>
                <td class="px-4 py-3">
                  @if ($p->status)
                    <span>In stock</span>
                  @else
                    <span>Out of stock</span>
                  @endif
                </td>
                <td class="w-10 text-center">
                  <a href="{{ route('admin.products.edit', $p->slug) }}"
                    class="flex text-white bg-indigo-400 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-pencil" viewBox="0 0 16 16">
                      <path
                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                    </svg>
                  </a>
                </td>
                <td class="w-10 text-center">
                  <form id="{{ 'product-' . $p->slug }}" method="POST"
                    action="{{ route('admin.products.destroy', $p->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="flex text-white bg-red-400 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash3" viewBox="0 0 16 16">
                        <path
                          d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                      </svg>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
