<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – Pelcutron</title>

    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@3/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>
</head>

<body class="antialiased text-zinc-800 bg-white">
    <header class="col-span-12 md:hidden flex items-center justify-between px-4 py-4 border-b border-zinc-200">
        <button id="openSidebarBtn" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Menu</button>
        <div class="flex items-center gap-2">
            <div class="h-6 w-6 rounded bg-zinc-900"></div>
            <div class="font-semibold">Pelcutron</div>
        </div>
        <a href="/" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Logout</a>
    </header>
    <div class="min-h-screen grid grid-cols-12">
        <!-- Mobile top bar -->

        <!-- Sidebar -->
        <aside id="sidebar"
            class="col-span-12 md:col-span-2 border-r border-zinc-200 bg-zinc-50 p-4 md:block hidden fixed inset-y-0 left-0 w-72 z-40 md:static md:w-auto">

            <div class="flex items-center gap-2 mb-6">
                <div class="h-6 w-6 rounded bg-zinc-900"></div>
                <div class="font-semibold">Pelcutron</div>
            </div>

            <nav class="space-y-1 text-sm">
                <a href="#"
                    class="block px-3 py-2 rounded-lg bg-white border border-zinc-200 font-medium">Dashboard</a>
                <a href="/dashboard-history"
                    class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Histori
                    Data</a>
            </nav>

            <div class="mt-8">
                <div class="text-xs uppercase text-zinc-500 tracking-wide mb-1">Other</div>
                <a href="#"
                    class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Profil</a>
                <a href="/"
                    class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Logout</a>
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

            <!-- TABLE ALAT -->
            <div class="mt-6">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="font-semibold">Daftar Alat</h2>
                    <div class="text-sm text-zinc-500">Pilih alat untuk monitoring realtime</div>
                </div>

                <div class="overflow-x-auto bg-white border border-zinc-200 rounded-lg">
                    <table class="min-w-full text-sm">
                        <thead class="bg-zinc-50 text-zinc-600">
                            <tr>
                                <th class="px-3 py-2 text-left">#</th>
                                <th class="px-3 py-2 text-left">Nama</th>
                                <th class="px-3 py-2 text-left">Type</th>
                                <th class="px-3 py-2 text-left">Kwh</th>
                                <th class="px-3 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($alats) && $alats->count())
                                @foreach ($alats as $idx => $alat)
                                    <tr class="border-t">
                                        <td class="px-3 py-2">{{ $idx + 1 }}</td>
                                        <td class="px-3 py-2">{{ $alat->nama }}</td>
                                        <td class="px-3 py-2">{{ $alat->type }}</td>
                                        <td class="px-3 py-2">{{ $alat->kwh }}</td>
                                        <td class="px-3 py-2">
                                            <button
                                                class="px-3 py-1 rounded bg-emerald-600 text-white text-sm monitorBtn"
                                                data-id="{{ $alat->id }}"
                                                data-name="{{ $alat->nama }}">Monitor</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-3 py-2" colspan="5">Belum ada data alat.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 text-sm">
                    Monitoring sekarang: <span id="currentAlat">Tidak ada</span>
                    <button id="stopMonitoringBtn" class="ml-3 px-2 py-1 rounded border text-sm">Stop</button>
                </div>
            </div>

            <!-- MONITOR AREA (hidden until a sensor is selected) -->
            <div id="monitorArea" class="hidden">

                <!-- CARDS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                    <div class="rounded-xl bg-zinc-900 text-white p-4">
                        <div class="text-sm text-zinc-300">Mode RPM</div>
                        <div class="text-2xl font-semibold" id="rpmValue">—</div>
                        <div class="mt-2 text-xs text-zinc-400">Status: Stabil</div>
                    </div>

                    <div class="rounded-xl bg-zinc-900 text-white p-4">
                        <div class="text-sm text-zinc-300">Target Berat Pelet</div>
                        <div class="text-2xl font-semibold" id="beratValue">—</div>
                        <div class="mt-2 text-xs text-zinc-400">Akurasi Sensor Baik</div>
                    </div>

                    <div class="rounded-xl bg-zinc-600 text-white p-4">
                        <div class="text-sm text-zinc-300">Daya Digunakan</div>
                        <div class="text-2xl font-semibold" id="wattValue">—</div>
                        <div class="mt-2 text-xs text-zinc-400">Real-time</div>
                    </div>

                    <div class="rounded-xl bg-zinc-600 text-white p-4">
                        <div class="text-sm text-zinc-300">Biaya Pemakaian Daya (1 jam)</div>
                        <div class="text-2xl font-semibold" id="rupiahValue">—</div>
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
                        <div class="font-semibold mb-2">Grafik Daya (W)</div>
                        <canvas id="chartWatt" class="h-48"></canvas>
                    </div>

                    <div class="rounded-2xl border border-zinc-200 p-4">
                        <div class="font-semibold mb-2">Grafik Biaya Kumulatif (Rp)</div>
                        <canvas id="chartRupiah" class="h-48"></canvas>
                    </div>

                </div>

            </div>

        </main>
    </div>

    <!-- ============ MODAL INPUT SETTINGS ============ -->
    <div id="modalSetting" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-[999]">

        <div class="bg-white rounded-2xl p-6 w-80 shadow-xl border border-zinc-200">
            <h2 class="text-lg font-semibold mb-4">Input Pengaturan Mesin</h2>

            <label class="text-sm text-zinc-700">Set Mode RPM</label>
            <select id="modalRPM" class="mt-1 w-full px-3 py-2 border border-zinc-300 rounded-lg">
                <option value="">Pilih Level RPM</option>
                <option value="800">Level 1 – 800 RPM</option>
                <option value="1000">Level 2 – 1000 RPM</option>
                <option value="1200">Level 3 – 1200 RPM</option>
                <option value="1400">Level 4 – 1400 RPM</option>
            </select>

            <label class="text-sm text-zinc-700 mt-4 block">Target Berat Pelet (Kg)</label>
            <input type="number" id="modalBerat" class="mt-1 w-full px-3 py-2 border border-zinc-300 rounded-lg"
                placeholder="Masukkan berat">

            <div class="flex justify-end gap-2 mt-6">
                <button id="closeSettingBtn" class="px-3 py-2 rounded-lg text-sm border border-zinc-300">
                    Batal
                </button>

                <button id="saveSettingBtn" class="px-3 py-2 rounded-lg text-sm bg-zinc-800 text-white">
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

    <script>
        const FIREBASE_CONFIG = @json($firebase ?? []);
    </script>

    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-database-compat.js"></script>

    <script>
        // expose config to global scope (blade inject -> JS)
        window.FIREBASE_CONFIG = FIREBASE_CONFIG || {};

        // price per kWh (IDR) - can be provided from server as $pricePerKwh
        const PRICE_PER_KWH = Number(@json($pricePerKwh ?? 1500));

        if (Object.keys(window.FIREBASE_CONFIG).length) {
            try {
                firebase.initializeApp(window.FIREBASE_CONFIG);
                const db = firebase.database();

                // chart instances
                let chartRPM = null,
                    chartBerat = null,
                    chartWatt = null,
                    chartRupiah = null;

                // data buffers (sorted by timestamp asc)
                let dataPoints = []; // array of { t: timestamp, rpm, berat, watt }

                let historyRef = null; // for last-hour fetch
                let liveRef = null; // for live updates

                function fmtCurrency(v) {
                    if (v === undefined || v === null || Number.isNaN(Number(v))) return '—';
                    return 'Rp ' + Number(v).toLocaleString('id-ID', {
                        maximumFractionDigits: 0
                    });
                }

                function initializeCharts() {
                    const ctxRPM = document.getElementById('chartRPM').getContext('2d');
                    const ctxBerat = document.getElementById('chartBerat').getContext('2d');
                    const ctxWatt = document.getElementById('chartWatt').getContext('2d');
                    const ctxRupiah = document.getElementById('chartRupiah').getContext('2d');

                    function emptyConfig(label, color) {
                        return {
                            type: 'line',
                            data: {
                                labels: [],
                                datasets: [{
                                    label,
                                    data: [],
                                    borderColor: color,
                                    backgroundColor: color,
                                    fill: false,
                                    tension: 0.1
                                }]
                            },
                            options: {
                                interaction: {
                                    intersect: false,
                                    mode: 'index'
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    x: {
                                        type: 'time',
                                        time: {
                                            unit: 'minute'
                                        }
                                    }
                                }
                            }
                        };
                    }

                    chartRPM = new Chart(ctxRPM, emptyConfig('RPM', '#10B981'));
                    chartBerat = new Chart(ctxBerat, emptyConfig('Berat', '#7C3AED'));
                    chartWatt = new Chart(ctxWatt, emptyConfig('Watt', '#2563EB'));
                    chartRupiah = new Chart(ctxRupiah, emptyConfig('Rp', '#EF4444'));
                }

                function resetBuffers() {
                    dataPoints = [];
                    if (chartRPM) {
                        chartRPM.data.labels = [];
                        chartRPM.data.datasets[0].data = [];
                        chartRPM.update();
                    }
                    if (chartBerat) {
                        chartBerat.data.labels = [];
                        chartBerat.data.datasets[0].data = [];
                        chartBerat.update();
                    }
                    if (chartWatt) {
                        chartWatt.data.labels = [];
                        chartWatt.data.datasets[0].data = [];
                        chartWatt.update();
                    }
                    if (chartRupiah) {
                        chartRupiah.data.labels = [];
                        chartRupiah.data.datasets[0].data = [];
                        chartRupiah.update();
                    }
                }

                function computeEnergyAndCost(points) {
                    // points sorted ascending by t (seconds)
                    if (!points || points.length < 2) return {
                        kwh: 0,
                        cost: 0,
                        cumulative: []
                    };

                    let totalWhSeconds = 0; // W * seconds
                    const cumulative = [];
                    let accWhSeconds = 0;

                    for (let i = 0; i < points.length - 1; i++) {
                        const p = points[i];
                        const next = points[i + 1];
                        const dt = Number(next.t) - Number(p.t); // seconds
                        const power = Number(p.watt) || 0; // W
                        const contribution = power * dt; // W * s
                        totalWhSeconds += contribution;
                        accWhSeconds += contribution;
                        const kwhSoFar = accWhSeconds / 3600000; // since W*s / 3600000 = kWh
                        cumulative.push({
                            t: next.t * 1000,
                            cost: kwhSoFar * PRICE_PER_KWH
                        });
                    }

                    const totalKwh = totalWhSeconds / 3600000;
                    const totalCost = totalKwh * PRICE_PER_KWH;
                    return {
                        kwh: totalKwh,
                        cost: totalCost,
                        cumulative
                    };
                }

                function buildFromSnapshot(snapshot) {
                    const raw = snapshot.val() || {};
                    const keys = Object.keys(raw).filter(k => !Number.isNaN(Number(k))).sort((a, b) => Number(a) - Number(
                        b));
                    const pts = keys.map(k => {
                        const v = raw[k] || {};
                        return {
                            t: Number(k),
                            rpm: Number(v.rpm) || null,
                            berat: Number(v.berat) || null,
                            watt: Number(v.watt) || null
                        };
                    });
                    dataPoints = pts;

                    // fill charts
                    const labels = pts.map(p => new Date(p.t * 1000));
                    if (chartRPM) {
                        chartRPM.data.labels = labels;
                        chartRPM.data.datasets[0].data = pts.map(p => p.rpm);
                        chartRPM.update();
                    }
                    if (chartBerat) {
                        chartBerat.data.labels = labels;
                        chartBerat.data.datasets[0].data = pts.map(p => p.berat);
                        chartBerat.update();
                    }
                    if (chartWatt) {
                        chartWatt.data.labels = labels;
                        chartWatt.data.datasets[0].data = pts.map(p => p.watt);
                        chartWatt.update();
                    }

                    // compute energy and cumulative cost
                    const {
                        kwh,
                        cost,
                        cumulative
                    } = computeEnergyAndCost(pts);
                    const rupiahEl = document.getElementById('rupiahValue');
                    rupiahEl && (rupiahEl.textContent = fmtCurrency(Math.round(cost)));

                    // update Rupiah chart with cumulative
                    if (chartRupiah) {
                        chartRupiah.data.labels = cumulative.map(c => new Date(c.t));
                        chartRupiah.data.datasets[0].data = cumulative.map(c => Math.round(c.cost));
                        chartRupiah.update();
                    }

                    // update watt card with latest
                    const last = pts[pts.length - 1] || {};
                    const wattEl = document.getElementById('wattValue');
                    wattEl && (wattEl.textContent = (last.watt !== null && last.watt !== undefined) ? (last.watt + ' W') :
                        '—');

                    // update rpm and berat cards
                    const rpmEl = document.getElementById('rpmValue');
                    const beratEl = document.getElementById('beratValue');
                    rpmEl && (rpmEl.textContent = last.rpm ?? '—');
                    beratEl && (beratEl.textContent = (last.berat !== null && last.berat !== undefined) ? (last.berat +
                        ' kg') : '—');

                    // last sync
                    const lastSyncEl = document.getElementById('lastSync');
                    lastSyncEl && (lastSyncEl.textContent = 'Last sync: ' + new Date().toLocaleString());
                }

                function appendLivePoint(point) {
                    // keep points sorted and within last hour
                    dataPoints.push(point);
                    dataPoints.sort((a, b) => Number(a.t) - Number(b.t));
                    const cutoff = Math.floor(Date.now() / 1000) - 3600;
                    dataPoints = dataPoints.filter(p => Number(p.t) >= cutoff);

                    // update charts by appending
                    const labels = dataPoints.map(p => new Date(p.t * 1000));
                    if (chartRPM) {
                        chartRPM.data.labels = labels;
                        chartRPM.data.datasets[0].data = dataPoints.map(p => p.rpm);
                        chartRPM.update();
                    }
                    if (chartBerat) {
                        chartBerat.data.labels = labels;
                        chartBerat.data.datasets[0].data = dataPoints.map(p => p.berat);
                        chartBerat.update();
                    }
                    if (chartWatt) {
                        chartWatt.data.labels = labels;
                        chartWatt.data.datasets[0].data = dataPoints.map(p => p.watt);
                        chartWatt.update();
                    }

                    const {
                        kwh,
                        cost,
                        cumulative
                    } = computeEnergyAndCost(dataPoints);
                    const rupiahEl = document.getElementById('rupiahValue');
                    rupiahEl && (rupiahEl.textContent = fmtCurrency(Math.round(cost)));

                    if (chartRupiah) {
                        chartRupiah.data.labels = cumulative.map(c => new Date(c.t));
                        chartRupiah.data.datasets[0].data = cumulative.map(c => Math.round(c.cost));
                        chartRupiah.update();
                    }

                    // update last values
                    const last = dataPoints[dataPoints.length - 1] || {};
                    const wattEl = document.getElementById('wattValue');
                    const rpmEl = document.getElementById('rpmValue');
                    const beratEl = document.getElementById('beratValue');
                    wattEl && (wattEl.textContent = (last.watt !== null && last.watt !== undefined) ? (last.watt + ' W') :
                        '—');
                    rpmEl && (rpmEl.textContent = last.rpm ?? '—');
                    beratEl && (beratEl.textContent = (last.berat !== null && last.berat !== undefined) ? (last.berat +
                        ' kg') : '—');
                }

                function subscribeToAlat(alatId, alatName) {
                    // cleanup
                    if (historyRef) {
                        try {
                            historyRef.off();
                        } catch (e) {}
                        historyRef = null;
                    }
                    if (liveRef) {
                        try {
                            liveRef.off();
                        } catch (e) {}
                        liveRef = null;
                    }

                    // initialize charts on first subscribe
                    if (!chartRPM) initializeCharts();
                    resetBuffers();

                    const path = `data/${alatId}`;

                    // fetch last-hour history
                    const startKey = String(Math.floor(Date.now() / 1000) - 3600);
                    historyRef = db.ref(path).orderByKey().startAt(startKey);
                    historyRef.once('value', snapshot => {
                        buildFromSnapshot(snapshot);
                    });

                    // live updates (new child added)
                    liveRef = db.ref(path).limitToLast(1);
                    liveRef.on('child_added', snap => {
                        const k = snap.key;
                        const v = snap.val() || {};
                        const point = {
                            t: Number(k),
                            rpm: Number(v.rpm) || null,
                            berat: Number(v.berat) || null,
                            watt: Number(v.watt) || null
                        };
                        appendLivePoint(point);
                    });

                    // show monitor area
                    const monitorArea = document.getElementById('monitorArea');
                    monitorArea && monitorArea.classList.remove('hidden');

                    const currentAlatEl = document.getElementById('currentAlat');
                    currentAlatEl && (currentAlatEl.textContent = alatName || '—');
                }

                function stopMonitoring() {
                    if (historyRef) {
                        try {
                            historyRef.off();
                        } catch (e) {}
                        historyRef = null;
                    }
                    if (liveRef) {
                        try {
                            liveRef.off();
                        } catch (e) {}
                        liveRef = null;
                    }
                    dataPoints = [];
                    resetBuffers();
                    const currentAlatEl = document.getElementById('currentAlat');
                    currentAlatEl && (currentAlatEl.textContent = 'Tidak ada');
                    const monitorArea = document.getElementById('monitorArea');
                    monitorArea && monitorArea.classList.add('hidden');
                }

                // Wire buttons
                document.querySelectorAll('.monitorBtn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        const name = btn.dataset.name;
                        subscribeToAlat(id, name);
                    });
                });

                const stopBtn = document.getElementById('stopMonitoringBtn');
                stopBtn && stopBtn.addEventListener('click', stopMonitoring);

            } catch (err) {
                console.error('Firebase init error', err);
            }
        } else {
            console.warn('No Firebase config found on page. Provide `$firebase` when rendering the view.');
        }
    </script>


</body>

</html>
