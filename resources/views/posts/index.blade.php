<x-layout>
 <!-- Hero Section -->
    <section class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-2">Welcome 
            @auth
            {{ Auth::user()->username }}
            @endauth
            @guest 
            Guest Login
            @endguest</h2>
            <p class="text-xl mb-8">Lorem ipsum dolor, sit amet .</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Latest  Posts</h3>
       
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
             @foreach ($posts as $post)
            {{-- <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="text-xl font-bold text-gray-800 mb-2">{{$post->title}}</h4>
                <div class="text-gray-600 mb-4"><span class="text-gray-800 text-sm ">Posted {{$post->created_at->diffForHumans()}} by:</span> 
                <a href="#" class="text-blue-500 hover:text-blue-700">User</a>
                </div>
                <p class="text-gray-600">{{Str::words($post->body, 15)}}</p>
            </div> --}}
            <x-postCard :post="$post"/>
            @endforeach
        </div>
        <div>
            {{--display Pagination links--}}
            {{$posts->links()}}
        </div>
    
    </main>
</x-layout>