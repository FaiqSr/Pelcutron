<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – Pelcutron</title>

    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>

<body class="antialiased text-zinc-800 bg-white">
<div class="min-h-screen grid grid-cols-12">

    <!-- Mobile top bar -->
    <div class="col-span-12 md:hidden flex items-center justify-between px-4 py-4 border-b border-zinc-200">
        <button id="openSidebarBtn" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Menu</button>
        <div class="flex items-center gap-2">
            <div class="h-6 w-6 rounded bg-zinc-900"></div>
            <div class="font-semibold">Pelcutron</div>
        </div>
        <a href="/" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Logout</a>
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
           class="col-span-12 md:col-span-2 border-r border-zinc-200 bg-zinc-50 p-4 md:block hidden fixed inset-y-0 left-0 w-72 z-40 md:static md:w-auto">

        <div class="flex items-center gap-2 mb-6">
            <div class="h-6 w-6 rounded bg-zinc-900"></div>
            <div class="font-semibold">Pelcutron</div>
        </div>

        <nav class="space-y-1 text-sm">
            <a href="#" class="block px-3 py-2 rounded-lg bg-white border border-zinc-200 font-medium">Dashboard</a>
            <a href="/dashboard-history" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Histori Data</a>
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
    <main class="col-span-12 md:col-span-10 p-4 sm:p-6 md:ml-0">

        <!-- HEADER -->
        <div class="flex items-center justify-between">
            <h1 class="text-lg sm:text-xl font-semibold">Dashboard Pelcutron</h1>
            <div id="lastSync" class="text-xs sm:text-sm text-zinc-600">Last sync: just now</div>
        </div>

        <!-- BUTTON INPUT SETTINGS -->
        <div class="mt-4">
            <button id="openSettingBtn"
                    class="px-4 py-2 bg-zinc-800 text-white rounded-lg text-sm hover:bg-zinc-700">
                Input Pengaturan
            </button>
        </div>

        <!-- CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

            <div class="rounded-xl bg-zinc-900 text-white p-4">
                <div class="text-sm text-zinc-300">Mode RPM</div>
                <div class="text-2xl font-semibold" id="rpmValue">1200</div>
                <div class="mt-2 text-xs text-zinc-400">Status: Stabil</div>
            </div>

            <div class="rounded-xl bg-zinc-900 text-white p-4">
                <div class="text-sm text-zinc-300">Target Berat Pelet</div>
                <div class="text-2xl font-semibold" id="beratValue">2.5 kg</div>
                <div class="mt-2 text-xs text-zinc-400">Akurasi Sensor Baik</div>
            </div>

            <div class="rounded-xl bg-zinc-600 text-white p-4">
                <div class="text-sm text-zinc-300">Daya Digunakan</div>
                <div class="text-2xl font-semibold" id="wattValue">85 W</div>
                <div class="mt-2 text-xs text-zinc-400">Real-time</div>
            </div>

            <div class="rounded-xl bg-zinc-600 text-white p-4">
                <div class="text-sm text-zinc-300">Biaya Pemakaian Daya</div>
                <div class="text-2xl font-semibold" id="rupiahValue">Rp 320</div>
                <div class="mt-2 text-xs text-zinc-400">Estimasi</div>
            </div>

        </div>

        <!-- GRAFIK -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="rounded-2xl border border-zinc-200 p-4">
                <div class="font-semibold mb-2">Grafik RPM</div>
                <canvas id="chartRPM" class="h-48"></canvas>
            </div>

            <div class="rounded-2xl border border-zinc-200 p-4">
                <div class="font-semibold mb-2">Grafik Berat Load Cell</div>
                <canvas id="chartBerat" class="h-48"></canvas>
            </div>

            <div class="rounded-2xl border border-zinc-200 p-4">
                <div class="font-semibold mb-2">Grafik Daya</div>
                <canvas id="chartWatt" class="h-48"></canvas>
            </div>

            <div class="rounded-2xl border border-zinc-200 p-4">
                <div class="font-semibold mb-2">Grafik Nilai Rupiah</div>
                <canvas id="chartRupiah" class="h-48"></canvas>
            </div>

        </div>

    </main>
</div>

<!-- ============ MODAL INPUT SETTINGS ============ -->
<div id="modalSetting"
     class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-[999]">

    <div class="bg-white rounded-2xl p-6 w-80 shadow-xl border border-zinc-200">
        <h2 class="text-lg font-semibold mb-4">Input Pengaturan Mesin</h2>

        <label class="text-sm text-zinc-700">Set Mode RPM</label>
        <select id="modalRPM"
                class="mt-1 w-full px-3 py-2 border border-zinc-300 rounded-lg">
            <option value="">Pilih Level RPM</option>
            <option value="800">Level 1 – 800 RPM</option>
            <option value="1000">Level 2 – 1000 RPM</option>
            <option value="1200">Level 3 – 1200 RPM</option>
            <option value="1400">Level 4 – 1400 RPM</option>
        </select>

        <label class="text-sm text-zinc-700 mt-4 block">Target Berat Pelet (Kg)</label>
        <input type="number" id="modalBerat"
               class="mt-1 w-full px-3 py-2 border border-zinc-300 rounded-lg"
               placeholder="Masukkan berat">

        <div class="flex justify-end gap-2 mt-6">
            <button id="closeSettingBtn"
                    class="px-3 py-2 rounded-lg text-sm border border-zinc-300">
                Batal
            </button>

            <button id="saveSettingBtn"
                    class="px-3 py-2 rounded-lg text-sm bg-zinc-800 text-white">
                Simpan
            </button>
        </div>
    </div>
</div>

<!-- SIDEBAR JS -->
<script>
    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('openSidebarBtn');
    const backdrop = document.getElementById('backdrop');

    openBtn && openBtn.addEventListener('click', () => {
        sidebar.classList.remove('hidden');
        backdrop.classList.remove('hidden');
    });

    backdrop && backdrop.addEventListener('click', () => {
        sidebar.classList.add('hidden');
        backdrop.classList.add('hidden');
    });
</script>

<!-- MODAL JS -->
<script>
    const modal = document.getElementById("modalSetting");
    document.getElementById("openSettingBtn").onclick = () => modal.classList.remove("hidden");
    document.getElementById("closeSettingBtn").onclick = () => modal.classList.add("hidden");

    document.getElementById("saveSettingBtn").onclick = () => {
        const rpm = document.getElementById("modalRPM").value;
        const berat = document.getElementById("modalBerat").value;

        alert("Setting disimpan!\nRPM: " + rpm + "\nBerat: " + berat);
        modal.classList.add("hidden");
    };
</script>

<!-- CHART + REALTIME FETCH -->
<script>
    function createChart(id, labelName) {
        return new Chart(document.getElementById(id), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: labelName,
                    data: [],
                    borderWidth: 2,
                    tension: 0.3
                }]
            }
        });
    }

    const chartRPM = createChart('chartRPM', 'RPM');
    const chartBerat = createChart('chartBerat', 'Berat (kg)');
    const chartWatt = createChart('chartWatt', 'Daya (W)');
    const chartRupiah = createChart('chartRupiah', 'Rupiah (Rp)');

    function updateChart(chart, value) {
        if (chart.data.labels.length > 20) chart.data.labels.shift();
        if (chart.data.datasets[0].data.length > 20) chart.data.datasets[0].data.shift();

        chart.data.labels.push('');
        chart.data.datasets[0].data.push(value);
        chart.update();
    }

    async function fetchRealtime() {
        try {
            const res = await fetch('/data-realtime');
            const data = await res.json();

            document.getElementById('wattValue').innerText = data.watt + ' W';
            document.getElementById('rupiahValue').innerText = 'Rp ' + data.rupiah;

            updateChart(chartRPM, data.rpm);
            updateChart(chartBerat, data.berat);
            updateChart(chartWatt, data.watt);
            updateChart(chartRupiah, data.rupiah);

            document.getElementById('lastSync').innerText =
                'Last sync: ' + new Date().toLocaleTimeString();

        } catch (error) {
            console.log("Error fetch API:", error);
        }
    }

    setInterval(fetchRealtime, 2000);

    // Tombol SIMPAN
    document.getElementById("saveSettingBtn").onclick = () => {
        const rpm = document.getElementById("modalRPM").value;
        const berat = document.getElementById("modalBerat").value;

        if (rpm === "" || berat === "") {
            alert("RPM dan Berat harus diisi!");
            return;
        }

        // Update card RPM
        document.getElementById("rpmValue").innerText = rpm + " RPM";

        // Update card berat
        document.getElementById("beratValue").innerText = berat + " Kg";

        // Tutup modal
        document.getElementById("modalSetting").classList.add("hidden");
    };



</script>

</body>
</html>
