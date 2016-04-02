@extends('layouts.master')

@section('title', 'All media')

@section('content')

	<div class="content">
		<h3>All Media</h3>

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

		<div class="all-media">
			<select id="media_category">
				<option value="All">All</option>
				<option value="Egyptian">Egyptian</option>
				<option value="Gulf">Gulf</option>
				<option value="Foreigners">Foreigners</option>
				<option value="Sports">Sports</option>
				<option value="Kids">Kids</option>
				<option value="Animals">Animals</option>
			</select>
		</div>
		<div class="all-media-content">
			<a href="{{ url('admin/media/add') }}">Add New Media</a>
			{{--TODO: Sorting by category--}}
			<ul id="cat_elements">
				@foreach($allMedia as $media)
					<li class="elements {{ ucfirst($media['category']) }}">
						<ul>
							<li><img src="{{ $media['thumb']}}" alt="" width="300px" height="171px"></li>
							<li class="video-name"><p>{{ $media['title'] }}</p></li>
							<li class="delete-media"><a class="confirm-delete"
							                            href="{{ url(route('media.delete', $media['id'])) }}"><img
											src="{{ url('backend/image/delete.png') }}"></a></li>
							<li><p>{{ ucfirst($media['category']) }}</p></li>
						</ul>
					</li>
				@endforeach
			</ul>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$(document).on("click", "a.confirm-delete", function () {
				if (confirm('Are you sure ? the item will be deleted.')) {
					$(this).prev('span.text').remove();
				} else {
					return false;
				}
			});

			$("#media_category").change(function () {
				var cat_val = $("#media_category").find(":selected").text();
				if (cat_val != 'All') {
					$("#cat_elements").find("li" + ".elements").hide(0);
					$("#cat_elements").find("li" + "." + cat_val).show(500);
				} else {
					$("#cat_elements").find("li").show(500);
				}
			});
		});
	</script>
@endsection