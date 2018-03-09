@extends('layouts.main')

@section('stylesheets')
<style>
    

    
    
</style>
 
 @section('content')
  <section id="blog">
  <div class="blog-container">
   <h2 class="post-title">{{ $tag->name }} : <small> {{$posts->total() }} Articles</small></h2>
    </div>
  </section><!-- #hero -->
  <main id="main">
      
          <!--==========================
      About Us Section
    ============================-->
       <div class="index-content">
       <section id="services">
        <div class="container wow fadeIn">
             <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="post-title-mobile">{{ $tag->name }} : <small> {{$posts->total() }} Articles</small></h2>  
            </div>
            </div>
            <div class="infinite-scroll">
          <div class="card-deck">
          
           @foreach($posts as $post)
          <a class="hidden-link" href="{{ url('blog/'.$post->slug) }}">
           <div class="col-xl-3 col-lg-6 col-lg-6" style="padding:0px">
            <div class="card mb-3">
            <div class="blog-img">
    <img class="card-img-top" src="{{ Voyager::image($post->image) }}" alt="Card image cap">
    </div>
    <div class="card-body">
     <div style="height:60px">
      <h5 class="card-title" >{{ $post->title }}</h5></div>
      <div style="height:175px"> <p class="card-text mb-3" style="font-size: 16px">{{ $post->meta_description }}</p></div>
    <a href="{{ url('blog/'.$post->slug) }}" class="read-more float-right">Read more <i class="fa fa-chevron-right" aria-hidden="true"></i>
</a>
    </div>
    <div class="card-footer">
     
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
              </div>
              </div>
              </a>
        @endforeach
              </div>
<div class="row">
  <div class="col-md-12">
    <div class="pagination justify-content-center mt-3">
      {!! $posts->links("pagination::bootstrap-4"); !!}
</div>

  </div>
</div>
            </div>
           </div>
           </section>
           </div>
    <!-- #services -->
      
      
@include('partials._calltoaction')


  </main>
  
   @section('scripts')

@endsection

