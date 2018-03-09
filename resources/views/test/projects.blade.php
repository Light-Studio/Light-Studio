@extends('layouts.main')


@section('title', '| Blog Marketing Web et SEO')

@section('seo')
<meta name="description" content="">
@endsection

@section('stylesheets')
<style>

    .title-background{

        margin-top:60px
    }
        .title-background p{

        color:#fff;
            font-size:18px
    }

    @media (max-width: 900px){
            .title-background{
            display:none
        }

</style>

 @section('content')
  <section id="blog">
  <div class="blog-container">
     <div class=" title-background offset-md-2 col-md-8 text-center">
            <h2></h2>
            <p></p>
          </div>
    </div>
  </section><!-- #hero -->
  <main id="main">


            <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">{{__('main.projects.projects')}}</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row">

          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="@foreach($categories as $category).{{$category->slug}}, @endforeach .all" class="filter-active">{{__('main.projects.all')}}</li>
              @foreach($categories as $category)
              <li data-filter=".{{$category->slug}}">{{$category->getTranslatedAttribute('name',App::getLocale(), 'fallbackLocale')}}</li>
              @endforeach
            </ul>
          </div>
        </div>


        <div class="row" id="portfolio-wrapper">
          @foreach($projects as $project)
           @if($project->status==1)
          <div class="col-lg-3 col-md-6 portfolio-item @foreach($project->categories as $category) {{$category->slug}}@endforeach">
            <a href="">
              <img src="{{ Voyager::image($project->image) }}" alt="{{$project->image_alt}}">
              <div class="details">
                <h4>{{$project->getTranslatedAttribute('title',App::getLocale(), 'fallbackLocale')}}</h4>
                <span></span>
              </div>
            </a>
          </div>
          @endif
          @endforeach
        </div>


      </div>
    </section><!-- #portfolio -->


@include('partials._calltoaction')
          </main>

 @section('scripts')


@endsection
