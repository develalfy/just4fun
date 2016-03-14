@extends('layouts.master')

@section('title', 'Add media')

@section('content')

	<div class="content">
		<h3>SHARING</h3>

		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li style="color: black">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
			@if(Session::has('alert-' . $msg))
				<ul>
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
					                                                                         class="close"
					                                                                         data-dismiss="alert"
					                                                                         aria-label="close">&times;</a>
					</p>
				</ul>
			@endif
		@endforeach

		<div class="left">
			<h4>Share Video</h4>

			<form method="post" action="{{ url(route('media.post_add')) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<ul>
					<li><label>Video Link</label><input type="text" id="url" name="url"></li>
					<input type="hidden" name="title"/>
					<input type="hidden" name="thumb"/>

					<li><label>Thumb Image</label></li>
					<li><img src="{{ url('backend/image/upload-pic.jpg') }}" alt=""></li>
					<li><label>Video Category</label>
						<select name="category_id">
							<option value="">-- Select Category --</option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</li>
					<li>
						<input type="text" readonly>
						<label>Video from (youtube, vimeo, metacafe, dailymotion)</label>
					</li>
					<li>
						<label>Published Date Time</label>
						<input type="datetime" name="publish_date_time" value="{{ date("Y-m-d H:i:s") }}">
					</li>
					<li>
						<label>Video SEO</label>
						<input type="text" name="meta_tags">
					</li>
					<input type="submit" value="Publish" class="publish">
				</ul>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			// Getting video id
			function getVideoId(video_url) {
				var video_id = video_url.split('v=')[1];
				var ampersandPosition = video_id.indexOf('&');
				if (ampersandPosition != -1) {
					video_id = video_id.substring(0, ampersandPosition);
				}
				return video_id;
			}

			var video_id = getVideoId("https://www.youtube.com/watch?v=h0OTgupOYe0");

			var x = $.getJSON('http://gdata.youtube.com/feeds/api/videos/' + video_id + '?v=2&alt=jsonc', function (data, status, xhr) {
				alert(data.data.title);
				// data contains the JSON-Object below
			});

			console.log(x);
		});
	</script>

	{{-- Retrieving video data --}}
	{{--<script>
		$.extend({
			jYoutube: function( url, size ){
				if(url === null){ return ""; }

				size = (size === null) ? "big" : size;
				var vid;
				var results;

				results = url.match("[\?&]v=([^&#]*)");

				vid = ( results === null ) ? url : results[1];

				if(size == "small"){
					return "http://img.youtube.com/vi/"+vid+"/2.jpg";
				}else {
					return "http://img.youtube.com/vi/"+vid+"/0.jpg";
				}
			}
		});

		$(document).ready(function(){
			// Get youtube video thumbnail on user click
			var url = '';
			$('#url').focusout(function(){
				// Check for empty input field
				if($('#url').val() != ''){
					// Get youtube video's thumbnail url
					// using jYoutube jQuery plugin
					url = $.jYoutube($('#url').val());

					// Now append this image to <div id="thumbs">
					$('#thumbs').append($('<img src="'+url+'" />'));
				}
			});
		});
	</script>--}}
@endsection