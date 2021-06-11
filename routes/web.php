<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    return view("posts", [
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
