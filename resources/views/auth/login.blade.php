@extends('layouts.app')

@section('content')
<div class="auth auth_wrapper">
	<div class="auth_title">Todo Assistent</div>
	<div class="auth_subtitle">by aleXandar encheW</div>
	<div class="auth_container">
		<form method="POST" action="{{ route('login') }}">
		@csrf

			<label for="email">{{ __('E-Mail Address') }}</label>
			<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
			@error('email')
				<i>{{ $message }}</i>
			@enderror

			<label for="password">{{ __('Password') }}</label>
			<input id="password" type="password" name="password" required>
			@error('password')
				<i>{{ $message }}</i>
			@enderror
			
			<br />
			<div class="remember">
				<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				<label for="remember">{{ __('Remember Me') }}</label>
			</div>
			<br />

			<button type="submit">{{ __('Login') }}</button>

			@if (Route::has('password.request'))
			<br />
			<a href="{{ route('password.request') }}">
				{{ __('Forgot Your Password?') }}
			</a>
			<br /><br />
			@endif
		</form>
				You don't have account ?
		<br />
		<a href="{{ route('register') }}">Sing UP now!</a>
	</div>
</div>
@endsection
