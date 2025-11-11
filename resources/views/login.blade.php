<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login – E‑shrimp</title>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased text-zinc-800 bg-white">
	<div class="min-h-screen grid md:grid-cols-2">
		<div class="bg-zinc-100/80 flex items-center justify-center p-6">
			<div class="w-full max-w-md">
				<div class="mb-8">
					<div class="inline-flex items-center gap-2">
						<div class="h-6 w-6 rounded bg-zinc-900"></div>
						<span class="font-semibold">E‑Shrimp</span>
					</div>
				</div>
				<div class="rounded-2xl bg-white/70 backdrop-blur p-6 shadow-sm border border-zinc-200">
					<h1 class="text-lg font-semibold text-zinc-900">Welcome Back</h1>
					<p class="text-sm text-zinc-600 mt-1">Masuk untuk memantau atau mengelola tambak udang.</p>

					<a href="#" class="mt-6 w-full inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-300 bg-white px-4 py-2.5 text-sm hover:bg-zinc-50">
						<div class="h-4 w-4 rounded bg-zinc-900"></div>
						<span>Continue with Google</span>
					</a>

					<div class="mt-6 flex items-center justify-between text-sm">
						<span class="text-zinc-600">Belum punya akun?</span>
						<a href="#" class="text-zinc-900 font-medium hover:underline">Daftar Now</a>
					</div>
				</div>
				<div class="mt-6 text-center">
					<a href="/" class="text-sm text-zinc-600 hover:text-zinc-900">← Kembali ke Landing</a>
				</div>
			</div>
		</div>
		<div class="relative hidden md:block">
			<div class="absolute inset-0 flex items-center justify-center px-8">
				<div class="max-w-lg text-center">
					<div class="text-4xl font-semibold tracking-tight">E‑SHRIMP</div>
					<div class="text-zinc-600 mt-1">The best monitoring system</div>
					<div class="mt-6 aspect-[3/4] rounded-2xl bg-zinc-200"></div>
					<div class="mt-8 grid grid-cols-2 gap-4 text-sm text-zinc-700">
						<ul class="space-y-2">
							<li>Data Analytics</li>
							<li>Real‑time Monitoring</li>
						</ul>
						<ul class="space-y-2">
							<li>Smart Alerts</li>
							<li>Export Reports</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


