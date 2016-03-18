@extends('layouts.master')

@section('title', 'Add seo')

@section('content')

	<div class="content">
		<h3>SEO</h3>

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


		<div class="seo">
			<form method="post" action="{{ url(route('seo.post_add')) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<h4>Meta Description</h4>
                <textarea name="seoMeta">{{ isset($seo->meta_description) ? $seo->meta_description : '' }}</textarea>
				<h4>Keywords</h4>
                <textarea name="seoKeyWords">{{ isset($seo->keywords) ? $seo->keywords : '' }}</textarea>
				<h4>SEO Title</h4>
                <textarea name="seoTitle" class="last-textarea">{{ isset($seo->title) ? $seo->title : '' }}</textarea>
				<input type="submit" value="Publish" class="submit">
			</form>
		</div>
	</div>

@endsection