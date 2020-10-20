@extends('layouts.app')

@section('content')
<div class="columns is-centered">
	<div class="column is-4">
		<div class="box">
      <div class="has-text-centered is-size-3 mb-5">{{ __('Login') }}</div>
			<form method="POST" action="{{ route('login') }}">
			@csrf
				<label for="email" class="label mt-3">{{ __('E-Mail Address') }}</label>
				<input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				@error('email')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				<label for="password" class="label mt-3">{{ __('Password') }}</label>
				<input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
				@error('password')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				<div class="mt-4">
					<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
					<label class="form-check-label" for="remember">
					{{ __('Remember Me') }}
					</label>
				</div>
				<div class="mt-5">

					<button type="submit" class="button is-medium is-success">{{ __('Login') }}</button>
					@if (Route::has('password.request'))
					<br />
					<a class="" href="{{ route('password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
					@endif
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
