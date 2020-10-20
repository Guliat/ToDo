@extends('layouts.app')

@section('content')
<div class="columns is-multiline is-centered">
  <div class="column is-6">
    <div class="box">
      <div class="has-text-centered is-size-3 mb-5">{{ __('Edit Todo Item') }}</div>
      <form action="{{ route('todo.update', $todo->id) }}" method="post">
      @csrf
      @method('put')
        <label for="name" class="label mt-3">{{ __('Name') }}</label>
				<textarea id="name" class="textarea @error('name') is-danger @enderror" name="name" required autocomplete="name" autofocus>{{ $todo->name }}</textarea>
				@error('name')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
        @enderror
        <label for="place" class="label mt-3">{{ __('Place') }}</label>
				<input id="place" type="text" class="input @error('place') is-danger @enderror" name="place" value="{{ $todo->place }}" required autocomplete="place" autofocus>
				@error('place')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
        @enderror
        <label for="due_date" class="label mt-3">{{ __('Due Date') }}</label>
				<input id="due_date" type="text" class="input @error('due_date') is-danger @enderror" name="due_date" value="{{ $todo->due_date }}" required autocomplete="off" autofocus>
				@error('due_date')
					<span role="alert">
						<strong class="has-text-danger">{{ $message }}</strong>
					</span>
        @enderror
        <label for="status" class="label mt-3">{{ __('Status') }}</label>
        <div id="status" class="select is-fullwidth">
          <select name="status">
            <option value="new" @if($todo->status == "new") selected @endif>New</option>
            <option value="urgent" @if($todo->status == "urgent") selected @endif>Urgent</option>
            <option value="completed" @if($todo->status == "completed") selected @endif>Completed</option>
            <option value="critical" @if($todo->status == "critical") selected @endif>Critical</option>
          </select>
        </div>
        <div class="buttons mt-5">
          <button type="submit" class="button is-success">Update</button>
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