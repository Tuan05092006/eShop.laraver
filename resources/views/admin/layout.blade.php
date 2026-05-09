<!DOCTYPE html>
<html lang="vi" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VELOX AUTO | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700;900&family=Manrope:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: {
                fontFamily: { headline: ['Space Grotesk'], body: ['Manrope'] },
                colors: {
                    primary: '#2962ff',
                    'primary-light': '#b6c4ff',
                    surface: '#111111',
                    'surface-high': '#1a1a1a',
                    'surface-card': '#1e1e1e',
                    border: '#2a2a2a',
                }
            }}
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .sidebar-link.active { background: rgba(41,98,255,0.15); color: #b6c4ff; border-left: 3px solid #2962ff; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-surface text-white font-body min-h-screen flex">

<!-- Sidebar -->
<aside class="w-64 bg-surface-high min-h-screen flex flex-col border-r border-border fixed left-0 top-0 h-full z-40">
    <div class="p-6 border-b border-border">
        <a href="/admin" class="flex items-center gap-3">
            <img src="/images/logo.png" alt="Logo" class="h-8 w-auto object-contain">
            <div>
                <span class="block text-sm font-headline font-black tracking-widest text-white">VELOX AUTO</span>
                <span class="block text-[10px] text-primary-light uppercase tracking-widest">Admin Panel</span>
            </div>
        </a>
    </div>
    <nav class="flex-1 p-4 space-y-1">
        <a href="{{ route('admin.index') }}" class="sidebar-link {{ request()->routeIs('admin.index') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-headline font-bold uppercase tracking-widest text-gray-400 hover:text-white hover:bg-white/5 transition-all">
            <span class="material-symbols-outlined text-lg">dashboard</span> Tổng Quan
        </a>
        <a href="{{ route('admin.products') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-headline font-bold uppercase tracking-widest text-gray-400 hover:text-white hover:bg-white/5 transition-all">
            <span class="material-symbols-outlined text-lg">directions_car</span> Sản Phẩm
        </a>
        <a href="{{ route('admin.orders') }}" class="sidebar-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-headline font-bold uppercase tracking-widest text-gray-400 hover:text-white hover:bg-white/5 transition-all">
            <span class="material-symbols-outlined text-lg">receipt_long</span> Đơn Hàng
        </a>
        <a href="{{ route('admin.brands') }}" class="sidebar-link {{ request()->routeIs('admin.brands*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-headline font-bold uppercase tracking-widest text-gray-400 hover:text-white hover:bg-white/5 transition-all">
            <span class="material-symbols-outlined text-lg">workspace_premium</span> Thương Hiệu
        </a>
    </nav>
    <div class="p-4 border-t border-border">
        <a href="/" class="flex items-center gap-2 px-4 py-3 text-sm text-gray-500 hover:text-white transition-colors">
            <span class="material-symbols-outlined text-lg">storefront</span> Về Trang Chủ
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full flex items-center gap-2 px-4 py-3 text-sm text-red-500 hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined text-lg">logout</span> Đăng Xuất
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<div class="ml-64 flex-1 flex flex-col min-h-screen">
    <!-- Top Bar -->
    <header class="bg-surface-high border-b border-border px-8 py-4 flex justify-between items-center sticky top-0 z-30">
        <div>
            <h1 class="font-headline font-black text-xl uppercase tracking-tight">@yield('page-title', 'Admin')</h1>
            <p class="text-gray-500 text-xs">@yield('page-subtitle', 'VELOX AUTO Management')</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs text-gray-500">{{ auth()->user()->name }}</span>
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-xs font-bold text-white">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
    </header>

    <!-- Flash Message -->
    @if(session('success'))
    <div id="flash" class="m-6 bg-green-900/30 border border-green-700/50 text-green-400 px-6 py-4 rounded-lg flex items-center gap-3">
        <span class="material-symbols-outlined">check_circle</span>
        <span class="text-sm font-bold">{{ session('success') }}</span>
        <button onclick="document.getElementById('flash').remove()" class="ml-auto text-green-600 hover:text-green-400">
            <span class="material-symbols-outlined text-sm">close</span>
        </button>
    </div>
    @endif

    <!-- Page Content -->
    <main class="flex-1 p-8">
        @yield('admin-content')
    </main>
</div>

</body>
</html>
