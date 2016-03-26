<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ url('favicon.ico') }}" sizes="16x16">
	<link rel="stylesheet" href="{{ asset('frontend/css/reset.css')}}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{ asset('frontend/css/styles.css')}}"> <!-- Resource style -->
	<link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/jPages.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/github.css') }}">
	<script src="{{ asset('frontend/js/modernizr.js') }}"></script> <!-- Modernizr -->

	<script src="{{ asset('frontend/js/jquery-2.1.4.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/highlight.pack.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/tabifier.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/js.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/jPages.js') }}"></script>
	<title>@yield('title')</title>
</head>
<body>
<div id="container">
	<nav class="cd-side-navigation">
		<ul>
			<li>
				<a href="{{ url('home/top') }}" {{ Request::is('home/top') || Request::is('home') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon1.png') }}" alt="اكتر فيديوهات مضحكه مشاهدة">

					<p>اكتر مشاهده</p>
				</a>
			</li>

			<li>
				<a href="{{ url('home/egyptian') }}" {{ Request::is('home/egyptian') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon2.png') }}" alt="فيديوهات مضحكه مصريه">

					<p>مصري</p>
				</a>
			</li>

			<li>
				<a href="{{ url('home/gulf') }}" {{ Request::is('home/gulf') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon3.png') }}" alt="فيديوهات مضحكه خليجي">

					<p>خليجي</p>
				</a>
			</li>

			<li>
				<a href="{{ url('home/foreigners') }}" {{ Request::is('home/foreigners') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon4.png') }}" alt="فيديوهات مضحكه عالميه">

					<p>عالمي</p>
				</a>
			</li>
			<li>
				<a href="{{ url('home/sports') }}" {{ Request::is('home/sports') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon5.png') }}" alt="فيديوهات مضحكه رياضيه">

					<p>رياضه</p>
				</a>
			</li>
			<li>
				<a href="{{ url('home/kids') }}" {{ Request::is('home/kids') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon6.png') }}" alt="فيديوهات مضحكه للاطفال">

					<p>أطفال</p>
				</a>
			</li>
			<li>
				<a href="{{ url('home/animals') }}" {{ Request::is('home/animals') ? 'class=selected' : '' }}>
					<img src="{{ url('frontend/images/icon7.png') }}" alt="فيديوهات مضحكه للحيوانات">

					<p>حيوانات</p>
				</a>
			</li>
		</ul>
	</nav> <!-- .cd-side-navigation -->

	<main class="cd-main">
		<section class="cd-section index visible">
			<div class="cd-content" id="index-content">
				<div class="container-fluid">
					<div class="row">
						<div class="logo"><a href="{{ url('home/top') }}"><img src="{{ url('frontend/images/logo.png') }}" alt=""></a>
						</div>
						<div class="social-icon">
							<ul>
								<li><img src="{{ url('frontend/images/facebook.png') }}" alt="facebookpage"></li>
								<li><img src="{{ url('frontend/images/twitter.png') }}" alt="twitter page"></li>
							</ul>
						</div>

						@yield('content')

					</div>
				</div>
			</div>
		</section>
	</main>
</div>
<div id="footer"><p>powred by fkrahonline</p></div>
<div id="cd-loading-bar" data-scale="1" class="index"></div> <!-- lateral loading bar -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script> <!-- Resource jQuery -->

<script src="{{ asset('frontend/js/jquery-2.1.4.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/highlight.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/tabifier.js') }}"></script>
<script src="{{ asset('frontend/js/js.js') }}}"></script>
<script src="{{ asset('frontend/js/jPages.js') }}}"></script>
</body>
</html>