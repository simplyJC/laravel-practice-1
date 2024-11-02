<x-layout>
 <!-- Hero Section -->
    <section class="bg-gray-800 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-2">Welcome to My Laravel App</h2>
            <p class="text-xl mb-8">This is a beautiful welcome page built with Tailwind CSS.</p>
            <a href="#" class="bg-white text-gray-800 font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider hover:bg-gray-200">
                Get Started
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Services</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Service 1</h4>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Service 2</h4>
                <p class="text-gray-600">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Service 3</h4>
                <p class="text-gray-600">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
            </div>
        </div>
    </main>
</x-layout>