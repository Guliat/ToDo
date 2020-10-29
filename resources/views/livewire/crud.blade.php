<table class="table is-fullwidth">
	@foreach($data as $todo)
	<tr><td>
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
							<button onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()" wire:click="destroy({{$todo->id}})" class="button is-danger"><i class="fa fa-trash"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</td></tr>
	@endforeach
</table>