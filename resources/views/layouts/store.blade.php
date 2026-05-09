<!DOCTYPE html>
<html class="dark" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ config('app.name', 'VELOX AUTO') }} | Precision Engineered</title>
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;900&amp;family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
          tailwind.config = {
            darkMode: "class",
            theme: {
              extend: {
                "colors": {
                        "surface-variant": "#353534",
                        "on-tertiary-fixed-variant": "#802a00",
                        "inverse-surface": "#e5e2e1",
                        "error-container": "#93000a",
                        "on-secondary": "#142b6f",
                        "on-secondary-fixed-variant": "#2e4287",
                        "on-primary-fixed-variant": "#003ab3",
                        "on-tertiary-container": "#fff4f1",
                        "surface-container-high": "#2a2a2a",
                        "outline": "#8d90a2",
                        "primary-fixed": "#dce1ff",
                        "error": "#ffb4ab",
                        "primary": "#b6c4ff",
                        "tertiary-fixed": "#ffdbcf",
                        "surface-container-low": "#1c1b1b",
                        "secondary": "#b6c4ff",
                        "on-surface": "#e5e2e1",
                        "on-error": "#690005",
                        "surface-container": "#201f1f",
                        "primary-fixed-dim": "#b6c4ff",
                        "inverse-on-surface": "#313030",
                        "on-error-container": "#ffdad6",
                        "background": "#131313",
                        "tertiary": "#ffb59a",
                        "on-secondary-fixed": "#001550",
                        "on-primary-container": "#f7f5ff",
                        "secondary-fixed": "#dce1ff",
                        "surface-dim": "#131313",
                        "on-background": "#e5e2e1",
                        "on-secondary-container": "#9eb2fe",
                        "secondary-fixed-dim": "#b6c4ff",
                        "on-surface-variant": "#c3c5d8",
                        "surface": "#131313",
                        "surface-bright": "#393939",
                        "inverse-primary": "#004ee8",
                        "surface-tint": "#b6c4ff",
                        "surface-container-lowest": "#0e0e0e",
                        "secondary-container": "#2e4287",
                        "on-primary-fixed": "#001550",
                        "outline-variant": "#434656",
                        "tertiary-container": "#c74500",
                        "on-tertiary-fixed": "#380d00",
                        "primary-container": "#2962ff",
                        "surface-container-highest": "#353534",
                        "on-primary": "#002780",
                        "tertiary-fixed-dim": "#ffb59a",
                        "on-tertiary": "#5b1b00"
                },
                "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                },
                "fontFamily": {
                        "headline": ["Space Grotesk"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                }
              },
            },
          }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-nav {
            background: rgba(28, 27, 27, 0.6);
            backdrop-filter: blur(20px);
        }
        .kinetic-gradient {
            background: linear-gradient(135deg, #2962ff 0%, #b6c4ff 100%);
        }
        .scrim-bottom {
            background: linear-gradient(to top, rgba(19, 19, 19, 1) 0%, rgba(19, 19, 19, 0) 100%);
        }
        body {
          min-height: max(884px, 100dvh);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body selection:bg-primary selection:text-on-primary">

<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 bg-[#1c1b1b]/60 backdrop-blur-xl shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
    <div class="flex justify-between items-center px-8 h-20 w-full bg-gradient-to-b from-[#2a2a2a] to-transparent">
        <div class="flex items-center gap-4">
            <button id="menu-toggle" class="text-[#e5e2e1] hover:text-[#b6c4ff] transition-colors duration-300 scale-95 active:scale-90 transition-transform">
                <span class="material-symbols-outlined" data-icon="menu">menu</span>
            </button>
            <a href="/" class="flex items-center gap-3 group">
                <img src="/images/logo.png" alt="Logo" class="h-10 w-auto object-contain transition-transform duration-500 group-hover:scale-105">
                <span class="text-2xl font-black tracking-widest text-[#e5e2e1] font-['Space_Grotesk'] uppercase group-hover:text-primary transition-colors duration-300">VELOX AUTO</span>
            </a>
        </div>
        <nav class="hidden md:flex gap-8 items-center">
            <a class="font-['Space_Grotesk'] font-bold tracking-tighter uppercase text-[#e5e2e1] hover:text-[#b6c4ff] transition-colors duration-300" href="{{ route('home') }}">Trang Chủ</a>
            <a class="font-['Space_Grotesk'] font-bold tracking-tighter uppercase text-[#e5e2e1] hover:text-[#b6c4ff] transition-colors duration-300" href="{{ route('showroom') }}">Danh Mục</a>
            <a class="font-['Space_Grotesk'] font-bold tracking-tighter uppercase text-[#e5e2e1] hover:text-[#b6c4ff] transition-colors duration-300" href="{{ route('search') }}">Tìm Kiếm</a>
        </nav>
        <div class="flex items-center gap-6">
            <a href="{{ route('cart.index') }}" class="text-[#e5e2e1] hover:text-[#b6c4ff] transition-colors duration-300">
                <span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
            </a>
            @auth
                <a href="{{ route('dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-primary">Tài khoản</a>
            @else
                <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-widest text-[#e5e2e1]">Đăng nhập</a>
            @endauth
        </div>
    </div>
</header>

<main>
    @if(session('success'))
        <div id="success-notification" class="fixed top-24 right-8 z-[100] animate-bounce-in">
            <div class="bg-primary-container text-on-primary-container px-6 py-4 rounded-lg shadow-2xl border border-primary/20 flex items-center gap-4">
                <span class="material-symbols-outlined text-primary">check_circle</span>
                <span class="font-headline font-bold uppercase tracking-widest text-xs">{{ session('success') }}</span>
                <button onclick="document.getElementById('success-notification').remove()" class="text-on-primary-container/50 hover:text-on-primary-container">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
            </div>
        </div>
        <script>
            setTimeout(() => {
                const el = document.getElementById('success-notification');
                if(el) {
                    el.classList.add('opacity-0', 'translate-x-full');
                    el.classList.add('transition-all', 'duration-500');
                    setTimeout(() => el.remove(), 500);
                }
            }, 5000);
        </script>
    @endif
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-[#0e0e0e] w-full py-12 px-8 border-t border-[#434656]/20">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 w-full container mx-auto">
        <div>
            <span class="text-[#e5e2e1] font-bold text-xl font-headline tracking-widest mb-4 block">VELOX AUTO</span>
            <p class="text-[#434656] font-['Manrope'] text-xs tracking-wider uppercase">© 2024 VELOX AUTO. PRECISION ENGINEERED.</p>
        </div>
        <div class="flex flex-wrap gap-8 md:justify-end">
            <a class="text-[#434656] hover:text-[#e5e2e1] transition-colors font-['Manrope'] text-xs tracking-wider uppercase opacity-80 hover:opacity-100" href="#">Bảo mật</a>
            <a class="text-[#434656] hover:text-[#e5e2e1] transition-colors font-['Manrope'] text-xs tracking-wider uppercase opacity-80 hover:opacity-100" href="#">Điều khoản</a>
            <a class="text-[#434656] hover:text-[#e5e2e1] transition-colors font-['Manrope'] text-xs tracking-wider uppercase opacity-80 hover:opacity-100" href="#">Kho xe</a>
            <a class="text-[#434656] hover:text-[#e5e2e1] transition-colors font-['Manrope'] text-xs tracking-wider uppercase opacity-80 hover:opacity-100" href="#">Liên hệ</a>
        </div>
    </div>
</footer>

<!-- Sidebar Menu -->
<div id="sidebar-menu" class="fixed inset-y-0 left-0 w-80 bg-surface-container-highest z-[100] transform -translate-x-full transition-transform duration-300 ease-in-out shadow-2xl">
    <div class="p-8">
        <div class="flex justify-between items-center mb-12">
            <span class="text-xl font-black tracking-widest font-headline uppercase">Menu</span>
            <button id="menu-close" class="text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <nav class="flex flex-col gap-6">
            <a href="{{ route('home') }}" onclick="closeMenu()" class="text-2xl font-headline font-bold uppercase tracking-tighter hover:text-primary transition-colors flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-lg">home</span> Trang Chủ
            </a>
            <a href="{{ route('showroom') }}" onclick="closeMenu()" class="text-2xl font-headline font-bold uppercase tracking-tighter hover:text-primary transition-colors flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-lg">garage</span> Danh Mục
            </a>
            <a href="{{ route('search') }}" onclick="closeMenu()" class="text-2xl font-headline font-bold uppercase tracking-tighter hover:text-primary transition-colors flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-lg">search</span> Tìm Kiếm
            </a>
            <a href="{{ route('cart.index') }}" onclick="closeMenu()" class="text-2xl font-headline font-bold uppercase tracking-tighter hover:text-primary transition-colors flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-lg">shopping_cart</span> Giỏ Hàng
            </a>
            <a href="{{ route('search', ['fuel' => 'Electric']) }}" onclick="closeMenu()" class="text-2xl font-headline font-bold uppercase tracking-tighter hover:text-primary transition-colors flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-lg">bolt</span> Xe Điện
            </a>
            <div class="h-px bg-outline-variant/30 my-4"></div>
            @auth
                <a href="{{ route('dashboard') }}" onclick="closeMenu()" class="text-sm font-label uppercase tracking-widest text-primary font-bold flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">account_circle</span> Tài Khoản
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-label uppercase tracking-widest text-error font-bold mt-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">logout</span> Đăng Xuất
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" onclick="closeMenu()" class="text-sm font-label uppercase tracking-widest text-[#e5e2e1] font-bold flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">login</span> Đăng Nhập
                </a>
                <a href="{{ route('register') }}" onclick="closeMenu()" class="text-sm font-label uppercase tracking-widest text-primary font-bold mt-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">person_add</span> Đăng Ký
                </a>
            @endauth
        </nav>
    </div>
</div>

<!-- Overlay -->
<div id="menu-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[90] hidden opacity-0 transition-opacity duration-300"></div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const sidebar = document.getElementById('sidebar-menu');
    const overlay = document.getElementById('menu-overlay');

    function openMenu() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.add('opacity-100'), 10);
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.remove('opacity-100');
        setTimeout(() => {
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    menuToggle.addEventListener('click', openMenu);
    menuClose.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);
</script>

</body>
</html>
