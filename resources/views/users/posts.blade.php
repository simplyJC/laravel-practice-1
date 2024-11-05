<x-layout>
    {{--container--}}
    <div class="container  flex flex-col mx-auto px-6 max-w-300  gap-3">        

    <h1 class="uppercase text-3xl text-center m-6">{{$user->username}} <span class="text-xl lowercase text-gray-600">has  {{$posts->count()}} {{$posts->count() == 1 ? 'post' : 'posts'}} of {{$posts->total()}}  </span> </h1> 
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
             @foreach ($posts as $post)
            <x-postCard :post="$post"/>
            @endforeach
        </div>
        <div>
            {{--display Pagination links--}}
            {{$posts->links()}}
        </div>
    </div>
</x-layout>