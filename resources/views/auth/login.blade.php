<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Pelcutron</title>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-zinc-800 bg-white">
    <div class="min-h-screen grid md:grid-cols-2">
        <div class="bg-zinc-100/80 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="mb-8">
                    <div class="inline-flex items-center gap-2">
                        <div class="h-6 w-6 rounded bg-zinc-900"></div>
                        <span class="font-semibold">Pelcutron</span>
                    </div>
                </div>
                <div class="rounded-2xl bg-white/70 backdrop-blur p-6 shadow-sm border border-zinc-200">
                    <h1 class="text-lg font-semibold text-zinc-900">Welcome Back</h1>
                    <p class="text-sm text-zinc-600 mt-1">Masuk untuk memantau atau mengelola.</p>

                    <form method="POST" action="{{ route('login.post') }}" class="mt-6 space-y-4">
                        @csrf
                        <div>
                            <label class="text-sm">Email</label>
                            <input name="email" value="{{ old('email') }}" required
                                class="mt-1 w-full px-3 py-2 border rounded" />
                            @error('email')
                                <div class="text-xs text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="text-sm">Password</label>
                            <input name="password" type="password" required
                                class="mt-1 w-full px-3 py-2 border rounded" />
                            @error('password')
                                <div class="text-xs text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="remember">
                                Remember</label>
                            <a href="{{ route('register') }}" class="text-sm text-zinc-700">Daftar</a>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full px-4 py-2 bg-zinc-900 text-white rounded">Login</button>
                        </div>
                    </form>

                </div>
                <div class="mt-6 text-center">
                    <a href="/" class="text-sm text-zinc-600 hover:text-zinc-900">← Kembali ke Landing</a>
                </div>
            </div>
        </div>
        <div class="relative hidden md:block">
            <div class="absolute inset-0 flex items-center justify-center px-8">
                <div class="max-w-lg text-center">
                    <div class="text-4xl font-semibold tracking-tight">Pelcutron</div>
                    <div class="text-zinc-600 mt-1">Monitoring & Analytics</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
