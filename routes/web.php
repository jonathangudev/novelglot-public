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
    $posts = cache()->remember("posts",60*60, function() {
        return Post::all();
    });

    return view('readerposts', ['posts' => $posts]);
});

Route::get('/about', function () {
    return view('about');
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

    $post = cache()->remember("posts.{$slug}",60*60, function() use ($slug) {
        return Post::where('slug','=',$slug)->first();
    });

    return view('post', ['post' => $post]);
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
