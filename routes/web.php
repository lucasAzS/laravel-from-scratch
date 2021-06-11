<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get("/", function () {
    //the var $posts is the return of the all() method of the class Post
    // $posts = Post::all();

    return view("posts", [
        // "posts" => $posts,
        "posts" => Post::all(),
    ]);
});

// {post} here is a wildcard that will be passed to the $slug and will be used in the path
// we want find a post by its slug and pass it to a view called post
Route::get("posts/{post}", function ($slug) {
    return view("post", [
        "post" => Post::find($slug),
    ]);
})->where("{post}", "[A-z_\-]+");
