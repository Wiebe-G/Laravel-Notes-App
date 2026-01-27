<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ isset($title) ? $title . ' - Notion clone' : 'Notion clone' }}</title>
	<link rel="preconnect" href="<https://fonts.bunny.net>">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
	<link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
	@vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="bg-base-200 flex min-h-screen flex-col font-sans">
	<nav class="navbar bg-base-100">
		<div class="navbar-start">
			<a href="/" class="btn btn-ghost text-xl">Notion clone</a>
		</div>
		<div class="navbar-end gap-2">
			@auth
				<div>
					<span class="text-sm">{{ auth()->user()->name }}</span>
					<form method="POST" action="{{ route('logout') }}" class="inline">
						@csrf
						<button type="submit" class="btn btn-ghost btn-sm">Log uit</button>
					</form>
				</div>
			@else
				<a href="/login" class="btn btn-ghost btn-sm">Log in</a>
				<a href="/register" class="btn btn-primary btn-sm">Maak account</a>
			@endauth
		</div>
	</nav>

	<main class="container mx-auto flex-1 px-4 py-8">
		{{ $slot }}
	</main>

	<footer class="footer footer-center bg-base-300 text-base-content p-5 text-xs">
		<div>
			<p>© {{ date('Y') }} Notion clone - Built with Laravel and ❤️</p>
		</div>
	</footer>
</body>

</html>
