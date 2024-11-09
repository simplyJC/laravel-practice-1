<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller implements HasMiddleware
{
    public static  function  middleware(): array
    {
        return [
            new  Middleware('auth', except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::latest()->paginate(5);
        // dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // Storage::disk('public')->put('post_images', $request->image);
        //dd("ok");
        // dd(Auth::user()->posts());
     $request -> validate([
            'title' => ['required','max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:4024', 'mimes:jpg,jpeg,png'],
        ]);
        $path = null;
        if($request->hasFile('image')) {
            $path = Storage::disk('public')->put('post_images', $request->image);

        }
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);

        return back()->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('posts.show', ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        Gate::authorize('modify', $post);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    //    dd($post);

        Gate::authorize('modify', $post);
         $fields = $request -> validate([
            'title' => ['required','max:255'],
            'body' => ['required'],
        ]);

       //dd($fields);
       $post->update($fields);
        return redirect()->route('dashboard')->with('success', 'Post Updated successfully');
       //return back()->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Gate::authorize('modify', $post);
         $post->delete();

        return back()->with('delete', 'Post deleted successfully');
        //
    }
}
