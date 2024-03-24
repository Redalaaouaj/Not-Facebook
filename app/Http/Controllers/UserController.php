<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function showPosts()
    // {

    //     $user = Auth::user();
    //     $route = request()->route()->getName();

    //     if (request()->has('title')) {
    //         $posts = Post::whereHas('user', function ($query) {
    //             $query->where('title', 'like', '%' . request()->query('title') . '%');
    //         })->get();
    //     } 
    //     elseif ($route === 'posts.show') { 
    //         $posts = User::find($user->id)->posts()->get();
    //     } 
    //     else {
    //         $posts = Post::all();
    //     }

    //     return view('posts.show', compact('posts'));
    // }
    
}
