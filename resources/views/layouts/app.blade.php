<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- javascript to run tailwind sss --}}
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

    <title>Electronic Parts Manager</title>
</head>
<body>
    <header class="row">
        @include('layouts.header')
    </header>
        @yield('content')
    <footer class="row">
        @include('layouts.footer')
    </footer>
    {{-- javascript to run tailwind sss --}}
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
</body>
</html>
