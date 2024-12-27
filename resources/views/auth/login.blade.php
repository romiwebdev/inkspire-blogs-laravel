<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&family=JetBrains+Mono&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMzI4NkY1IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PHBhdGggZD0iTTkuNjYzIDE3aDQuNjczTTEyIDN2MW02LjM2NCAxLjYzNmwtLjcwNy43MDdNMjEgMTJoLTFNNCAxMkgzbTMuMzQzLTUuNjU3bC0uNzA3LS43MDdtMi44MjggOS45YTUgNSAwIDExNy4wNzEgMGwtLjM0NC4zNDRhMi41IDIuNSAwIDAxLTMuNTM2IDBsLS4zNDQtLjM0NHoiLz48L3N2Zz4=">
    <!-- Tambahkan di dalam tag <head> di layout anda -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

</head>
<body class="bg-gray-900 text-gray-100">
<section class="bg-gray-900 text-gray-100">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
  <a href="#" class="flex items-center mb-6 relative text-2xl font-semibold text-blue-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-2" viewBox="0 0 24 24" fill="none">
        <path 
            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.071 0l-.344.344a2.5 2.5 0 01-3.536 0l-.344-.344z" 
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round" 
            stroke-linejoin="round"
            class="text-blue-600"
        />
    </svg>
    INKSPIRE    
    <!-- Animasi Lingkaran -->
    <div class="absolute inset-0 animate-ping rounded-full bg-blue-500 opacity-25 w-16 h-16 -top-2 -left-2"></div>
</a>
@if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif
      <div class="w-full bg-gray-800 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-900 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-100 md:text-2xl">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" method="POST" action="{{ url('login') }}">
                  @csrf
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-100">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-700 border border-gray-600 text-gray-100 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400" placeholder="name@company.com" required>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-100">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-gray-100 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400" required>
                  </div>
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                  <p class="text-sm font-light text-gray-400">
                      Don’t have an account yet? <a href="{{ url('register') }}" class="font-medium text-primary-600 hover:underline">Sign up</a>
                  </p>
              </form>
              <div style="margin-top: 10px;">
                  <a href="{{ url('/') }}" style="text-decoration: none; color: blue;">&#8592; Kembali ke Home</a>
              </div>
          </div>
      </div>
  </div>
</section>
</body>
</html>
