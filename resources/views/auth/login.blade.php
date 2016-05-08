<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Smile</title>
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body>
<div id="login-container">
	<div class="logo">Logo</div>
	<div class="form">
		<ul>
			<form method="POST" action="{{ url('/login') }}">
				{!! csrf_field() !!}
				<li>
					<label>E-mail</label>
					<input type="email" class="form-control" name="email" value="{{ old('email') }}">

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
					<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
					<input type="submit" value="Login" class="submit-btn">
				</li>
			</form>
		</ul>
	</div>
</div>
</body>
</html>