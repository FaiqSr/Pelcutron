<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Data – Pelcutron</title>

    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }

        table th,
        table td {
            white-space: nowrap;
        }

        /* supaya text tabel tidak wrap */
    </style>
</head>

<body class="antialiased text-zinc-800 bg-white">

    <!-- Mobile Top Bar -->
    <div class="col-span-12 md:hidden flex items-center justify-between px-3 py-3 border-b border-zinc-200">
        <button id="openSidebarBtn" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Menu</button>
        <div class="flex items-center gap-2">
            <div class="h-6 w-6 rounded bg-zinc-900"></div>
            <div class="font-semibold">Pelcutron</div>
        </div>
        <a href="/" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Logout</a>
    </div>

    <div class="min-h-screen grid grid-cols-12">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="col-span-12 md:col-span-2 border-r border-zinc-200 bg-zinc-50 p-4 md:block hidden fixed inset-y-0 left-0 w-64 sm:w-72 z-40 md:static md:w-auto transition-transform duration-200">

            <div class="flex items-center gap-2 mb-6">
                <div class="h-6 w-6 rounded bg-zinc-900"></div>
                <div class="font-semibold">Pelcutron</div>
            </div>

            <nav class="space-y-1 text-sm">
                <a href="/dashboard"
                    class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Dashboard</a>
                <a href="/dashboard-history"
                    class="block px-3 py-2 rounded-lg bg-white border border-zinc-200 font-medium">Histori Data</a>
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
        <main class="col-span-12 md:col-span-10 p-3 sm:p-6 transition-all duration-200 w-full">

            <h1 class="text-lg sm:text-xl font-semibold mb-6">Histori Data Mesin</h1>
            <!-- ALAT LIST + ACTION -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="font-semibold">Daftar Alat (Database)</h2>
                    <div class="text-sm text-zinc-500">Klik "Lihat Histori" untuk menampilkan data dari Firebase</div>
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
                                                class="px-3 py-1 rounded bg-emerald-600 text-white text-sm viewHistoryBtn"
                                                data-id="{{ $alat->id }}" data-name="{{ $alat->nama }}">Lihat
                                                Histori</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-3 py-2" colspan="5">Belum ada data alat di database.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- HISTORY CONTROLS -->
            <div id="historyControls" class="mb-4 hidden">
                <div class="flex items-center gap-3 flex-wrap">
                    <div class="text-sm font-medium">Memantau:</div>
                    <div id="historyAlatName" class="font-semibold">-</div>
                    <label class="ml-4 text-sm">Filter:</label>
                    <select id="historyFilter" class="px-2 py-1 border rounded">
                        <option value="1h">1 jam</option>
                        <option value="7h">7 jam</option>
                        <option value="today">Hari ini</option>
                        <option value="week">Seminggu</option>
                        <option value="month">Sebulan</option>
                        <option value="all">Semua</option>
                    </select>
                    <button id="loadHistoryBtn"
                        class="ml-2 px-3 py-1 rounded bg-zinc-800 text-white text-sm">Muat</button>

                    <div class="ml-auto text-sm">
                        <span class="text-zinc-600">Total kWh:</span> <span id="totalKwh">—</span>
                        &nbsp; • &nbsp;
                        <span class="text-zinc-600">Total Biaya:</span> <span id="totalCost">—</span>
                    </div>
                </div>
            </div>

            <!-- TABLE HISTORY -->
            <div class="flex rounded-xl border border-zinc-200 overflow-x-auto">
                <table class="text-sm w-full ">
                    <thead class="bg-zinc-100 text-zinc-600">
                        <tr>
                            <th class="px-4 py-3 text-left">Timestamp</th>
                            <th class="px-4 py-3 text-left">RPM</th>
                            <th class="px-4 py-3 text-left">Berat (Kg)</th>
                            <th class="px-4 py-3 text-left">Daya (W)</th>
                            <th class="px-4 py-3 text-left">Biaya (Rp)</th>
                        </tr>
                    </thead>

                    <tbody id="historyTable" class=" divide-zinc-200 ">
                    </tbody>
                </table>
            </div>

            <div id="lastSync" class="text-xs text-zinc-600 mt-4">Last sync: just now</div>

        </main>
    </div>
    <style>
        table th,
        table td {
            white-space: nowrap;
            text-align: left;
            /* tambah ini */
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
    <!-- FETCH HISTORY FROM FIREBASE (one-time, filtered) -->
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-database-compat.js"></script>
    <script>
        const FIREBASE_CONFIG = @json($firebase ?? []);
        const PRICE_PER_KWH = Number(@json($pricePerKwh ?? 1500));

        function fmtCurrency(v) {
            if (v === undefined || v === null || Number.isNaN(Number(v))) return '—';
            return 'Rp ' + Number(v).toLocaleString('id-ID', {
                maximumFractionDigits: 0
            });
        }

        if (Object.keys(FIREBASE_CONFIG).length) {
            try {
                firebase.initializeApp(FIREBASE_CONFIG);
                const db = firebase.database();

                let currentAlatId = null;
                let currentAlatName = null;

                // compute startKey (keys are epoch seconds)
                function startKeyForFilter(filter) {
                    const now = Math.floor(Date.now() / 1000);
                    switch (filter) {
                        case '1h':
                            return String(now - 3600);
                        case '7h':
                            return String(now - 7 * 3600);
                        case 'today': {
                            const d = new Date();
                            d.setHours(0, 0, 0, 0);
                            return String(Math.floor(d.getTime() / 1000));
                        }
                        case 'week':
                            return String(now - 7 * 86400);
                        case 'month':
                            return String(now - 30 * 86400);
                        case 'all':
                            return null;
                        default:
                            return String(now - 3600);
                    }
                }

                // compute per-interval cost and cumulative similar to dashboard
                function computeCosts(points) {
                    // points sorted ascending by t (seconds)
                    if (!points || points.length < 2) return {
                        kwh: 0,
                        cost: 0,
                        rows: []
                    };
                    let totalWhSeconds = 0;
                    let accWhSeconds = 0;
                    const rows = [];
                    for (let i = 0; i < points.length - 1; i++) {
                        const p = points[i];
                        const next = points[i + 1];
                        const dt = Number(next.t) - Number(p.t); // seconds
                        const power = Number(p.watt) || 0; // W
                        const contribution = power * dt; // W*s
                        totalWhSeconds += contribution;
                        accWhSeconds += contribution;
                        const kwhInterval = contribution / 3600000;
                        const costInterval = kwhInterval * PRICE_PER_KWH;
                        rows.push({
                            t: p.t,
                            rpm: p.rpm,
                            berat: p.berat,
                            watt: p.watt,
                            cost: costInterval
                        });
                    }
                    const totalKwh = totalWhSeconds / 3600000;
                    const totalCost = totalKwh * PRICE_PER_KWH;
                    return {
                        kwh: totalKwh,
                        cost: totalCost,
                        rows
                    };
                }

                async function loadHistoryFromFirebase(alatId, filter) {
                    if (!alatId) return;
                    const path = `data/${alatId}`;
                    const startKey = startKeyForFilter(filter);
                    let ref = db.ref(path);
                    if (startKey) ref = ref.orderByKey().startAt(startKey);

                    const snap = await ref.once('value');
                    const raw = snap.val() || {};

                    // gather numeric keys and sort ascending
                    const keys = Object.keys(raw).filter(k => !Number.isNaN(Number(k))).sort((a, b) => Number(a) -
                        Number(b));
                    const pts = keys.map(k => {
                        const v = raw[k] || {};
                        return {
                            t: Number(k),
                            rpm: Number(v.rpm) || null,
                            berat: Number(v.berat) || null,
                            watt: Number(v.watt) || null
                        };
                    });

                    // ensure at least one point shown (if single point, we cannot compute interval cost)
                    if (pts.length === 1) {
                        // duplicate point with +1s to make an interval of 1s (minimal)
                        const p = pts[0];
                        pts.push({
                            t: p.t + 1,
                            rpm: p.rpm,
                            berat: p.berat,
                            watt: p.watt
                        });
                    }

                    const {
                        kwh,
                        cost,
                        rows
                    } = computeCosts(pts);

                    // render table rows (show newest first)
                    const table = document.getElementById('historyTable');
                    table.innerHTML = '';

                    // rows are derived from intervals; show using rows reversed (newest first)
                    rows.slice().reverse().forEach(r => {
                        const date = new Date(r.t * 1000);
                        const row = `
                            <tr class="hover:bg-zinc-50">
                                <td class="px-4 py-3">${date.toLocaleString()}</td>
                                <td class="px-4 py-3">${r.rpm ?? '—'}</td>
                                <td class="px-4 py-3">${r.berat ?? '—'}</td>
                                <td class="px-4 py-3">${r.watt ?? '—'}</td>
                                <td class="px-4 py-3">${fmtCurrency(Math.round(r.cost))}</td>
                            </tr>
                        `;
                        table.innerHTML += row;
                    });

                    document.getElementById('totalKwh').textContent = kwh ? kwh.toFixed(4) + ' kWh' : '—';
                    document.getElementById('totalCost').textContent = fmtCurrency(Math.round(cost));
                    document.getElementById('lastSync').innerText = 'Last sync: ' + new Date().toLocaleString();
                }

                // wire buttons
                document.querySelectorAll('.viewHistoryBtn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        const name = btn.dataset.name;
                        currentAlatId = id;
                        currentAlatName = name;
                        document.getElementById('historyAlatName').textContent = name;
                        document.getElementById('historyControls').classList.remove('hidden');
                        // auto load with default filter
                        const filter = document.getElementById('historyFilter').value;
                        loadHistoryFromFirebase(id, filter);
                    });
                });

                document.getElementById('loadHistoryBtn').addEventListener('click', () => {
                    const filter = document.getElementById('historyFilter').value;
                    if (currentAlatId) loadHistoryFromFirebase(currentAlatId, filter);
                });

            } catch (err) {
                console.error('Firebase init error', err);
            }
        } else {
            console.warn('No Firebase config found on page. Provide `$firebase` when rendering the view.');
        }
    </script>

</body>

</html>
