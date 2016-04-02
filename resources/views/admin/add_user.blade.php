@extends('layouts.master')

@section('title', 'Add user')

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
			<h4>User Profile</h4>

			<form action="{{ route('users.post_add') }}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<ul>
					<li>
						<label>E-mail</label>
					</li>
					<li>
						<input type="email" name="email">
					</li>
					<li>
						<label>Password</label>
					</li>
					<li>
						<input type="password" name="password">
					</li>
					<li>
						<label>Confirm Password</label>
					</li>
					<li>
						<input type="password" name="password_confirmation">
					</li>
					<li>
						<input type="submit" value="Save" class="users-btn">
						<input type="reset" value="Cancel" class="users-btn">
					</li>
				</ul>
			</form>

		</div>
	</div>

@endsection