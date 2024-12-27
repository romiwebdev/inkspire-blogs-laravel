<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional CSS -->
    @stack('styles')

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMzI4NkY1IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PHBhdGggZD0iTTkuNjYzIDE3aDQuNjczTTEyIDN2MW02LjM2NCAxLjYzNmwtLjcwNy43MDdNMjEgMTJoLTFNNCAxMkgzbTMuMzQzLTUuNjU3bC0uNzA3LS43MDdtMi44MjggOS45YTUgNSAwIDExNy4wNzEgMGwtLjM0NC4zNDRhMi41IDIuNSAwIDAxLTMuNTM2IDBsLS4zNDQtLjM0NHoiLz48L3N2Zz4=">

</head>
<body>

    <div>
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Additional JavaScript -->
    @stack('scripts')

    <!-- Alpine.js (Optional but recommended for interactivity) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
