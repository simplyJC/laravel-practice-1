{{--Email--}}

<h1>
    Hi  {{$user->username}}, 
</h1>
<div>
    <h2>You creatad {{ $post->title }}</h2>
    <p></p>{{$post->body}}</p>
    <img src="{{asset('storage/'.$post->image)}}">
</div>