@extends('layouts.main')


@section('meta')

  
@section('stylesheets')
<style>
    
    
    
.left-area{ height: 70px; width: 70px; border-radius: 100px; overflow: hidden; position: absolute;
	top: 50%; margin-top: -30px; box-shadow: 0px 0px 5px rgba(0,0,0,.3); }

.middle-area{ margin-top: 7px; padding-left: 90px; display: inline-block; }
    
    .small-font {
        
        margin:0px;
        padding:0px;
        font-size:14px;
        
        
    }
    
    
    .banner {
		background-color: #000;
		color: #e2d1df;
		padding: 8em 0;
		position: relative;
	}

		.banner input, .banner select, .banner textarea {
			color: #ffffff;
		}

		.banner a {
			color: #ffffff;
		}

		.banner strong, .banner b {
			color: #ffffff;
		}

		.banner h1, .banner h2, .banner h3, .banner h4, .banner h5, .banner h6 {
			color: #ffffff;
		}

		.banner blockquote {
			border-left-color: rgba(255, 255, 255, 0.25);
		}

		.banner code {
			background: rgba(255, 255, 255, 0.075);
			border-color: rgba(255, 255, 255, 0.25);
		}

		.banner hr {
			border-bottom-color: rgba(255, 255, 255, 0.25);
		}

		.banner.full {
			padding: 0;
			min-height: 100vh;
			height: 100vh !important;
		}

		.banner.half {
			padding: 0;
			min-height: 50vh;
			height: 50vh !important;
		}

		.banner:after {
			-moz-pointer-events: none;
			-webkit-pointer-events: none;
			-ms-pointer-events: none;
			pointer-events: none;
			-moz-transition: opacity 1.5s ease-in-out, visibility 1.5s;
			-webkit-transition: opacity 1.5s ease-in-out, visibility 1.5s;
			-ms-transition: opacity 1.5s ease-in-out, visibility 1.5s;
			transition: opacity 1.5s ease-in-out, visibility 1.5s;
			background: #000000;
			content: '';
			display: block;
			height: 100%;
			left: 0;
			opacity: 0;
			position: absolute;
			top: 0;
			visibility: hidden;
			width: 100%;
			z-index: 2;
		}

		.banner .indicators {
			bottom: 1.5em;
			left: 0;
			list-style: none;
			margin: 0;
			padding: 0;
			position: absolute;
			text-align: center;
			width: 100%;
			z-index: 2;
		}

			.banner .indicators li {
				cursor: pointer;
				display: inline-block;
				height: 2em;
				overflow: hidden;
				padding: 0;
				position: relative;
				text-indent: 2em;
				width: 2em;
			}

				.banner .indicators li:before {
					background: rgba(255, 255, 255, 0.35);
					border-radius: 100%;
					content: '';
					display: inline-block;
					height: 0.8em;
					left: 50%;
					margin: -0.4em 0 0 -0.4em;
					position: absolute;
					text-indent: 0;
					top: 50%;
					width: 0.8em;
				}

				.banner .indicators li.visible:before {
					background: #fff;
				}

		.banner > article {
			-moz-transition: opacity 1.5s ease, visibility 1.5s;
			-webkit-transition: opacity 1.5s ease, visibility 1.5s;
			-ms-transition: opacity 1.5s ease, visibility 1.5s;
			transition: opacity 1.5s ease, visibility 1.5s;
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			height: 100%;
			left: 0;
			opacity: 0;
			position: absolute;
			text-align: center;
			top: 0;
			visibility: hidden;
			width: 100%;
			z-index: 0;
		}

			.banner > article:before {
				content: '';
				display: inline-block;
				height: 100%;
				vertical-align: middle;
			}

			.banner > article:after {
				content: '';
				display: block;
				width: 100%;
				height: 100%;
				position: absolute;
				top: 0;
				left: 0;
				background: #000;
				opacity: 0.35;
			}

			.banner > article .inner {
				position: relative;
				display: inline-block;
				vertical-align: middle;
				z-index: 1;
			}

				.banner > article .inner > :last-child {
					margin-bottom: 0;
				}

			.banner > article h2 {
				font-size: 7rem;
				margin-bottom: 0;
				color: #FFF;
				font-weight: 300;
			}

				.banner > article h2:after {
					display: none;
				}

			.banner > article p {
				color: rgba(255, 255, 255, 0.65);
				text-transform: uppercase;
				font-size: 1rem;
				font-weight: 300;
				margin: 0;
				padding-bottom: 1.75rem;
				letter-spacing: .25rem;
			}

				.banner > article p:after {
					content: '';
					position: absolute;
					margin: auto;
					right: 0;
					bottom: 0;
					left: 0;
					width: 50%;
					height: 1px;
					background-color: rgba(255, 255, 255, 0.65);
				}

			.banner > article a {
				color: #FFF;
				text-decoration: none;
			}

			.banner > article img {
				display: none;
			}

			.banner > article.visible {
				opacity: 1;
				visibility: visible;
			}

			.banner > article.top {
				z-index: 1;
			}

			.banner > article.instant {
				-moz-transition: none !important;
				-webkit-transition: none !important;
				-ms-transition: none !important;
				transition: none !important;
			}

		body.is-loading .banner:after {
			opacity: 1.0;
			visibility: visible;
		}

		@media screen and (max-width: 1280px) {

			.banner.full {
				padding: 0;
				min-height: 75vh;
				height: 75vh !important;
			}

		}

		@media screen and (max-width: 980px) {

			.banner.full {
				padding: 0;
				min-height: 50vh;
				height: 50vh !important;
			}

			.banner > article {
				background-attachment: scroll;
			}

		}

		@media screen and (max-width: 736px) {

			.banner > article .inner {
				width: 90%;
			}

			.banner > article p {
				margin-bottom: 1rem;
			}

			.banner > article h2 {
				font-size: 4em;
			}

		}

		body.is-mobile .banner > article {
			background-attachment: scroll;
		}
    
</style>
<link href="{{ asset('css/dropzone.css')}}" rel="stylesheet">
    <script src="{{ asset('js/dropzone.js')}}"></script>


 
 @section('content')
  <!-- Banner -->
			<section class="banner full">
				<article>
					<img src="https://templated.co/items/demos/hielo/images/slide01.jpg" alt="" />
					<div class="inner">
						<header>
							<p>A free responsive web site template by <a href="https://templated.co">TEMPLATED</a></p>
							<h2>Hielo</h2>
						</header>
					</div>
				</article>

				<article>
					<img src="https://templated.co/items/demos/hielo/images/slide03.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Sed cursus aliuam veroeros lorem ipsum nullam</p>
							<h2>Tempus dolor</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="https://templated.co/items/demos/hielo/images/slide04.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Adipiscing lorem ipsum feugiat sed phasellus consequat</p>
							<h2>Etiam feugiat</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="https://templated.co/items/demos/hielo/images/slide05.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Ipsum dolor sed magna veroeros lorem ipsum</p>
							<h2>Lorem adipiscing</h2>
						</header>
					</div>
				</article>
			</section>
<!-- #hero -->
  <main id="main">
       <div class="index-content">
       <section id="services">
       <article>
        <div class="container wow fadeIn">
             <div class="row">
          <div class="offset-xl-2 col-xl-8 text-left content-body">
           <h2 class="post-title-mobile" style="margin-bottom:5px;">Title</h2>
           <p class="text-muted" style="font-weight:100; font-size:18px"><i>Publié le date</i></p>
           
            <p>body</p>
            
            <div>
                            <form action="{{ url('/admin/upload') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone">
                                {{ csrf_field() }}
                            </form>
                            </div>
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
                    <img class="img-circle img-block" height="75" width="75" alt="" src="#">
                 </div>
                 <div class="middle-area">
                     Paul Arienzale
                    </div>
                 </div>
                  
              </div>
            
            </div>
           </div>
          </article>
           @include('partials._calltoaction')
 
           </section>
           </div>
    <!-- #services -->
      
      



  </main>
@section('scripts')

			
			<script src="{{ asset('js/skel.min.js')}}"></script>
			
			<script src="{{ asset('js/banner.js')}}"></script>
			<script>
    dropzone.options.mydropzone = {
        paramName: 'file',
        maxFilesize: 5, // MB
        maxFiles: 20,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
    
    };
</script>


@endsection
