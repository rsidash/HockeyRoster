<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hockey Roster App</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
{{--    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">--}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Favicons -->

    <!-- Custom styles for this template -->
    <link href={{ URL::asset('/css/outline-btn.css') }} rel="stylesheet">
    <!-- JS -->
{{--    @stack('scripts')--}}
    @yield('scripts')

    @yield('css')

</head>

@yield('body')
</html>
