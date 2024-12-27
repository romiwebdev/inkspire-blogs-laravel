<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkspire</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&family=JetBrains+Mono&display=swap" rel="stylesheet">
    <!-- Tambahkan di dalam tag <head> di layout anda -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<!-- Di dalam file layout/head -->
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMzI4NkY1IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PHBhdGggZD0iTTkuNjYzIDE3aDQuNjczTTEyIDN2MW02LjM2NCAxLjYzNmwtLjcwNy43MDdNMjEgMTJoLTFNNCAxMkgzbTMuMzQzLTUuNjU3bC0uNzA3LS43MDdtMi44MjggOS45YTUgNSAwIDExNy4wNzEgMGwtLjM0NC4zNDRhMi41IDIuNSAwIDAxLTMuNTM2IDBsLS4zNDQtLjM0NHoiLz48L3N2Zz4=">

</head>
<body class="bg-gray-900 text-gray-100">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Content --}}
    <main class="py-20"> 
    @yield('content')
</main>


    {{-- Footer --}}
    @include('components.footer')


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

</body>
</html>
