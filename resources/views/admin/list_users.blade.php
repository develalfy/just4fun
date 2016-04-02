@extends('layouts.master')

@section('title', 'List Users')

@section('content')

	<div class="content">
		<h3>Users</h3>

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

		<div class="add-users">
			<a href="{{ url(route('users.get_add')) }}">+ Add New User</a>
		</div>
		<div class="users">
			<h4>Users</h4>
			@foreach($users as $user)
				<a href="#">{{ $user->email }}</a><a class="delete" href="{{ url(route('users.delete', $user->id)) }}">delete</a>
			@endforeach
		</div>
	</div>


	<script>
		$(document).ready(function () {
			$(document).on("click", "a.delete", function () {
				if (confirm('Are you sure ? the user will be deleted.')) {
					$(this).prev('span.text').remove();
				} else {
					return false;
				}
			});
		});
	</script>

@endsection