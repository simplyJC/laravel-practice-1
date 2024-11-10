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
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Events\UserSubscribed;


class PostController extends Controller implements HasMiddleware
{
    public static  function  middleware(): array
    {
        return [
            new  Middleware(['auth', 'verified'], except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //event (new  UserSubscribed('Jaycee'));
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
        //Store Images
        $path = null;
        if($request->hasFile('image')) {
            $path = Storage::disk('public')->put('post_images', $request->image);

        }
        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);

        //Send Email
        Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(),  $post));
        

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
            'image' => ['nullable', 'file', 'max:4024', 'mimes:jpg,jpeg,png'],
        ]);
        //Store Images
         $path = $post->image ?? null;
        if($request->hasFile('image')) {
            if($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = Storage::disk('public')->put('post_images', $request->image);

        }
       //dd($fields);
       $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post Updated successfully');
       //return back()->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Gate::authorize('modify', $post);
  
        if($post->image) {
            Storage::disk('public')->delete($post->image);

        }
        $post->delete();
        return back()->with('delete', 'Post deleted successfully');
        //
    }
}
