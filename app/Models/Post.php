<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        //find the post with a slug that match the request

        return static::all()->firstWhere("slug", $slug);
    }

    public static function all()
    {
        return cache()->rememberForever("posts.all", function () {
            //1 - find all the files in posts dir and 'collect' them, map over each item, parse them into a document.
            //2 - with the collection of documents map them building our post object
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn($document) => new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    )
                )
                ->sortByDesc("date");
        });
    }
}
