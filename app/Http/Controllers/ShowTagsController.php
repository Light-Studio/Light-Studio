<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\enTag;

class ShowTagsController extends Controller
{



public function getTag(Tag $tag)
    {

    $posts = $tag->posts()->latest()->paginate(12);

    return view('tags.show', compact('posts', 'tag'));

    }


public function getEnTag(enTag $tag)
    {

    $posts = $tag->posts()->latest()->paginate(12);

    return view('tags.show', compact('posts', 'tag'));

    }
}
