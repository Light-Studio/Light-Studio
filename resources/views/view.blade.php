@extends('layouts.main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('meta')
 <meta name="description" content="{{ $post->seo_description}}">
  <meta content="{{ $post->seo_description}}" name="description">
  <meta name="author" content="{{$post->authorId->name}}">
  <meta property="fb:app_id" content="2214256182134808" />
  <meta property="fb:admins" content="1623653412"/>

   <!-- Update your html tag to include the itemscope and itemtype attributes. -->
<html itemscope itemtype="http://schema.org/Article">

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $post->title }}">
<meta itemprop="description" content="{{ $post->seo_description}}">
<meta itemprop="image" content="{{ Voyager::image($post->image) }}">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Lightstudio_mtl">
<meta name="twitter:title" content="{{ $post->title }}">
<meta name="twitter:description" content="{{ $post->seo_description}}">
<meta name="twitter:creator" content="@Lightstudio_mtl">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="{{ Voyager::image($post->image) }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url('blog/'.$post->slug) }}" />
<meta property="og:image" content="{{ Voyager::image($post->image) }}" />
<meta property="og:description" content="{{ $post->seo_description}}" />
<meta property="og:site_name" content="{{ setting('site.title') }}" />
<meta property="article:published_time" content="{{ $post->created_at }}" />
<meta property="article:modified_time" content="{{ $post->updated_at }}" />
<meta property="article:tag" content="@foreach($post->tags as $tag) {{ $tag->name }} @endforeach" />

@section('stylesheets')
<style>

#post {
  display: table;
  width: 100%;
  height: 400px;
  background: url({{ Voyager::image($post->thumbnail('banner')) }}) top center fixed;
  background-size: 100%;
}

@media only screen and (max-width: 1500px) {
   .fb-comments {
    width: 100% !important;
   }
.fb-comments iframe[style] {
   width: 100% !important;
  }
.fb-like-box {
   width: 100% !important;
  }
.fb-like-box iframe[style] {
   width: 100% !important;
  }
.fb-comments span {
   width: 100% !important;
  }
.fb-comments iframe span[style] {
   width: 100% !important;
  }
.fb-like-box span {
   width: 100% !important;
  }
.fb-like-box iframe span[style] {
   width: 100% !important;
  }
}

.left-area{ height: 70px; width: 70px; border-radius: 100px; overflow: hidden; position: absolute;
	top: 50%; margin-top: -30px; box-shadow: 0px 0px 5px rgba(0,0,0,.3); }

.middle-area{ margin-top: 7px; padding-left: 90px; display: inline-block; }

    .small-font {

        margin:0px;
        padding:0px;
        font-size:14px;


    }

</style>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage":{
      "@type":"WebPage",
      "@id":"{{ url('blog/'.$post->slug) }}"
    },
    "headline": "{{ $post->title }}",
    "image": {
      "@type": "ImageObject",
      "url": "{{ Voyager::image($post->image) }}",
      "height": 1920,
      "width": 1080
    },
    "datePublished": "{{ date( 'd/m/Y - H:i', strtotime($post->created_at)) }}",
    "dateModified": "{{ date( 'd/m/Y - H:i', strtotime($post->updated_at)) }}",
    "author": {
      "@type": "Person",
      "name": "{{$post->authorId->name}}"
    },
     "publisher": {
      "@type": "Organization",
      "name": "{{ setting('site.title') }}",
      "logo": {
        "@type": "ImageObject",
        "url": "{{Voyager::image(setting('site.image_share'))}}"
      }
    },
    "description": "{{ $post->description }}"
  }
  </script>

 @section('content')
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11&appId=2214256182134808';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


  <section id="post">
  <div class="post-container">
    <h2>{{ $post->title }}</h2>
    </div>
  </section><!-- #hero -->
  <main id="main">
       <div class="index-content">
       <section id="services">
       <article>





        <div class="container wow fadeIn">
             <div class="row">
          <div class="offset-xl-2 col-xl-8 text-left content-body">
           <h2 class="post-title-mobile" style="margin-bottom:5px;">{{ $post->title }}</h2>
           <p class="text-muted" style="font-weight:100; font-size:18px"><i>Publié le {{ $post->updated_at->formatLocalized('%d %B %Y') }}</i></p>

            <p>{!! $post->body !!}</p>
          </div>
          </div>
          <hr style="padding-top: -575px">
          <div class="row">
              <div class="offset-1 col-lg-6 text-center ">
                <div class="row">
                  <h5>À Propos de l'auteur</h5>
                </div>
                <div class="row mb-5">
                 <div class="left-area">
                    <img class="img-circle img-block" height="75" width="75" alt="" src="{{ Voyager::image($post->authorId->avatar) }}">
                 </div>
                 <div class="middle-area">
                     {{$post->authorId->name}}
                    </div>
                 </div>

              </div>
              <div class="col-lg-4 col-md-12 text-center mb-5 ">
                  @foreach($post->tags as $tag)
                  <span class="badge badge-secondary"><a href="{{url(App::getLocale().'/tags', $tag->name) }}">{{ $tag->name}}</a></span>
                @endforeach
              </div>
            </div>
           </div>
          </article>
           @include('partials._calltoaction')
          <div class="col-12 text-center mt-5">
          <div class="fb-comments" data-href="localhost:8000/blog/{{$post->slug}}" data-width="1350" data-numposts="5"></div>
            </div>

           </section>
           </div>
    <!-- #services -->





  </main>

@stop