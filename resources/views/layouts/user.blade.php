<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('frontend/css/reset.css') }}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
	<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/jquerysctipttop.css') }}" rel="stylesheet" type="text/css">
	<script src="{{ asset('frontend/js/modernizr.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/jPages.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/github.css') }}">

	<title>Just4mar7</title>
</head>
<body>
<div id="container">
	<nav class="cd-side-navigation">
		<ul>
			<li>
				<a href="index.html" class="selected" data-menu="index">
					<img src="{{ url('frontend/images/icon1.png') }}" alt="اكتر فيديوهات مضحكه مشاهدة">
					<p>اكتر مشاهده</p>
				</a>
			</li>

			<li>
				<a href="egyptian.html" data-menu="egyptian">
					<img src="{{ url('frontend/images/icon2.png') }}" alt="فيديوهات مضحكه مصريه">
					<p>مصري</p>
				</a>
			</li>

			<li>
				<a href="gulf.html" data-menu="gulf">
					<img src="{{ url('frontend/images/icon3.png') }}" alt="فيديوهات مضحكه خليجي">
					<p>خليجي</p>
				</a>
			</li>

			<li>
				<a href="world.html" data-menu="foreigners">
					<img src="{{ url('frontend/images/icon4.png') }}" alt="فيديوهات مضحكه عالميه">
					<p>عالمي</p>
				</a>
			</li>
			<li>
				<a href="sports.html" data-menu="sports">
					<img src="{{ url('frontend/images/icon5.png') }}" alt="فيديوهات مضحكه رياضيه">
					<p>رياضه</p>
				</a>
			</li>
			<li>
				<a href="kids.html" data-menu="kids">
					<img src="{{ url('frontend/images/icon6.png') }}" alt="فيديوهات مضحكه للاطفال">
					<p>أطفال</p>
				</a>
			</li>
			<li>
				<a href="animals.html" data-menu="animals">
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
						<div class="logo"><a href="index.html"><img src="{{ url('frontend/images/logo.png') }}" alt="just4mar7"></a></div>
						<div class="social-icon">
							<ul><li><img src="{{ url('frontend/images/facebook.png') }}" alt="facebookpage"></li>
								<li><img src="{{ url('frontend/images/twitter.png') }}" alt="twitter page"></li>
							</ul>
						</div>

						@yield('content')
					</div>
				</div>
		</section>
	</main>
</div>
<!--</div>--> <!-- .cd-content -->
<!-- </div>-->
<!--</section> --><!-- .cd-section -->
<!--</main>--> <!-- .cd-main -->
<!--    </div>
-->	<div id="footer">
	<p>powred by fkrahonline</p>
</div>
<script src="{{ url('frontend/js/bootstrap.min') }}.js"></script>
<script src="{{ url('frontend/js/main.js') }}"></script> <!-- Resource jQuery -->

<script src="{{ url('frontend/js/jquery-2.1.4.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/highlight.pack.js') }}">  </script>
<script type="text/javascript" src="{{ url('frontend/js/tabifier.js') }}"></script>
<script src="{{ url('frontend/js/js.js') }}"></script>
<script src="{{ url('frontend/js/jPages.js') }}"></script>

</body>
</html>