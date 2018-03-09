@extends('layouts.main')

<?php $title = setting('index.seo_title_' . App::getLocale()); ?>
@section('title', "| $title")

@section('seo')
<meta name="description" content="{{ setting('site.description_' . App::getLocale()) }}">
<!--Twitter card-->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Lightstudio_mtl">
<meta name="twitter:title" content="{{ setting('site.title') }}| Agence de Marketing Web à Montréal">
<meta name="twitter:description" content="{{ setting('site.description') }}">
<meta name="twitter:creator" content="@Lightstudio_mtl">
<!--OpenGraph-->
<meta property="og:type" content="business.business">
<meta property="og:title" content="{{ setting('site.title') }}| Agence de Marketing Web à Montréal">
<meta property="og:url" content="https://www.light-studio.ca">
<meta property="og:image" content="{{Voyager::image(setting('site.image_share'))}}">
<!--Facebook business-->
<meta property="business:contact_data:street_address" content="{{setting('contact.street_adress')}}">
<meta property="business:contact_data:locality" content="{{setting('contact.locality')}}">
<meta property="business:contact_data:region" content="{{setting('contact.region')}}">
<meta property="business:contact_data:postal_code" content="{{setting('contact.postal_code')}}">
<meta property="business:contact_data:country_name" content="{{setting('contact.country_name')}}">

<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Organization",
  "name": "{{ setting('site.title') }}",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{setting('contact.street_adress')}}",
    "addressLocality": "{{setting('contact.locality')}}",
    "addressRegion": "{{setting('contact.region')}}",
    "postalCode": "{{setting('contact.postal_code')}}"
  },
  "telephone": "{{ setting('contact.telephone') }}",
  "email": "{{ setting('contact.email') }}",
  "logo": {
            "@type": "ImageObject",
            "url": "{{Voyager::image(setting('site.image_share'))}}"
      }
}
</script>


@stop

@section('stylesheets')
<style>
    #home {
  display: table;
  width: 100%;
  height: 100vh;
  background: url(../img/cover_image_home.jpg) top center fixed;
  background-size: cover;
}
</style>


@section('content')
  <!--==========================
    home Section
  ============================-->
<!-- Banner -->
  <section id="home">
    <div class="home-container">
      <h2>{{__('main.index.welcome')}}</h2>
      <h1>{{__('main.index.sub_welcome')}}</h1>

      <a href="#services" class="fa fa-angle-double-down fa-4x" aria-hidden="true"></a>
    </div>
  </section><!-- #home -->

  <main id="main">

          <!--==========================
      About Us Section
    ============================-->
    <section id="services">
        <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">{{__('main.index.services_title')}}</h3>

        </div>


        <div class="row">
             <p class="section-description intro-text">{{__('main.index.services_description')}}</p>

            @foreach($services as $service)

            <div class="col-xl-4 col-lg-6 col-md- col-sm-12 wow fadeInUp " data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="javascript:void(0)"><i class="fa {{ $service->icon }}"></i></a></div>
              <h4 class="title">{{ $service->getTranslatedAttribute('name',App::getLocale(), 'fallbackLocale') }}</h4>
              <p class="description">{{ $service->getTranslatedAttribute('description',App::getLocale(), 'fallbackLocale') }}</p>
            </div>
          </div>
          @endforeach


            <!-- <div class="col-lg-12 text-center">
            <a class="srv-btn align-middle" href="/services.html">Tous les services</a>
          </div>-->
        </div>
    </section><!-- #services -->


@include('partials._calltoaction')

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">{{__('main.index.team')}}</h3>
          <p class="section-description">{{__('main.index.team_description')}}</p>
        </div>
        <div class="row">

          @foreach($teams as $team)
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><a href="" target="_blank"><img class="img-circle" src="{{ Voyager::image($team->picture)}}" alt="{{$team->name}}"></a></div>
                <h4>{{$team->name}}</h4>
              <span>{{ $team->getTranslatedAttribute('position',App::getLocale(), 'fallbackLocale') }}</span>
            </div>
          </div>
          @endforeach
          </div>
          </div>
      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->

    <style>
  #contact a{

    color:#000;
    padding-left:20px;
    font-size: 14px;
  }

  </style>
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contact</h3>
        </div>
      </div>

<div class="map-responsive"><span style="height: 400px">
{!! setting('contact.maps') !!}
       </span>
        </div>
      <div class="container wow fadeInUp">
        <div class="row justify-content-center">

           <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                  <p>{{setting('contact.street_adress')}}<br>{{setting('contact.locality')}}, {{setting('contact.region')}} {{setting('contact.postal_code')}} </p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                  <p>{{ setting('contact.email') }}</p>
              </div>

              <div>
                  <a href="tel:{{ setting('contact.telephone') }}"><i class="fa fa-phone"></i>{{ setting('contact.telephone') }}</a>
              </div>
            </div>

            <div class="social-links mt-4">
              <a href="{{setting('contact.facebook')}}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="{{setting('contact.linkedin')}}" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="{{setting('contact.twitter')}}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
            </div>
            </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
             @include('partials._message')

              <form action="{{ url('/') }}" method="POST" role="form" class="contactForm">

               {{ csrf_field() }}

                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" required placeholder="{{__('main.contact_form.name')}}"/>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" required placeholder="{{__('main.contact_form.email')}}" />
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control" name="phone" id="phone" required placeholder="{{__('main.contact_form.phone')}}" />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" required placeholder="{{__('main.contact_form.subject')}}"/>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" required placeholder="{{__('main.contact_form.message')}}"></textarea>
                </div>

                <div class="text-center"><button type="submit">{{__('main.contact_form.sent')}}</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>




@stop