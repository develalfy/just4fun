@extends('layouts.master')

@section('title', 'Add ads')

@section('content')

	<div class="content">
		<h3>Mange Ads</h3>

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

		<div class="ads">
			<h4>Add Top ADS</h4>

			<form action="{{ route('ads.post_add') }}" method="post" enctype="multipart/form-data">

				<select name="category_id">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div>
					<h4>code ads</h4>

					<textarea name="top_code" cols="40"
					          rows="10">{{ isset($ads->code_top) ? $ads->code_top : ''}}</textarea>
					<h4>image ads</h4>
					<label for="image-upload" id="image-label">Choose File</label>
					<input type="file" name="top_image" id="image-upload"/>

					@if(isset($ads->image_top))
						<div id="top-preview">
							<img src="{{ url('uploads/'.$ads->image_top) }}" alt="">
						</div>
					@endif
				</div>

				<h4>Add Aside ADS</h4>

				<div>
					<h4>code ads</h4>

					<textarea name="aside_code" cols="40"
					          rows="10">{{ isset($ads->code_aside) ? $ads->code_aside : ''}}</textarea>
					<h4>image ads</h4>
					<label for="image-upload" id="image-label">Choose File</label>
					<input type="file" name="aside_image" id="image-upload"/>
					<br/>

					@if(isset($ads->image_aside))
						<div id="aside-preview">
							<img src="{{ url('uploads/'.$ads->image_aside) }}" alt="">
						</div>
					@endif

					<input type="submit" value="Publish" class="submit">
				</div>
			</form>
		</div>
	</div>

@endsection