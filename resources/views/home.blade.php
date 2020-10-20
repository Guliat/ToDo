@extends('layouts.app')

@section('content')
<div class="columns is-multiline">
	<div class="column is-2">
		<a href="{{ route('todo.create') }}" class="button is-success is-medium">
			<span class="icon"><i class="fa fa-plus"></i></span>
			<span>Add new Todo</span>
		</a>
	</div>
	<div class="column is-8 is-size-1 has-text-centered" style="font-family: Caveat;">
		ToDo List
	</div>
	<div class="column is-6">
		<div class="field has-addons">
			<div class="control is-expanded has-icons-left has-icons-right">
				<input class="input is-rounded" type="text" placeholder="search...">
				<span class="icon is-small is-left">
					<i class="fas fa-search"></i>
				</span>
			</div>
			<div class="control">
				<button type="submit" class="button is-success is-rounded">Search</button>
			</div>
		</div>
	</div>
	<div class="column is-6 has-text-right">
		<div class="dropdown is-hoverable is-right">
			<div class="dropdown-trigger">
				<button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
					<span>Filters</span>
					<span class="icon is-small">
						<i class="fas fa-filter" aria-hidden="true"></i>
					</span>
				</button>
			</div>
			<div class="dropdown-menu" id="dropdown-menu4" role="menu">
				<div class="dropdown-content">
					<div class="dropdown-item">
						<a href="#" class="navbar-item">
							<span class="icon"><i class="fa fa-arrow-up"></i></span>
							<span>Name</span> 
						</a>
						<a href="#" class="navbar-item">
							<span class="icon"><i class="fa fa-arrow-down"></i></span>
							<span>Name</span> 
						</a>
						<hr class="navbar-divider">
						<a href="#" class="navbar-item">
							<span class="icon"><i class="fa fa-arrow-up"></i></span>
							<span>Place</span> 
						</a>
						<a href="#" class="navbar-item">
							<span class="icon"><i class="fa fa-arrow-down"></i></span>
							<span>Place</span> 
						</a>
						<hr class="navbar-divider">
						<a href="#" class="navbar-item">
							<span class="icon"><i class="fa fa-arrow-up"></i></span>
							<span>Status</span> 
						</a>
						<a href="#" class="navbar-item">
							<span class="icon"><i class="fa fa-arrow-down"></i></span>
							<span>Status</span> 
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@foreach($todos as $todo)
		<div class="column is-12">
			<div class="box">
				<div class="columns">
					<div class="column is-10">
						{{ $todo->name }}
					</div>
					<div class="column is-2">
						<div class="buttons has-addons is-right">
							<a href="{{ route('todo.edit', $todo->id) }}" class="button is-info">
								<i class="fa fa-marker"></i>
							</a>
							<a href="#" class="button is-danger">
								<i class="fa fa-trash"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>

@endsection
