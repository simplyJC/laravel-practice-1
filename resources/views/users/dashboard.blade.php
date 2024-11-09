<x-layout>

    <section class="bg-gray-800 text-white py-20">
        <div class="container flex flex-col justify-center p-4 mx-auto md:p-10">
        <div class="container mx-auto px-6 w-2/4">
            <h2 class="text-4xl font-bold mb-2 pb-4 ">Welcome
            @auth
            {{ Auth::user()->username }}
            @endauth
            </h2>
            {{-- <p class="text-xl mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla consectetur blanditiis itaque commodi perspiciatis similique, facere, impedit facilis et laborum ducimus maiores excepturi repellat tempora distinctio aut reiciendis unde modi!
            Fugiat sint nemo harum deserunt</p>
           --}}
            {{--Create a Post Form --}}
            @if (session('success'))
                     <x-flashMessage message="{{session('success')}}" bg_color="bg-green-500"/>
                     @elseif (session('delete'))
                     <x-flashMessage message="{{session('delete')}}" bg_color="bg-red-500"/>
            @endif
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{--Title --}}
                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" class="w-full p-3 text-gray-700 bg-white border border-gray-300 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title')}}"/>

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                 {{--Body --}}
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body"  rows="5" placeholder="Body" class="w-full p-3 text-gray-700 bg-white border border-gray-300 rounded-lg @error('body') border-red-500 @enderror"></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--Image --}}
                <div class="mb-4">
                    <label for="image" class="sr-only">Image</label>
                    <input type="file" name="image" id="image" class="w-full p-3 text-gray-700 bg-white border border-gray-300 rounded-lg">
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full p-3 text-white bg-blue-500 rounded-lg">Create Post</button>
            </form>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6  p-9">
             @foreach ($posts as $post)
            {{-- <div class="bg-white p-6 rounded-lg shadow-lg ">
                <h4 class="text-xl font-bold text-gray-800 mb-2">{{$post->title}}</h4>
                <div class="text-gray-600 mb-4"><span class="text-gray-800 text-sm ">Posted {{$post->created_at->diffForHumans()}} by:</span>
                <a href="#" class="text-blue-500 hover:text-blue-700">User</a>
                </div>
                <p class="text-gray-600">{{Str::words($post->body, 15)}}</p>
            </div> --}}
            <x-postCard :post="$post">
                {{--edit--}}
                <a href="{{route('posts.edit', $post)}}" class="text-blue-500 hover:text-blue-700">Edit</a>

                {{--delete--}}

               <form  action="{{route('posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
            </form>
            </x-postCard>
            @endforeach
        </div>
         <div>
            {{--display Pagination links--}}
            {{$posts->links()}}
        </div>
        </div>
    </section>




</x-layout>
