@extends('layouts.app')

@section('content')
<div class="columns is-multiline is-centered">
  <div class="column is-4">
    <div class="box">
      <a href="{{ route('todo.index') }}" class="button is-dark">BACK</a>
      <a href="{{ route('todo.edit', $todo->id) }}" class="button is-success">EDIT</a>
      <hr />

      {{ $todo->name }}
      <hr />
      <strong>Place:</strong>
      {{ $todo->place }} <br />
      <strong>Due Date:</strong>
      {{ date("d F Y", strtotime($todo->due_date)) }} <hr />
      <strong>Status:</strong>
      {{ $todo->status }}

    </div>
  </div>
</div>
@endsection