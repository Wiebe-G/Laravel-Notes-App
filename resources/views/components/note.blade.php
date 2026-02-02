@props(['note'])

<div class="card bg-base-100 shadow">
	<div class="card-body">
		<div class="flex flex-col space-x-3 text-center">
			<h1 class="font-semibold">{{ $note->title }}</h1>
			<p>{{ $note->content }}</p>

			<div class="flex gap-1">
				<span class="font-semibold">Gemaakt om {{ $note->created_at->diffForHumans() }}</span>

				@can('update', $note)
					<a href="/notes/{{ $note->id }}/edit" class="btn btn-ghost btn-xs">
						Bewerk notitie
					</a>
					<form method="POST" action="/notes/{{ $note->id }}">
						@csrf
						@method('DELETE')
						<button type="submit" onclick="return confirm('Weet je zeker dat je deze notitie wil verwijderen?')"
							class="btn btn-ghost btn-xs text-error">
							Verwijder
						</button>
					</form>
				@endcan
			</div>
		</div>
	</div>
</div>
