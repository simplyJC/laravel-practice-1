@props (['post'])

<div class="bg-white p-6 rounded-lg shadow-lg ">
    <h4 class="text-xl font-bold text-gray-800 mb-2">{{$post->title}}</h4>
        <div class="text-gray-600 mb-4"><span class="text-gray-800 text-sm ">Posted {{$post->created_at->diffForHumans()}} by:</span> 
            <a href="#" class="text-blue-500 hover:text-blue-700">User</a>
        </div>
        <p class="text-gray-600">{{Str::words($post->body, 15)}}</p>
 </div>