<x-layout>
 <!-- Hero Section -->
    <section class="bg-gray-800 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-2">Welcome 
            @auth
            {{ Auth::user()->username }}
            @endauth
            </h2>
            <p class="text-xl mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla consectetur blanditiis itaque commodi perspiciatis similique, facere, impedit facilis et laborum ducimus maiores excepturi repellat tempora distinctio aut reiciendis unde modi!
            Fugiat sint nemo harum deserunt</p>
          
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
       
    </main>
</x-layout>