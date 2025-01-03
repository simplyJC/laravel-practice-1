@props (['post', 'full' =>false])

<div class="bg-white p-6 rounded-lg shadow-lg ">
    <h4 class="text-xl font-bold text-gray-800 mb-2">{{$post->title}}</h4>
        {{--Image--}}
        <div>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            @else
                <img src="{{ asset('storage/post_images/default.jpg') }}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            @endif
        </div>
        {{--Title--}}
        <div class="text-gray-600 mb-4"><span class="text-gray-800 text-sm ">Posted {{$post->created_at->diffForHumans()}} by:</span> 
            <a href="{{route('posts.user',  $post->user)}}" class="text-blue-500 hover:text-blue-700">
                {{$post->user->username}}
            </a>
        </div>
        {{--Body--}}
        @if ($full)
            <div class="text-gray-800">
                <span>{{ $post->body }}</span>
            </div>
            
        @else
            <span class="text-gray-600">{{Str::words($post->body, 15)}}</span>
            <a href="{{route('posts.show', $post)}}" class="text-blue-500 hover:text-blue-700">Read More &rarr;</a>
        @endif
       

    <div class="text-red-500  flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>
 </div>