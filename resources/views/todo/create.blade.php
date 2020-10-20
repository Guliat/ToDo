@extends('layouts.app')

@section('content')
<div class="columns is-multiline is-centered">
  <div class="column is-6">
    <div class="box">
      <div class="has-text-centered is-size-3 mb-5">{{ __('New Todo Item') }}</div>
      <form action="{{ route('todo.store') }}" method="post">
      @csrf
        <label for="name" class="label mt-3">{{ __('Name') }}</label>
				<textarea id="name" class="textarea @error('name') is-danger @enderror" name="name" required autocomplete="name" autofocus>{{ old('name') }}</textarea>
				@error('name')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
        @enderror
        <label for="place" class="label mt-3">{{ __('Place') }}</label>
				<input id="place" type="text" class="input @error('place') is-danger @enderror" name="place" value="{{ old('place') }}" required autocomplete="place" autofocus>
				@error('place')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
        @enderror
        <label for="due_date" class="label mt-3">{{ __('Due Date') }}</label>
        <input id="due_date" type="text" class="input @error('due_date') is-danger @enderror" name="due_date" value="" required autocomplete="off">
				@error('due_date')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
        @enderror
        <label for="status" class="label mt-3">{{ __('Status') }}</label>
        <div id="status" class="select is-fullwidth">
          <select name="status">
            <option value="new">New</option>
            <option value="urgent">Urgent</option>
            <option value="completed">Completed</option>
            <option value="critical">Critical</option>
          </select>
        </div>
        <div class="buttons mt-5">
          <button type="submit" class="button is-success">Save</button>
          <a href="{{ route('todo.index') }}" class="button is-danger is-outlined">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="pikaday.js"></script>
<script>
    var picker = new Pikaday({ field: document.getElementById('due_date') });
</script>
@endsection