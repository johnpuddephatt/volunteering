<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Volunteer Wakefield') }}</title>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EX0654F52T"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-EX0654F52T');
    </script>
    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
  </head>
  <body>
    {{-- <button id="record-screen" style="width:1em;height: 1em; position:fixed; z-index:9999;padding:0;top: 0; left: 0;">o</button> --}}
    <div id="app">

      @include('components.navbar')

      <main class="background background__{{$view_name}}">
        @yield('content')
      </main>

      @if(!in_array($view_name, ['auth-login', 'auth-register']))
        @include('components.footer')
      @endif

    </div>

    @include('components.flash-message')

    @stack('scripts')
  </body>
</html>
