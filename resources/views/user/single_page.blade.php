@extends('layouts.user')
@section('title', $categoryName . ' | Just4Fun')

@section('content')

	@if(isset($ads))
		@if(!empty($ads->code_top))
			{{ $ads->code_top }}
		@else
			<div class="col-sm-9 col-sm-9 placeholder">
				<div class="top-ads">
					<img src="{{ url('uploads/' . $ads->image_top ) }}" alt="">
				</div>
			</div>
		@endif
	@endif

	<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">

		<div class="row placeholders">
			<h3>{{ $categoryName }}</h3>

			<div id="container" class="clearfix">
				<div id="content" class="defaults">

					<!-- item container -->
					<ul id="itemContainer">
						@foreach($media as $video)
							<div class="col-xs-6 col-sm-4 placeholder">
								<li>
									<a href="{{ url(route('home.view_media', $video->id)) }}"><img
												src="{{ $video->thumb }}" class="img-responsive"
												alt="{{ $video->title }}"><h4>{{ str_limit($video->title), 25 }}</h4></a>
								</li>
							</div>
						@endforeach
					</ul>
				</div>
			</div>

			{!! $media->render() !!}

					<!-- navigation holder -->
			<div class="holder"></div>
		</div>
	</div>
	@if(isset($ads))
		@if(!empty($ads->code_aside))
			{{ $ads->code_aside }}
		@else
			<div class="col-sm-3 col-sm-3 placeholder right-ads">
				<div id="right-ads">
					<img src="{{ url('uploads/' . $ads->image_aside ) }}" alt="">
				</div>
			</div>
		@endif
	@endif

@endsection