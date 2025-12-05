<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pelcutron – Smart Pellet-Shredding</title>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<style>
	html {
    scroll-behavior: smooth;
	}
</style>
<body class="antialiased text-zinc-800 bg-white">
	<header class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-zinc-200">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 py-4 flex items-center justify-between">
			<div class="flex items-center gap-3">
				<img src="/image/logo-pelcutron.png" alt="Logo" class="h-10 w-10 object-contain rounded" />
				<span class="font-semibold">Pelcutron</span>
			</div>
			<nav class="hidden md:flex items-center gap-6 text-sm">
				<a href="#home" class="hover:text-zinc-900 text-zinc-600">Home</a>
				<a href="#features" class="hover:text-zinc-900 text-zinc-600">Product</a>
				<a href="#boat" class="hover:text-zinc-900 text-zinc-600">Pellet Shredder</a>
				<a href="#contact" class="hover:text-zinc-900 text-zinc-600">Contact</a>
			</nav>
			<div class="flex items-center gap-2">
				<a href="/login" class="px-3 py-1.5 rounded-full text-sm border border-zinc-300 hover:bg-zinc-50">Log in</a>
				<a href="#contact" class="px-4 py-1.5 rounded-full text-sm bg-zinc-900 text-white hover:bg-zinc-800">Get Started</a>
			</div>
		</div>
	</header>

	<main>
		<section class="relative">
			<div id="home" class="mx-auto max-w-7xl px-4 sm:px-6 pt-14 pb-16 grid lg:grid-cols-2 gap-10 items-center">
				<div class="space-y-6">
					<div class="inline-flex items-center gap-2 rounded-full border border-zinc-200 px-3 py-1 text-xs text-zinc-600">
						<span class="inline-block h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
						Empowering Smart Poultry Feeding
					</div>
					<h1 class="text-4xl sm:text-5xl font-semibold tracking-tight">
						Automate <span class="text-zinc-500 font-normal">Pellet-Shredding with</span> Pelcutron System
					</h1>
					<p class="text-zinc-600 max-w-xl">
					Real-time monitoring for pellet-shredding performance with RPM, load, power, and cost graphs—Pelcutron keeps your machine efficient and reliable.


					</p>
					<div class="flex flex-wrap gap-3">
						<a href="#order"><button class="px-5 py-2 rounded-full bg-zinc-900 text-white hover:bg-zinc-800 text-sm">Order Now!</button></a>
						<a href="#features"><button class="px-5 py-2 rounded-full border border-zinc-300 hover:bg-zinc-50 text-sm">Learn More</button></a>
					</div>
					<div class="flex items-center gap-6 pt-2 text-sm text-zinc-600">
						<div><span class="font-semibold text-zinc-900">Version</span> 1.0</div>
						<div class="hidden sm:block h-4 w-px bg-zinc-300"></div>
						<div class="flex items-center gap-2">
							<span class="font-semibold text-zinc-900">50+</span> farmers helped
							<div class="flex -space-x-2">
								<div class="h-5 w-5 rounded-full bg-zinc-900"></div>
								<div class="h-5 w-5 rounded-full bg-zinc-700"></div>
								<div class="h-5 w-5 rounded-full bg-zinc-500"></div>
								<div class="h-5 w-5 rounded-full bg-zinc-300"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="relative">
					<div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-lg">
						<img src="/image/peternak-ayam.png" alt="Shrimp illustration" class="w-full h-full object-cover object-center max-h-[560px] mx-auto">
					</div>
				</div>
			</div>
		</section>

		<section id="features" class="py-10 sm:py-16">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 grid lg:grid-cols-2 gap-10 items-center">
				<div class="aspect-[16/10] rounded-2xl overflow-hidden shadow-lg">
						<img src="/image/pencacah-ayam.jpg" alt="Shrimp illustration" class="w-full h-full object-cover object-center max-h-[560px] mx-auto">
				</div>
				<div>
					<h2 class="text-3xl sm:text-4xl font-semibold leading-tight">
						Digitilize Poultry Feed Processing<span class="text-zinc-500 font-normal">Through Innovation</span>
					</h2>
					<p class="text-zinc-600 mt-4">Designed to enhance efficiency and precision, Pelcutron provides real-time insights that help optimize every stage of pellet shredding.</p>
				</div>
			</div>

			<div class="mx-auto max-w-7xl px-4 sm:px-6 mt-10">
				<div class="rounded-2xl border border-zinc-200 p-6 sm:p-8 bg-white/60">
					<div class="grid sm:grid-cols-3 gap-8">
						<div class="space-y-2">
							<div class="h-10 w-10 rounded-lg bg-zinc-900 flex items-center justify-center">
								<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
								</svg>
							</div>
							<h3 class="font-semibold">IoT Sensor Ready</h3>
							<p class="text-sm text-zinc-600">Monitor machine performance with integrated sensors and automate routine checks to save time.</p>
						</div>
						<div class="space-y-2">
							<div class="h-10 w-10 rounded-lg bg-zinc-700 flex items-center justify-center">
								<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
								</svg>
							</div>
							<h3 class="font-semibold">Real-Time Visualization</h3>
							<p class="text-sm text-zinc-600">Track RPM, load, power usage, and output weight through clear, real-time dashboard graphs.</p>
						</div>
						<div class="space-y-2">
							<div class="h-10 w-10 rounded-lg bg-zinc-500 flex items-center justify-center">
								<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
								</svg>
							</div>
							<h3 class="font-semibold">Performance Optimization</h3>
							<p class="text-sm text-zinc-600">Analyze trends to maintain machine stability and ensure consistent pellet quality.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="boat" class="py-10 sm:py-16 bg-zinc-50">
			<div class="mx-auto max-w-7xl px-4 sm:px-6">
				<h2 class="text-2xl sm:text-3xl font-semibold mb-6 text-center md:text-left">IoT-Based Monitoring System</h2>
				<div class="grid lg:grid-cols-2 gap-8">
					<div class="space-y-4">
						<div class="rounded-xl border border-zinc-200 p-5 bg-white">
							<h3 class="font-semibold mb-2">Pelcutron Smart Pellet Shredder</h3>
							<ul class="text-sm text-zinc-600 space-y-1 list-disc pl-5">
								<li>Real-time RPM, load, power, output weight</li>
								<li>Precision Control</li>
								<li>Wi-Fi/Bluetooth connectivity</li>
							</ul>
						</div>
						<div class="grid sm:grid-cols-3 gap-4">
							<div class="rounded-xl border border-zinc-200 p-4 text-center bg-white">
								<div class="text-2xl font-semibold">100%</div>
								<div class="text-xs text-zinc-600">Feed Processing Ready</div>
							</div>
							<div class="rounded-xl border border-zinc-200 p-4 text-center bg-white">
								<div class="text-2xl font-semibold">On-Demand</div>
								<div class="text-xs text-zinc-600">Performance monitoring whenever you operate</div>
							</div>
							<div class="rounded-xl border border-zinc-200 p-4 text-center bg-white">
								<div class="text-2xl font-semibold">0 → 1</div>
								<div class="text-xs text-zinc-600">Transforming traditional feed processing</div>
							</div>
						</div>
					</div>
					<div class="aspect-[4/3] aspect-[4/3] rounded-2xl overflow-hidden shadow-lg">
						<img src="/image/pencacah-ayam.jpg" alt="Aquaculture technician" class="w-full h-full object-cover">
					</div>
				</div>

				<div class="grid lg:grid-cols-2 gap-8 mt-8">
					<div class="rounded-2xl border border-zinc-200 p-5 bg-white">
						<h3 class="font-semibold mb-3">Features</h3>
						<div class="grid sm:grid-cols-2 gap-4 text-sm text-zinc-600">
							<ul class="list-disc pl-5 space-y-1">
								<li>Real-time RPM Monitoring</li>
								<li>Load/Current Sensor</li>
								<li>Output Weight Measurement</li>
							</ul>
							<ul class="list-disc pl-5 space-y-1">
								<li>Load & Power Tracking</li>
							</ul>
						</div>
					</div>
					<div class="rounded-2xl border border-zinc-200 p-5 bg-white">
						<h3 class="font-semibold mb-3">Integrated Monitoring System</h3>
						<div class="grid sm:grid-cols-2 gap-4 text-sm text-zinc-600">
							<ul class="list-disc pl-5 space-y-1">
								<li>Real-time performance charts</li>
								<li>Efficiency and output insights</li>
								<li>Cost & energy usage tracker</li>
							</ul>
							<ul class="list-disc pl-5 space-y-1">
								<li>Maintenance guide</li>
								<li>User community support</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="order" class="py-12 sm:py-16 bg-zinc-50">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 grid lg:grid-cols-2 gap-10 items-center">
				<div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-lg">
					<img src="/image/peternak-ayam2.png" alt="Happy farmer" class="w-full h-full object-cover">
				</div>
				<div>
					<h3 class="text-2xl sm:text-3xl font-semibold">Order Now <span class="text-zinc-500 font-normal">Your Pelcutron System</span></h3>
					<p class="text-zinc-600 mt-3">Bring automation and data-driven control to your feed processing.</p>
					<div class="mt-6">
						<a href="https://wa.me/6285694014009"><button class="px-5 py-2 rounded-full bg-zinc-900 text-white hover:bg-zinc-800 text-sm">Contact Sales</button></a>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer id="contact" class="border-t border-zinc-200 py-10">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 grid md:grid-cols-4 gap-8 text-sm">
			<div class="space-y-2">
				<div class="flex items-center gap-2">
					<div class="h-6 w-6 rounded bg-zinc-900"></div>
					<span class="font-semibold">Pelcutron</span>
				</div>
				<p class="text-zinc-600">Transform pellet shredding with smart, data-driven technology.</p>
				<p class="text-zinc-500">&copy; <span id="y"></span> Pelcutron. All rights reserved.</p>
			</div>
			<div>
				<div class="font-semibold mb-2">Product</div>
				<ul class="space-y-1 text-zinc-600">
					<li><a href="#features" class="hover:text-zinc-900">Features</a></li>
					<li><a href="#boat" class="hover:text-zinc-900">Monitoring Boat</a></li>
				</ul>
			</div>
			<div>
				<div class="font-semibold mb-2">Company</div>
				<ul class="space-y-1 text-zinc-600">
					<li><a href="#" class="hover:text-zinc-900">About</a></li>
					<li><a href="#" class="hover:text-zinc-900">Blog</a></li>
					<li><a href="#" class="hover:text-zinc-900">Careers</a></li>
				</ul>
			</div>
			<div>
				<div class="font-semibold mb-2">Quick Contact</div>
				<ul class="space-y-1 text-zinc-600">
					<li>Email: hello@pelcutron.app</li>
					<li>Phone: +62 812‑3456‑7890</li>
					<li>Address: Indonesia</li>
				</ul>
			</div>
		</div>
		<script>
			document.getElementById('y').textContent = new Date().getFullYear();
		</script>
	</footer>
</body>
</html>


