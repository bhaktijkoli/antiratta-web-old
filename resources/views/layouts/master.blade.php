<!DOCTYPE html>
@yield('pre')
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title or config('app.name') }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  @yield('css')
</head>
<body>
  <div id="app">
    @yield('content')
  </div>
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  @yield('post')
</body>
</html>
