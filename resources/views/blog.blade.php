@extends('layouts.main')


<?php $title = setting('blog.seo_title_' . App::getLocale()); ?>
@section('title', "| $title")

@section('seo')
<meta name="description" content="{{setting('blog.description_' . App::getLocale())}}">
@stop

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
        }}

      .ais-pagination__link {
      position: relative;
      display: block;
      padding: 0.5rem 0.75rem;
      margin-left: -1px;
      line-height: 1.25;
      color: #000;
      background-color: #fff;
      border: 1px solid #dee2e6;
      }


      .ais-pagination__link :hover {
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
        }

      .ais-pagination__link :focus {
        z-index: 2;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

      .ais-pagination__link :not(:disabled):not(.disabled) {
        cursor: pointer;
        }

      .ais-pagination__item:first-child .ais-pagination__link {
        display: none;
      }

      .ais-pagination__item:last-child .ais-pagination__link {
        display: none;
      }

      .ais-pagination__item.active .ais-pagination__link {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
      }

      .ais-pagination__item.disabled .ais-pagination__link {
        color: #6c757d;
        pointer-events: none;
        cursor: auto;
        background-color: #fff;
        border-color: #dee2e6;
      }

</style>
@stop
 @section('content')
  <section id="blog">
  <div class="blog-container">
     <div class=" title-background offset-md-2 col-md-8 text-center">
            <h2>{{__('main.blog.title')}}</h2>
            <p>{{__('main.blog.description')}}</p>
          </div>
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
              </div>



        <div id="app">
            <ais-index app-id="{{ env('ALGOLIA_APP_ID') }}" api-key="{{ env('ALGOLIA_SEARCH') }}" index-name="{{App::getLocale()}}_posts">
                <ais-search-box>
                    <div class="input-group">
                          <ais-input
                          placeholder="{{__('main.blog.search_ph')}}"
                          :class-names="{
                            'ais-input': 'form-control'
                            }"
                          ></ais-input>

                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                              <span class="fa fa-search" aria-hidden="true"></span>
                            </button>
                          </span>
                    </div>
                </ais-search-box>

            <ais-results :results-per-page="12" class="card-deck infinite-scroll">
            <template slot-scope="{ result }">

                    <a class="hidden-link" :href="'blog/' + result.slug">
                    <div class="col-xl-3 col-lg-6 col-lg-6" style="padding:0px">
                    <div class="card mb-3">
                    <div class="blog-img">
                    <img class="card-img-top" :src="'/storage/' + result.image" alt="Card image cap">
                    </div>
                    <div class="card-body" style="padding-top:0px">
                     <div style="height:60px"><h1 style="font-size:22px" class="result__name">
                    <ais-highlight :result="result" attribute-name="title"></ais-highlight>
                         </h1></div>
                    <div style="height:175px"><p class="card-text mb-3" style="font-size: 16px">@{{ result.meta_description }}</p></div>
                    <a :href="'/blog/' + result.slug" class="read-more float-right" style="font-size:14px">Lire l'article <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                    </div>
                    <div class="card-footer">

                    <small class="text-muted">Publié le @{{result.updated_at}}</small>
                    </div>
                    </div>
                    </div>
                    </a>


            </template>
            </ais-results>
            <ais-no-results></ais-no-results>
            <ais-pagination v-on:page-change="onPageChange" class="pagination justify-content-center mt-2">
            </ais-pagination>
            <ais-powered-by class="float-right"></ais-powered-by>
            </ais-index>
        </div>

           </div></section></div>

@include('partials._calltoaction')
          </main>
@stop
 @section('scripts')
 <script>
 var app = new Vue({
  el: "#app",
     data: {

     },
     methods: {
      onPageChange() {
        window.scrollTo(0,0);
      }
    }


})

</script>


@stop
