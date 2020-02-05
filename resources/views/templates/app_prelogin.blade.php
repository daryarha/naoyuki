<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <title> Naoyuki Academic Center</title>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>

  <body style="background: url('{{ asset('storage/img/Japan.jpg') }}') center center no-repeat;
  background-size: cover;
  background-color: rgba(117,31,34,0.7);
  height: 100vh;">
      @yield('content')
    <footer class="fixed-bottom mb-3">
      <div class="text-center">   
        Naoyuki Academic Center &copy; 2019.
      </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
  </body>
</html>