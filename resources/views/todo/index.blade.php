@extends('layouts.app')

@section('content')
<div class="columns is-multiline" id="todos">
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
    <div>
      <form action="{{ route('todo.search') }}" method="post">
      @csrf
        <b-field label="Find a ToDo">
          <b-autocomplete
          rounded
          name="todo"
          icon-pack="fa"
          icon="magic"
          v-model="todo_name"
          :data="filteredExchangeArray"
          placeholder="autocomplete field"
          open-on-focus="openOnFocus"
          clearable="clearable"
          icon-right="caret-down"
          @select="option => selected = option">
          </b-autocomplete>
          <template slot="empty">No results found</template>
        </b-field>
        <button type="submit" class="button is-success is-rounded">Go to this ToDo</button>
      </form>
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
            @if(Session::get('sort_name') == 'asc') 
            <form method="post" action="{{ route('sort.name.desc') }}">
              @csrf
              @method('put')
              <button type="submit" class="button is-white" >
              <span>Name</span>
              <span class="icon">
                <i class="fa fa-arrow-down"></i>
              </span>
              </button>
            </form>
            @else
            <form method="post" action="{{ route('sort.name.asc') }}">
              @csrf
              @method('put')
              <button type="submit" class="button is-white" >
                <span>Name</span>
                <span class="icon">
                  <i class="fa fa-arrow-up"></i>
                </span>
              </button>
            </form>
            @endif
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
            <div class="columns">
              <div class="column is-8">
                <div class="columns is-multiline">
                  <div class="column is-12 is-size-5" >
                    {{ $todo->name }}
                  </div>
                  <div class="column is-12">
                    <span class="is-size-5">
                      Due Date: {{ date("d F Y", strtotime($todo->due_date)) }}
                    </span>
                  </div>
                </div>
              </div>
              <div class="column is-4 is-size-3">
                <div class="columns is-multiline">
                  <div class="column is-12 is-size-5">
                    Place: {{ $todo->place }}
                  </div>
                  <div class="column is-12">
                    <span class="is-size-5">
                      Status: {{ $todo->status }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
					</div>
					<div class="column is-2">
						<div class="buttons has-addons is-right">
							<a href="{{ route('todo.edit', $todo->id) }}" class="button is-info">
								<i class="fa fa-marker"></i>
              </a>
              <form action="{{ route('todo.destroy', $todo->id) }}" method="post">
                @csrf
                @method('delete')
                  <button type="submit" class="button is-danger">
                    <i class="fa fa-trash"></i>
                  </button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
  @endforeach
</div>
@endsection
@section('scripts')
<script>
new Vue({
  el: '#todos',
  data: {
    todo_name: '',
    selected: null,
    todo: [<?php foreach($todos as $todo) { echo "'$todo->name'".', '; } ?>],
  },
  computed: {
    filteredExchangeArray() {
      return this.todo.filter((option) => {
      return option
        .toString()
        .toLowerCase()
        .indexOf(this.todo_name.toLowerCase()) >= 0
      })
    }
  },
});
</script>
@endsection