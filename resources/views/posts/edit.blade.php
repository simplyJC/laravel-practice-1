<x-layout>
    {{-- Edit Post --}}
    <div class="container px-6 mx-auto grid">
        <div class="container m-6">
            <a href="{{route('dashboard');}}" class="text-black hover:text-blue-200">&larr; Back to  Dashboard</a>
            <h1 class="text-3xl text-center m-6">Edit Post</h1>
            <form action="{{ route('posts.update', $post) }}" method="POST"  >
                @csrf
                @method('PUT')
                {{--Title --}}
                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" class="w-full p-3 text-gray-700 bg-white border border-gray-300 rounded-lg @error('title') border-red-500 @enderror" value="{{ $post->title}}"/>

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                 {{--Body --}}
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body"  rows="5" placeholder="Body" class="w-full p-3 text-gray-700 bg-white border border-gray-300 rounded-lg @error('body') border-red-500 @enderror">{{ $post->body}}</textarea>
                    @error('body')     
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                   @enderror
                </div>
            
                <button  class="w-full p-3 text-white bg-blue-500 rounded-lg">Update Post</button>
            </form>
        </div>
    </div>
</x-layout>