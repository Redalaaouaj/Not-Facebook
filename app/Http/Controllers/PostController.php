<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function showPosts()
    {
        $user = Auth::user();
        $route = request()->route()->getName();

        if ($route == 'posts.show') {
            $posts = Post::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

            return view('posts.show', compact('posts'));
        }
        $posts = User::find($user->id)->posts()->orderBy('updated_at', 'desc')->get();
        return view('posts.show', compact('posts'));
    }
    public function index()
    {

        // if (request()->has('title')) {
        //     $posts = Post::whereHas('user', function ($query) {
        //         $query->where('title', 'like', '%' . request()->query('title') . '%');
        //     })->get();
        // } else {
        //     $posts = Post::all();
        // }
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $validatedData = request()->validate([
            'title' => 'required|string|max:20',
            'description' => 'required|min:10',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Post::create($validatedData);

        return redirect()->route('posts.show')->with('success', 'Created Succefully ✔');
    }
    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        return view('posts.edit', compact('post'));
    }
    public function update(Post $post)
    {
        $this->authorize('update',$post);

        $validatedData = request()->validate([
            'title' => 'required|string|max:20',
            'description' => 'required|min:10',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $post->update($validatedData);
        return redirect()->route('posts.show');
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);

        $post->delete();
        return redirect()->route('posts.show')->with('success', 'Deleted Succefully ✔');
    }
}
