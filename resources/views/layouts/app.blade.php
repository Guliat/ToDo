<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<!-- Scripts -->
		<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		{{-- TODO: move only in needed views with yield 'styles' --}}
			@livewireStyles
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
		{{-- END TODO --}}
	</head>
	<body class="has-navbar-fixed-top">
		<div class="container is-fluid">
			{{-- TODO: move "nav" in partial view --}}
			<nav class="navbar is-dark is-fixed-top" role="navigation" aria-label="main navigation">
				<div class="navbar-brand">
					<a class="ml-3 mt-2 is-size-4" style="font-family: Caveat;" href="{{ url('/') }}">
						{{ config('app.name', 'Laravel') }}
					</a>
					<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>
				<div id="navbarBasicExample" class="navbar-menu">
					<div class="navbar-start ml-5">
						<a href="{{ route('todo.index') }}" class="navbar-item">
							Todos
						</a>
					</div>

					<div class="navbar-end">
						<div class="navbar-item">
							<div class="buttons">
								<!-- Authentication Links -->
								@guest
									<a class="button is-light" href="{{ route('login') }}">{{ __('Login') }}</a>
									@if (Route::has('register'))
										<a class="button is-success" href="{{ route('register') }}">{{ __('Register') }}</a>
									@endif
								@endguest
							</div>
						</div>
						<div class="navbar-item">
							@if(Auth::check())
								<div class="navbar-item has-dropdown is-hoverable">
									<a class="navbar-link">
											{{ Auth::user()->name }} {{ Auth::user()->lastname }}
									</a>
									<div class="navbar-dropdown">
										<a href="#" class="navbar-item is-size-5">
											---
										</a>
										<a href="#" class="navbar-item is-size-5">
											---
										</a>
										<form action="{{ route('logout') }}" method="POST">
											@csrf
											<button type="submit" class="button is-text is-size-5" href="{{ route('logout') }}">
												{{ __('Logout') }}
											</button>
										</form>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>
			</nav>
			<div class="py-4">
					@yield('content')
			</div>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
		{{-- TODO: move only in needed views with yield 'scripts' --}}
			@livewireScripts
		{{-- END TODO --}}
		@yield('scripts')
	</body>
</html>
