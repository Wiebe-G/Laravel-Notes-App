<x-layout>
	<x-slot:title>
		Home pagina
	</x-slot:title>

	@auth
		<h1 class="bg-base-100 text-center font-bold shadow">Notities van {{ auth()->user()->name }}
		</h1>
		{{-- ({{ auth()->user()->notes()->count() }}) --}}
		<div class="grid h-full grid-cols-4 gap-4">
			<div class="card-body bg-base-100 shadow">
				<h1>Nieuwe notitie</h1>
				<form method="POST" action="/notes">
					@csrf
					<div class="form-control w-full text-black">
						<textarea name="title" id="NoteTitle" placeholder="Titel"
						 class="textarea textarea-bordered @error('message') textarea-error
					@enderror w-full resize-none" rows="4"
						 {{ old('message') }} maxlength="250" required>
					 </textarea>

						<textarea name="content" id="NoteBody" placeholder="Content"
						 class="textarea textarea-bordered @error('message') textarea-error
					@enderror w-full resize-none" rows="4"
						 {{ old('message') }} maxlength="2000" required></textarea>

						@error('message')
							<div class="label">
								<span class="label-text-alt text-error">{{ $message }}</span>
							</div>
						@enderror

						<div class="mt-4 flex items-center justify-end">
							<button type="submit" class="btn btn-primary btn-sm">
								Sla op
							</button>
						</div>
					</div>
				</form>
			</div>
			@forelse($notes as $note)
				<x-note :note="$note" />
			@empty
				{{-- Maak het zodat dit een animatie speelt en een modal in het scherm opent --}}
				<h1>Geen notities </h1>
			@endforelse
			<dialog id="NoteDialog">
				<textarea name="NoteTitle" id="NoteTitle" placeholder="Titel"></textarea>
				<form method="dialog">
					<button type="submit">Sla op</button>
				</form>
			</dialog>
		</div>
	@else
		<div class="card-body items-center text-center">
			<div>
				<h1 class="font-bold">Niet ingelogd</h1>
				<p><a href="/login" class="link link-primary">Log in</a> om uw taken te zien,
					<br>
					of <a href="/register" class="link link-primary">registeer</a> om taken op te slaan
				</p>
			</div>
		</div>
	@endauth
</x-layout>
