<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }

    </style>
</head>

<body class="gradient-custom">
    <div id="app">
        <div id="content">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('custom-js')
</body>

</html>
