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