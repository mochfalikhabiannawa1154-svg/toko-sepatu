<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun — KicksStore</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center p-4 md:p-8 relative overflow-hidden">

    <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-blue-900/20 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-900/20 blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-md bg-gray-900/40 backdrop-blur-xl border border-gray-800/60 p-8 md:p-10 rounded-3xl shadow-2xl space-y-8 relative z-10">
        
        <div class="text-center space-y-2">
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter uppercase text-white">
                KICKS<span class="text-blue-500">STORE.</span>
            </a>
            <h1 class="text-xl font-bold text-gray-200 tracking-tight pt-2">Selamat Datang Kembali</h1>
            <p class="text-xs text-gray-400 font-light">Masukkan detail akunmu untuk melanjutkan akses.</p>
        </div>

        @if (session('status'))
            <div class="bg-blue-950/40 border border-blue-900/50 text-blue-400 text-xs p-4 rounded-xl text-center font-medium">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-950/40 border border-red-900/50 text-red-400 text-xs p-4 rounded-xl space-y-1 font-medium">
                @foreach ($errors->all() as $error)
                    <p>⚠️ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Alamat E-mail</label>
                <div class="relative">
                    <span class="absolute left-4 top-3.5 text-gray-500 text-sm">📧</span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com" 
                        class="w-full bg-gray-950/60 border border-gray-800 rounded-xl pl-11 pr-4 py-3.5 text-sm text-white placeholder-gray-600 focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                </div>
            </div>

            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Kata Sandi</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[11px] font-semibold text-blue-400 hover:text-blue-300 transition">Lupa Sandi?</a>
                    @endif
                </div>
                <div class="relative">
                    <span class="absolute left-4 top-3.5 text-gray-500 text-sm">🔒</span>
                    <input type="password" id="password" name="password" required placeholder="••••••••" 
                        class="w-full bg-gray-950/60 border border-gray-800 rounded-xl pl-11 pr-4 py-3.5 text-sm text-white placeholder-gray-600 focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded-sm bg-gray-950 border-gray-800 text-blue-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                <label for="remember_me" class="ml-2 text-xs text-gray-400 font-medium select-none cursor-pointer">Ingat akun saya</label>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 active:scale-[0.98] text-white text-xs font-bold py-4 rounded-xl tracking-wide uppercase transition-all shadow-lg shadow-blue-600/10 cursor-pointer flex items-center justify-center">
                    Masuk Sekarang
                </button>
            </div>
        </form>

        <div class="text-center pt-2 border-t border-gray-800/60 text-xs text-gray-400">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="font-bold text-blue-400 hover:text-blue-300 transition ml-1">Daftar Sini</a>
        </div>

    </div>

</body>
</html>