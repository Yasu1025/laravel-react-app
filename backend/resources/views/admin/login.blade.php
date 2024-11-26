<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Login for Admin</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        @session('error')
          <p class="text-center text-red-500">{{ session('error') }}</p>
        @endsession
        <form method="POST" action="{{ route('admin.auth') }}">
          @csrf
          <div class="w-96 mx-auto">
            <div class="p-2">
              <div class="relative">
                <label for="email" class="leading-7 text-sm text-gray-600">email</label>
                <input type="email" id="email" name="email" placeholder="admin@email.com"
                  value="{{ old('email') ?? '' }}"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('email')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="p-2">
              <div class="relative">
                <label for="password" class="leading-7 text-sm text-gray-600">password</label>
                <input type="password" id="password" name="password" placeholder="your password"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @error('password')
                <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="p-2 w-full">
              <button type="submit"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Log
                in</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>
