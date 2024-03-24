<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('test/{nick?}',function($nick=""){
//     $name = 'reda';
//     $skills = ['HTML','CSS','PHP'];
//     // return view('test',['name' => $name, 'skills' => $skills]);
//     return view('test',compact('name','skills','nick'));
// });

// Route::get('posts',[PostController::class, 'index'])->name('posts.index');
// Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
// Route::post('posts',[PostController::class,'store'])->name('posts.store');
// Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
// Route::patch('posts/{post}',[PostController::class,'update'])->name('posts.update');
// Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');
// Route::delete('posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('posts', PostController::class)->except('show');
Route::get('/user/posts', PostController::class.'@showPosts')->name('posts.show');

Route::get('/login',[LoginController::class, 'form'])->name('login.form');
Route::post('/login',[LoginController::class, 'connect'])->name('login.connect');
Route::get('/signUp', LoginController::class . '@signUp')->name('login.signUpForm'); // different way to call the controller
Route::post('/signUp',[LoginController::class, 'register'])->name('login.register');
Route::get('/logout',[LoginController::class, 'logout'])->name('login.logout');


Route::get('/',function(){ 
    return to_route('posts.index');
})->middleware('redirect');
