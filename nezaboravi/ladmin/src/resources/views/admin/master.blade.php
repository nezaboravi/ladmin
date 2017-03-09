<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Admin">
    <title>Nezaboravi::Ladmin</title>
    <!-- EXTERNAL CSS HERE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nezaboravi/css/app.css') }}">
    <!-- END EXTERNAL CSS
    <!-- ADDITIONAL PAGE CSS HERE -->
    @yield('css')
    <!-- END OF ADDITIONAL PAGE CSS HERE -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token(), ]) !!};
    </script>
</head>
<body>
    <div id='app'>
        @yield('content')
    </div>

    <!-- EXTERNAL JS HERE -->
    <script src="{{ asset('nezaboravi/js/app.js') }}"></script>
    <!-- END OF EXTERNAL JS HERE -->
    <!-- LOCAL JS HERE -->
    @yield('js')
    <!-- END OF LOCAL JS HERE -->
</body>
</html>