<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('dd4you/dpanel/js/cute-alert/style.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    @yield('body_content')

    @vite('resources/js/app.js')

    <script src="{{ asset('dd4you/dpanel/js/cute-alert/cute-alert.js') }}"></script>

    <script>
        @if (Session::has('success'))
            cuteToast({
                type: "success",
                message: "{{ session('success') }}",
            })
        @endif

        @if (Session::has('error'))
            cuteToast({
                type: "error",
                message: "{{ session('error') }}",
            })
        @endif

        @if (Session::has('info'))
            cuteToast({
                type: "info",
                message: "{{ session('info') }}",
            })
        @endif

        @if (Session::has('warning'))
            cuteToast({
                type: "warning",
                message: "{{ session('warning') }}",
            })
        @endif
    </script>
    @stack('scripts')

</body>

</html>
