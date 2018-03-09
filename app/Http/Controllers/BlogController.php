<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\enPost;
use App\Tag;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class BlogController extends Controller
{

    public function getBlog() {

      return view('blog');

    }

    public function getBlog_en() {

      return view('blog_en');

    }


    public function getSingle($slug) {
      //find the post form the DB Based on the $slug
      if(App::getLocale() == 'fr') {
      $post = Post::where('slug', '=', $slug)->first();}

      if(App::getLocale() == 'en') {
      $post = enPost::where('slug', '=', $slug)->first();}


      //$post->load('translations');

      // return the view ans pass in the post object
      return view('view')->withPost($post);
    }

}
