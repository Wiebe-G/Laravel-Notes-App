<x-layout>
    <x-slot:title>
        Home pagina
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            @auth
            <div>

            </div>
            @else
                <div class="card-body text-center">
                    <div>
                        <h1 class="font-bold">Niet ingelogd</h1>
                        <p><a href="/login" class="link link-primary">Log in</a> om uw taken te zien,
                            <br>
                            of <a href="/register" class="link link-primary">registeer</a> om taken op te slaan
                        </p>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</x-layout>