
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset = "utf-8">
  <title>@yield('pageTitle'){{ config('app.name', 'Personal Gallery') }}</title>
  <meta name = "description" content = "personal gallery for PNG images only.">
  <meta name = "author" content = "Ismael Ochoa Pelayo">
  <link rel = "stylesheet" href = "{{ asset('css/styles.css?v=1.0') }}">
</head>
<body>
    @yield('content')
    <div class="footer">
    Ismael Ochoa Pelayo - Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</body>
</html>