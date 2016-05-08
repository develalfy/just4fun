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
			<form method="POST" action="{{ url('/password/email') }}">
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
					<input type="submit" value="Send Password Reset Link" class="submit-btn"/>
				</li>
			</form>
		</ul>
	</div>
</div>
</body>
</html>