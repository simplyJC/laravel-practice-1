<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ env('APP_NAME') }} </title>
</head>
<body class="bg-gray-100  h-screen w-full">
    <nav class="bg-blue-600 p-4 shadow-lg">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo or Brand Name -->
        <div class="text-white text-2xl font-semibold">
            <a href="/">{{env('APP_NAME')}}</a>
        </div>

        <!-- Navigation Links for Desktop -->
        <div class="hidden md:flex space-x-6">
            <a href="{{route('home');}}" class="text-white hover:text-blue-200">Home</a>
            <a href="{{route('register')}}" class="text-white hover:text-blue-200">Register</a>
            <a href="/services" class="text-white hover:text-blue-200">Services</a>
            <a href="/contact" class="text-white hover:text-blue-200">Contact</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="nav-toggle" class="text-white focus:outline-none">
                <!-- This will be the icon -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Links -->
    <div id="mobile-menu" class="md:hidden mt-2 space-y-2 px-4 hidden">
        <a href="/" class="block text-white hover:bg-blue-700 py-2 rounded">Home</a>
        <a href="/about" class="block text-white hover:bg-blue-700 py-2 rounded">About</a>
        <a href="/services" class="block text-white hover:bg-blue-700 py-2 rounded">Services</a>
        <a href="/contact" class="block text-white hover:bg-blue-700 py-2 rounded">Contact</a>
    </div>
</nav>

    {{ $slot }}
</body>
<script>
    document.getElementById('nav-toggle').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>

</html>