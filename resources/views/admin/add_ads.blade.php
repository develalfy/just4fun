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

				<select id="category_id" name="category_id">
					{{--<option value="{{ env('MAIN_PAGE_ID', 7) }}">Main</option>--}}
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div>
					<h4>code ads</h4>

					<textarea name="top_code" cols="40" id="code_top"
					          rows="10">{{ isset($ads->code_top) ? $ads->code_top : ''}}</textarea>
					<h4>image ads</h4>
					<label for="image-upload" id="image-label">Choose File</label>
					<input type="file" name="top_image" id="image-upload"/>


					<div id="top-preview">
						<img src="" id="image_top" alt="">
					</div>

				</div>

				<h4>Add Aside ADS</h4>

				<div>
					<h4>code ads</h4>

					<textarea name="aside_code" cols="40" id="code_aside"
					          rows="10">{{ isset($ads->code_aside) ? $ads->code_aside : ''}}</textarea>
					<h4>image ads</h4>
					<label for="image-upload" id="image-label">Choose File</label>
					<input type="file" name="aside_image" id="image-upload"/>
					<br/>


					<div id="aside-preview">
						<img src="" id="image_aside" alt="">
					</div>


					<input type="submit" value="Publish" class="submit">
				</div>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			var category = $("#category_id").find(":selected").text();
			var path = "{{ url('uploads') }}"

			$.getJSON("{{ url('admin/media/json') }}" + "/" + category,
					function (data) {
						console.log(path + '/' + data.image_aside);
						$('#code_top').val(data.code_top);
						$('#top-preview img').attr('src', path + '/' + data.image_top);
						$('#code_aside').val(data.code_aside);
						$('#aside-preview img').attr('src', path + '/' + data.image_aside);
					}
			);

			$("#category_id").change(function () {
				var cat_val = $("#category_id").find(":selected").text();

				$.getJSON("{{ url('admin/media/json') }}" + "/" + cat_val,
						function (data) {
							$('#code_top').val(data.code_top);
							if(!data.image_top){
								$('#top-preview').hide(100);
							}else{
								$('#top-preview').show(100);
								$('#top-preview').find('img').attr('src', path + '/' + data.image_top);
							}

							$('#code_aside').val(data.code_aside);
							if(!data.image_aside){
								$('#aside-preview').hide(100);
							}else {
								$('#aside-preview').show(100);
								$('#aside-preview').find('img').attr('src', path + '/' + data.image_aside);
							}


						}
				);
			});

		});
	</script>

@endsection

