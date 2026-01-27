<x-layout>
	<x-slot:title>
		Home pagina
	</x-slot:title>

	@auth
		<div class="grid h-full grid-cols-[1fr_3fr] gap-4">
			<div class="left-0 h-full shadow">
				<span class="font-bold">Notities van {{ auth()->user()->name }}</span>
				@forelse ($notes as $note)
					{{-- Maak dit ook echt een link die de notitie inhoud op juiste plek zet
                en maak het design wat beter --}}
					<div>{{ $note->title }}</div>
				@empty
					<div>Geen notities gevonden</div>
				@endforelse

			</div>
			<div id="UserNotesDisplayed" class="flex flex-col justify-center">
				<textarea name="Notitie-Title" id="NotitieTitel" placeholder="Titel van notitie" class="resize-none text-center">
                </textarea>
				<textarea name="Notitie-Content" id="NotitieContent" placeholder="Contents van notitie"
				 class="h-full w-full resize-none">
                </textarea>
				<button type="submit" class="btn btn-ghost">Sla op</button>
			</div>
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
