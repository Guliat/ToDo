<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title>{{ config('app.name', 'Laravel') }}</title>
		<!-- Fonts -->
	  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}?v=2" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
		{{-- TODO: move only in needed views with yield 'styles' --}}
		@livewireStyles
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
		{{-- END TODO --}}
	</head>
	<body>
		<div class="columns">
			<div class="column is-2">
				@yield('sidemenu')
			</div>
			<div class="column is-10">
				@yield('content')
			</div>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('scripts')
		{{-- TODO: move only in needed views with yield 'scripts' --}}
			@livewireScripts
		{{-- END TODO --}}
	</body>
</html>
