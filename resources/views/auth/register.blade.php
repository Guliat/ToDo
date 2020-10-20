@extends('layouts.app')

@section('content')
<div class="columns is-centered">
	<div class="column is-4">
		<div class="box">
			<div class="has-text-centered is-size-3 mb-5">{{ __('New Registration') }}</div>
			<form method="POST" action="{{ route('register') }}">
			@csrf
				{{-- NAME INPUT --}}
				<label for="name" class="label mt-3">{{ __('Name') }}</label>
				<input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				@error('name')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				{{-- LASTNAME INPUT --}}
				<label for="lastname" class="label mt-3">{{ __('Lastname') }}</label>
				<input id="lastname" type="text" class="input @error('lastname') is-danger @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
				@error('lastname')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				{{-- EMAIL INPUT --}}
				<label for="email" class="label mt-3">{{ __('E-Mail Address') }}</label>
				<input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
				@error('email')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				{{-- AGE INPUT --}}
				<label for="age" class="label mt-3">{{ __('Age') }}</label>
				<input id="age" type="number" class="input @error('age') is-danger @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>
				@error('age')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				{{-- PASSWORD INPUT --}}
				<label for="password" class="label mt-3">{{ __('Password') }}</label>
				<input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">
				@error('password')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
				@enderror
				{{-- CONFIRM PASSWORD INPUT --}}
				<label for="password-confirm" class="label mt-3">{{ __('Confirm Password') }}</label>
				<input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
				<button type="submit" class="button is-success is-medium is-outlined mt-5">
						{{ __('Register') }}
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
