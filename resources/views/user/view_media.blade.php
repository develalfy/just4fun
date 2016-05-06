@extends('layouts.user')
@section('title', " $media->title | Just4Mara7")

@section('content')

	@if(!empty($ads->code_top))
		{{ $ads->code_top }}
	@else
		<div class="col-sm-9 col-sm-9 placeholder">
			<div class="top-ads">
				<img src="{{ url('uploads/' . $ads->image_top ) }}" alt="">
			</div>
		</div>
	@endif

	<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">
		<div class="row placeholders">
			<div class="col-md-12">
				<div class="inner-container">
					<h3>{{ $media->title }}</h3>

					<div class="videoplayer">
						<div id="">
							@if($media->site_name == 'YouTube')
								<iframe src="{{ str_replace("watch?v=", "embed/", $media->url) }}" frameborder="0"
								        allowfullscreen></iframe>
							@elseif($media->site_name == 'Vimeo')
								<iframe src="{{ str_replace("vimeo.com/", "player.vimeo.com/video/", $media->url) }}?portrait=0"
								        webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							@elseif($media->site_name == 'Dailymotion')
								<iframe src="{{ str_replace("video", "embed/video", $media->url) }}"></iframe>
							@else
								<iframe src="{{ $media->url }}" frameborder="0"
								        allowfullscreen></iframe>
							@endif
						</div>
						<!--<img src="images/inner/inner-img.jpg" alt="">-->
					</div>
				</div>
			</div>
			<div class="row placeholders">
				<div class="views">
					<div class="views-num">
						<div class="col-sm-12">
							<p>مشاهده</p>

							<p>{{ $media->views }}</p>
						</div>
					</div>
				</div>
				<div class="video-place">
					<div class="col-sm-12">
						<p style="color: #0e0e0e">By/ {{ $media->author_name }}</p>
						<p>{{ $media->site_name }}</p>
						<p>من </p>
					</div>
				</div>
			</div>
		</div>
		<div class="row placeholders">
			<div class="col-sm-12">
				<div class="share">
					<p>شارك الفيديوهات المضحكه مع من تحب</p>

					<div class="sharing-icon">

						<a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
							<button class="sharer button facebookbtn" data-sharer="facebook"
							        data-url="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}"></button>
						</a>
						<a href="https://twitter.com/home?status={{ Request::url() }}" target="_blank">
							<button class="sharer button twitterbtn" data-sharer="twitter"
							        data-title="Checkout Sharer.js!"
							        data-url="https://twitter.com/home?status={{ Request::url() }}"></button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row placeholders">
			<div class="related-videos">
				<div class="related-videos-title">
					<p>فيديوهات مشابهه</p>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="related-videos-thumb">
							<ul>
								@foreach($related as $relatedVideo)
									<div class="col-sm-3">
										<li>
											<a href="{{ url(route('home.view_media', $relatedVideo->id)) }}">
												<img src="{{ $relatedVideo->thumb }}" alt="{{ $relatedVideo->title }}">
												<h4>{{ $relatedVideo->title }}</h4>
											</a>
										</li>
									</div>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(!empty($ads->code_aside))
		{{ $ads->code_aside }}
	@else
		<div class="col-sm-3 col-sm-3 placeholder right-ads">
			<div id="right-ads">
				<img src="{{ url('uploads/' . $ads->image_aside ) }}" alt="">
			</div>
		</div>
	@endif

@endsection