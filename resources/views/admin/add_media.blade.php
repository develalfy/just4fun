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
					<input type="hidden" id="title" name="title"/>
					<input type="hidden" id="thumb" name="thumb"/>

					<li><label>Thumb Image</label></li>
					<li><img id="pic" src="" alt="" width="300px" height="171px"></li>
					<li><label>Video Category</label>
						<select name="category_id">
							<option value="">-- Select Category --</option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</li>
					<li>
						<input type="text" id="site_name" name="site_name" readonly>
						<label>Video from (youtube, vimeo, metacafe, dailymotion)</label>
					</li>
					<li>
						<input type="text" id="author_name" name="author_name" readonly>
						<label>Author name</label>
					</li>
					<li class="datetime">
						<label>schedule video</label>
						<input type="text" name="publish_date_time" value="{{ date("Y-m-d H:i") }}"
						       id="datetimepicker4"/><input id="open" type="button" value="open"/><input id="close"
						                                                                                 type="button"
						                                                                                 value="close"/><input
								id="reset" type="button" value="reset"/>
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

			$('#url').focusout(function () {
				var video_url = $('#url').val();
				$.getJSON('extract',
					{format: 'json', url: video_url}, function (data) {
						$('#thumb').val(data.thumbnail_url);
						$('#pic').attr('src', data.thumbnail_url);
						$('#title').val(data.title);
						$('#site_name').val(data.providerName);
						$('#author_name').val(data.author_name);
					}
				);
			});
		});
	</script>

@endsection