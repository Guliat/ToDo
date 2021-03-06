@extends('layouts.app')

@section('sidemenu')
<aside class="menu pt-6 pl-5">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a class="sidemenu_background has-text-white">Home</a></li>
  </ul>
  <p class="menu-label">
    Categories
  </p>
  <ul class="menu-list">
    <li><a>Invitations</a></li>
    <li><a>Cloud Storage </a></li>
    <li><a>Authentication</a></li>
  </ul>
  <p class="menu-label">
    Statuses
  </p>
  <ul class="menu-list">
    <li><a>New</a></li>
    <li><a>Important</a></li>
    <li><a>Completed</a></li>
  </ul>
  <ul class="menu-list">
    <li>
      <form action="{{ route('logout') }}" method="POST">
		  @csrf
		    <button type="submit" class="button is-text" href="{{ route('logout') }}">Logout</button>
      </form>
    </li>
  </ul>
</aside>
@endsection
@section('content')
<div class="container pt-5">
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
    <livewire:crud />
  </div>
</div>
@endsection
@section('scripts')
<script>
// AUTOCOMPLETE
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
// END AUTOCOMPLETE
</script>
@endsection