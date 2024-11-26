<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin - @yield('title')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="/css/color.css">
  @if (isset($script))
    {{ $script }}
  @endif
</head>

<body class="font-sans antialiased background-color">
  <div class="min-h-screen">
    @include('admin.layouts.header')

    <!-- Page Content -->
    <main class="container mx-auto py-8">
      @yield('content')
    </main>
  </div>
</body>
<script>
  $(document).ready(function() {
    //datatables
    $('.table').DataTable();
    //summernote
    $('.summernote').summernote();
    //Display summernote dropdown menu
    $('.dropdown-toggle').dropdown();
  });

  function deleteItem(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(id).submit();
      }
    });
  }
</script>
<script src="{{ asset('js/colors.js') }}"></script>
<script>
  function readUrl(input, image) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(image).classList.remove('d-none');
        document.getElementById(image).setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function handleImageInputChanged(input, image) {
    document.getElementById(input).addEventListener('change', function() {
      readUrl(this, image);
    });
  }

  handleImageInputChanged('thumbnail', 'thumbnail_preview');
  handleImageInputChanged('first_image', 'first_image_preview');
  handleImageInputChanged('second_image', 'second_image_preview');
  handleImageInputChanged('third_image', 'third_image_preview');
</script>

</html>
