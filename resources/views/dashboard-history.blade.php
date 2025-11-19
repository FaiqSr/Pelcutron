<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Data – Pelcutron</title>

    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        table th, table td { white-space: nowrap; } /* supaya text tabel tidak wrap */
    </style>
</head>

<body class="antialiased text-zinc-800 bg-white">
<div class="min-h-screen grid grid-cols-12">

    <!-- Mobile Top Bar -->
    <div class="col-span-12 md:hidden flex items-center justify-between px-3 py-3 border-b border-zinc-200">
        <button id="openSidebarBtn" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Menu</button>
        <div class="flex items-center gap-2">
            <div class="h-6 w-6 rounded bg-zinc-900"></div>
            <div class="font-semibold">Pelcutron</div>
        </div>
        <a href="/" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Logout</a>
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
           class="col-span-12 md:col-span-2 border-r border-zinc-200 bg-zinc-50 p-4 md:block hidden fixed inset-y-0 left-0 w-64 sm:w-72 z-40 md:static md:w-auto transition-transform duration-200">

        <div class="flex items-center gap-2 mb-6">
            <div class="h-6 w-6 rounded bg-zinc-900"></div>
            <div class="font-semibold">Pelcutron</div>
        </div>

        <nav class="space-y-1 text-sm">
            <a href="/dashboard" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Dashboard</a>
            <a href="/dashboard-history" class="block px-3 py-2 rounded-lg bg-white border border-zinc-200 font-medium">Histori Data</a>
        </nav>

        <div class="mt-8">
            <div class="text-xs uppercase text-zinc-500 tracking-wide mb-1">Other</div>
            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Profil</a>
            <a href="/" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Logout</a>
        </div>
    </aside>

    <!-- Backdrop -->
    <div id="backdrop" class="hidden fixed inset-0 bg-black/30 z-30 md:hidden"></div>

    <!-- MAIN -->
    <main class="col-span-12 md:col-span-10 p-3 sm:p-6 md:ml-72 transition-all duration-200 w-full">

        <h1 class="text-lg sm:text-xl font-semibold mb-6">Histori Data Mesin</h1>

        <!-- TABLE -->
        <div class="overflow-x-auto rounded-xl border border-zinc-200 -mx-3 sm:-mx-6">
            <table class="min-w-[600px] sm:min-w-full text-sm w-full">
                <thead class="bg-zinc-100 text-zinc-600">
                <tr>
                    <th class="px-4 py-3 text-left">Timestamp</th>
                    <th class="px-4 py-3 text-left">RPM</th>
                    <th class="px-4 py-3 text-left">Berat (Kg)</th>
                    <th class="px-4 py-3 text-left">Daya (W)</th>
                    <th class="px-4 py-3 text-left">Biaya (Rp)</th>
                </tr>
                </thead>

                <tbody id="historyTable" class="divide-y divide-zinc-200 ">
                    <!-- Auto-filled via JS -->
                </tbody>
            </table>
        </div>

        <div id="lastSync" class="text-xs text-zinc-600 mt-4">Last sync: just now</div>

    </main>
</div>
<style>
    table th, table td {
        white-space: nowrap;
        text-align: left; /* tambah ini */
    }
</style>


<!-- SIDEBAR JS -->
<script>
    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('openSidebarBtn');
    const backdrop = document.getElementById('backdrop');

    openBtn && openBtn.addEventListener('click', () => {
        sidebar.classList.remove('hidden');
        backdrop.classList.remove('hidden');
        sidebar.style.transform = 'translateX(0)';
    });

    backdrop && backdrop.addEventListener('click', () => {
        sidebar.classList.add('hidden');
        backdrop.classList.add('hidden');
    });
</script>

<!-- FETCH HISTORY -->
<script>
    async function loadHistory() {
        try {
            const res = await fetch('/history-realtime');
            const data = await res.json();

            const table = document.getElementById('historyTable');
            table.innerHTML = "";

            data.reverse().forEach(item => {
                const row = `
                    <tr class="hover:bg-zinc-50">
                        <td class="px-4 py-3">${item.timestamp}</td>
                        <td class="px-4 py-3">${item.rpm}</td>
                        <td class="px-4 py-3">${item.berat}</td>
                        <td class="px-4 py-3">${item.watt}</td>
                        <td class="px-4 py-3">Rp ${item.rupiah}</td>
                    </tr>
                `;
                table.innerHTML += row;
            });

            document.getElementById("lastSync").innerText =
                "Last sync: " + new Date().toLocaleTimeString();

        } catch (err) {
            console.log("Error loading history:", err);
        }
    }

    setInterval(loadHistory, 3000);
    loadHistory();
</script>

</body>
</html>
