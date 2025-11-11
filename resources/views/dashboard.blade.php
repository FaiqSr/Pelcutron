<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard – E‑shrimp</title>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased text-zinc-800 bg-white">
	<div class="min-h-screen grid grid-cols-12">
		<!-- Mobile top bar -->
		<div class="col-span-12 md:hidden flex items-center justify-between px-4 py-4 border-b border-zinc-200">
			<button id="openSidebarBtn" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Menu</button>
			<div class="flex items-center gap-2">
				<div class="h-6 w-6 rounded bg-zinc-900"></div>
				<div class="font-semibold">E‑SHRIMP</div>
			</div>
			<a href="/" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Logout</a>
		</div>

		<!-- Sidebar -->
		<aside id="sidebar"
			class="col-span-12 md:col-span-2 border-r border-zinc-200 bg-zinc-50 p-4 md:block hidden fixed inset-y-0 left-0 w-72 z-40 md:static md:w-auto">
			<div class="flex items-center gap-2 mb-6">
				<div class="h-6 w-6 rounded bg-zinc-900"></div>
				<div class="font-semibold">E‑SHRIMP</div>
			</div>
			<nav class="space-y-1 text-sm">
				<a href="#" class="block px-3 py-2 rounded-lg bg-white border border-zinc-200 font-medium">Dashboard</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Data Monitoring</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Histori Data</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Daily Article</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Community</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Prediksi Pertumbuhan</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Kesehatan Kolam</a>
			</nav>
			<div class="mt-8">
				<div class="text-xs uppercase text-zinc-500 tracking-wide mb-1">Other</div>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Profil</a>
				<a href="/" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Logout</a>
			</div>
		</aside>
		<!-- Backdrop for mobile drawer -->
		<div id="backdrop" class="hidden fixed inset-0 bg-black/30 z-30 md:hidden"></div>

		<main class="col-span-12 md:col-span-10 p-4 sm:p-6 md:ml-0">
			<div class="flex items-center justify-between">
				<h1 class="text-lg sm:text-xl font-semibold">Kolan #1</h1>
				<div class="text-xs sm:text-sm text-zinc-600">Last sync: just now</div>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">pH</div>
					<div class="text-2xl font-semibold">7.2</div>
					<div class="mt-2 text-xs text-zinc-400">Status: Aman</div>
				</div>
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">Suhu</div>
					<div class="text-2xl font-semibold">28.5°C</div>
					<div class="mt-2 text-xs text-zinc-400">Status: Aman</div>
				</div>
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">Salinitas</div>
					<div class="text-2xl font-semibold">15.2‰</div>
					<div class="mt-2 text-xs text-zinc-400">Status: Stabil</div>
				</div>
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">Oksigen Terlarut</div>
					<div class="text-2xl font-semibold">7.2</div>
					<div class="mt-2 text-xs text-zinc-400">Status: Baik</div>
				</div>
			</div>

			<div class="mt-6 rounded-2xl border border-zinc-200 overflow-hidden">
				<div class="px-4 py-3 border-b border-zinc-200 font-semibold text-sm sm:text-base">Grafik Real‑time</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
					<div class="h-48 sm:h-56 rounded-lg bg-zinc-100"></div>
					<div class="h-48 sm:h-56 rounded-lg bg-zinc-100"></div>
				</div>
			</div>

			<div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
				<div class="rounded-2xl border border-zinc-200">
					<div class="px-4 py-3 border-b border-zinc-200 font-semibold text-sm sm:text-base">Aktivitas</div>
					<ul class="p-4 text-sm text-zinc-700 space-y-2">
						<li>• Pakan dijadwalkan pukul 17:00</li>
						<li>• Boat menyelesaikan rute patroli</li>
						<li>• pH turun sementara, kembali stabil</li>
					</ul>
				</div>
				<div class="rounded-2xl border border-zinc-200">
					<div class="px-4 py-3 border-b border-zinc-200 font-semibold text-sm sm:text-base">Catatan</div>
					<div class="p-4 text-sm text-zinc-700 leading-relaxed">
						Tambahkan catatan harian terkait tindakan, pengamatan, atau perawatan.
					</div>
				</div>
			</div>
		</main>
	</div>
	<script>
		const sidebar = document.getElementById('sidebar');
		const openBtn = document.getElementById('openSidebarBtn');
		const backdrop = document.getElementById('backdrop');
		function openSidebar() {
			sidebar.classList.remove('hidden');
			backdrop.classList.remove('hidden');
		}
		function closeSidebar() {
			sidebar.classList.add('hidden');
			backdrop.classList.add('hidden');
		}
		openBtn && openBtn.addEventListener('click', openSidebar);
		backdrop && backdrop.addEventListener('click', closeSidebar);
		// Close on ESC
		window.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeSidebar(); });
	</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
=======
>>>>>>> a5f30bdb649415f4c8df1024e3625130eca19df0
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>