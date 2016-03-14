<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<script type="text/javascript" src="{{ asset('backend/js/jquery-2.0.3.min.js') }}"></script>
</head>
<body>
<div id="container">

	<div class="header">
		<a href="#">{{ Auth::user()->email }}</a>
		<a href="{{ url('logout') }}">logout</a>
	</div>
	<div class="nav-left">
		<ul>
			<li class="media-a"><a href="{{ url('admin/all_media') }}"><img src="{{ url('backend/image/media.png') }}" alt="media">

					<p>MEDIA</p></a></li>
			<li class="seo"><a href="{{ url('admin/seo') }}"><img src="{{ url('backend/image/seo.png') }}" alt="seo">

					<p>SEO</p></a></li>
			<li class="ads"><a href="{{ url('admin/ads') }}"><img src="{{ url('backend/image/ads.png') }}" alt="ads">

					<p>MANGE ADS</p></a></li>
			<li class="users"><a href="{{ url('admin/users') }}"><img src="{{ url('backend/image/users.png') }}" alt="users">

					<p>USERS</p></a></li>
		</ul>
	</div>


	@yield('content')


</div>
</body>

</html>