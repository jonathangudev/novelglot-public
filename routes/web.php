<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('readerposts', ['posts' => Post::all()]);
});

Route::get('/about', function () {
    return view('about', ['posts' => Post::all()]);
});

Route::get('/dashboard', function () {
    return view('dashboard',  ['posts' => Post::all()]);
})->middleware(['auth'])->name('dashboard');

Route::post('/create', function () {

    if (Auth::user()->id != 1) {
        return redirect('/');
    }

    $post = new Post;

    $post->user_id = Auth::user()->id;

    $post->title = request()->title;
    $post->slug = Str::slug(request()->title, "-");

    $post->content = request()->content;
    $post->category_id = 1;

    $post->save();

    return redirect('/');
})->middleware(['auth']);

Route::get('/posts/{slug}', function ($slug) {
    return view('post', ['post' => Post::where('slug','=',$slug)->first()]);
});

Route::get('posts/edit/{id}', function($id) {
    return view('edit', ['post' => Post::where('id','=',$id)->first()]);
}) ;

Route::post('posts/edit/{id}', function($id) {
    if (Auth::user()->id != 1) {
        return redirect('/');
    }

    $post = Post::where('id','=',$id)->first();
    $post->title = request()->title;
    $post->slug = Str::slug(request()->title, "-");

    $post->content = request()->content;

    $post->save();

    return redirect('/');
})->middleware(['auth']);

require __DIR__.'/auth.php';
