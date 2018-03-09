<!DOCTYPE html>
<html lang="fr">
  <head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ setting('site.title_'.App::getLocale()) }} @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @yield('seo')
 <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{setting('site.google_analytics_tracking_id')}}"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{setting('site.google_analytics_tracking_id')}}');
  </script>
 <!-- Google Analytics end -->

 <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  '{{url('https://connect.facebook.net/en_US/fbevents.js')}}');
  fbq('init', '{{setting('site.fb-pixel')}}');
  fbq('track', 'PageView');</script>

  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id={{setting('site.fb-pixel')}}&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{ Voyager::image( Voyager::setting('favicon.32x32'), voyager_asset("images/favicon.ico") ) }}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{ Voyager::image( Voyager::setting('favicon.16x16'), voyager_asset("images/favicon.ico") ) }}" sizes="16x16" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">

  @yield('stylesheets')

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="logo">
        <a href="{{ route('index') }}@if(Route::current()->getName() == "index")#home @endif"><img src="{{ asset('img/Logo-Light-Studio-Small.png')}}" alt="logo de l'entreprise" title="Light-studio Logo" width="208" height="52"/></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#home">Regna</a></h1>-->
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          @if(Route::current()->getName() == "index")
          <li class="menu-active"><a href="{{ route('index') }}#home">{{__('main.nav.home') }}</a></li>
          @else
          <li class="menu-active"><a href="{{ route('index') }}">{{__('main.nav.home') }}</a></li>
          @endif
          <li><a href="{{ route('index') }}#services">{{__('main.nav.services') }}</a></li>
          <li><a href="{{ route('index') }}#team">{{__('main.nav.team') }}</a></li>
          <li><a href="{{ route('blog') }}">{{__('main.nav.blog') }}</a></li>
          <li><a href="{{ route('index') }}#contact">{{__('main.nav.contact') }}</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

@yield('content')



  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">



      <div class="col-12 text-center mb-2">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          @if ($loop->last)

            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, '/', [], true) }}">
                {{ $properties['native'] }}
            </a>
            @else

            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, '/', [], true) }}">
                {{ $properties['native'] }}
            </a>
            |
            @endif
    @endforeach

      </div>
      <div class="copyright">
        &copy; Copyright <strong>Light Studio</strong>. {{__('main.copyright') }}
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->

  <script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js')}}"></script>


  <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js')}}"></script>


  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/main.js')}}"></script>
  <script src="{{ asset('js/app.js')}}"></script>

  @yield('scripts')

</body>
</html>
