@extends('admin.layouts.app')
@section('title')
  Dashboard
@endsection

@section('content')
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Dashboard</h1>
      </div>
      <div class="flex flex-wrap -m-4">
        <div class="xl:w-1/3 md:w-1/2 p-4">
          <div class="border border-gray-200 p-6 rounded-lg">
            <h2 class="flex text-lg text-gray-900 font-medium title-font mb-2">Today's Orders
              <span class="ml-auto">{{ $todayOrders->count() }}</span>
            </h2>
            <div>{{ $todayOrders->sum('todal') }}</div>
          </div>
        </div>
        <div class="xl:w-1/3 md:w-1/2 p-4">
          <div class="border border-gray-200 p-6 rounded-lg">
            <h2 class="flex text-lg text-gray-900 font-medium title-font mb-2">Yesterday's Orders
              <span class="ml-auto">{{ $yesterdayOrders->count() }}</span>
            </h2>
            <div>{{ $yesterdayOrders->sum('todal') }}</div>
          </div>
        </div>
        <div class="xl:w-1/3 md:w-1/2 p-4">
          <div class="border border-gray-200 p-6 rounded-lg">
            <h2 class="flex text-lg text-gray-900 font-medium title-font mb-2">This Month's Orders
              <span class="ml-auto">{{ $monthOrders->count() }}</span>
            </h2>
            <div>{{ $monthOrders->sum('todal') }}</div>
          </div>
        </div>
        <div class="xl:w-1/3 md:w-1/2 p-4">
          <div class="border border-gray-200 p-6 rounded-lg">
            <h2 class="flex text-lg text-gray-900 font-medium title-font mb-2">This year's Orders
              <span class="ml-auto">{{ $yearOrders->count() }}</span>
            </h2>
            <div>{{ $yearOrders->sum('todal') }}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
