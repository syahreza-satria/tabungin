<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TabungIn</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>

    <body class="flex min-h-screen items-center justify-center bg-gray-50 p-4 font-sans antialiased lg:p-8">
        @yield('content')

        @stack('scripts')
    </body>

</html>
