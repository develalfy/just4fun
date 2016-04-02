<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Just 4 mar7</title>
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body>
<div id="login-container">
	<div class="logo"><img src="{{ asset('backend/image/logo.png') }}" alt=""></div>
	<div class="form">
		<ul>
			<form method="POST" action="{{ url('/password/reset') }}">
				{!! csrf_field() !!}
				<li>
					<label>E-mail</label>
					<input type="email" class="form-control" name="email"
					       value="{{ $email or old('email') }}">

					@if ($errors->has('email'))
						<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
					@endif
				</li>
				<li>
					<label>Password</label>
					<input type="password" class="form-control" name="password">

					@if ($errors->has('password'))
						<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
					@endif
				</li>
				<li>
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="password_confirmation">

					@if ($errors->has('password_confirmation'))
						<span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
					@endif
				</li>
				<li>
					<input type="submit" value="Reset password" class="submit-btn"/>
				</li>
			</form>
		</ul>
	</div>
</div>
</body>
</html>