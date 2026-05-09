<!DOCTYPE html>
<html class="dark" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>VELOX AUTO | Đăng nhập</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;900&amp;family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
          tailwind.config = {
            darkMode: "class",
            theme: {
              extend: {
                "colors": {
                        "primary": "#b6c4ff",
                        "on-primary": "#002780",
                        "background": "#111111",
                        "on-background": "#e5e2e1",
                        "surface": "#1a1a1a",
                        "on-surface": "#e5e2e1",
                        "on-surface-variant": "#a0a0a0",
                        "outline": "#404040",
                        "error": "#ffb4ab",
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
        .kinetic-gradient {
            background: linear-gradient(135deg, #2962ff 0%, #7696ff 100%);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body min-h-screen flex items-center justify-center relative overflow-hidden">

<!-- Background Image -->
<img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Background" class="absolute inset-0 w-full h-full object-cover opacity-40 z-0 pointer-events-none">
<div class="absolute inset-0 bg-gradient-to-t from-background via-background/80 to-background/20 z-0 pointer-events-none"></div>

<div class="w-full max-w-md p-6 sm:p-10 flex flex-col min-h-screen sm:min-h-0 sm:justify-center relative z-10 sm:bg-surface/60 sm:backdrop-blur-2xl sm:rounded-2xl sm:border sm:border-outline/10 sm:shadow-2xl">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-12">
        <a href="/" class="flex items-center gap-3 group">
            <img src="/images/logo.png" alt="Logo" class="h-8 w-auto object-contain transition-transform duration-500 group-hover:scale-105">
            <span class="text-xl font-black tracking-widest text-white font-headline uppercase group-hover:text-primary transition-colors duration-300">VELOX AUTO</span>
        </a>
    </div>

    <!-- Title -->
    <div class="mb-10 text-left">
        <h1 class="font-headline text-3xl font-bold tracking-tight mb-2 text-white">Chào mừng trở lại</h1>
        <p class="text-on-surface-variant text-sm font-body">Vui lòng đăng nhập để tiếp tục vào phòng trưng bày VELOX AUTO.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-error/10 text-error p-4 rounded text-xs font-bold uppercase tracking-widest border border-error/20">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-[10px] uppercase tracking-widest font-bold text-on-surface-variant mb-2">Email hoặc số điện thoại</label>
            <input name="email" value="{{ old('email') }}" class="w-full bg-surface border-0 rounded-lg py-4 px-4 text-on-surface placeholder:text-outline focus:ring-1 focus:ring-primary transition-all text-sm" placeholder="example@velox.auto" type="email" required autofocus/>
        </div>

        <div>
            <div class="flex justify-between items-end mb-2">
                <label class="block text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Mật khẩu</label>
                <a class="text-[10px] uppercase tracking-widest text-on-surface-variant hover:text-white transition-colors" href="{{ route('password.request') }}">Quên mật khẩu?</a>
            </div>
            <div class="relative">
                <input name="password" class="w-full bg-surface border-0 rounded-lg py-4 px-4 text-on-surface placeholder:text-outline focus:ring-1 focus:ring-primary transition-all text-sm" placeholder="••••••••" type="password" required autocomplete="current-password"/>
                <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-sm">visibility_off</span>
                </button>
            </div>
        </div>

        <button class="kinetic-gradient w-full py-4 text-sm font-bold tracking-widest text-white rounded-lg hover:brightness-110 transition-all mt-4" type="submit">
            ĐĂNG NHẬP
        </button>
    </form>

    <!-- Divider -->
    <div class="flex items-center gap-4 my-8">
        <div class="flex-grow h-px bg-outline/30"></div>
        <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">Hoặc đăng nhập với</span>
        <div class="flex-grow h-px bg-outline/30"></div>
    </div>

    <!-- Social Login -->
    <div class="grid grid-cols-2 gap-4 mb-12">
        <button class="flex items-center justify-center gap-2 bg-surface hover:bg-surface/80 transition-colors py-3 rounded-lg border border-outline/20">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
            <span class="text-[10px] font-bold uppercase tracking-widest text-white">Google</span>
        </button>
        <button class="flex items-center justify-center gap-2 bg-surface hover:bg-surface/80 transition-colors py-3 rounded-lg border border-outline/20">
            <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.04 2.26-.82 3.59-.85 1.56-.05 2.87.65 3.65 1.8-3.1 1.84-2.58 5.86.37 7.02-.75 1.85-1.74 3.35-2.69 4.2zm-4.71-13.6c-.22-2.3 1.76-4.32 4.14-4.5.3 2.5-2.17 4.54-4.14 4.5z"/></svg>
            <span class="text-[10px] font-bold uppercase tracking-widest text-white">Apple</span>
        </button>
    </div>

    <!-- Footer -->
    <div class="mt-auto text-center text-sm font-body text-on-surface-variant">
        Chưa có tài khoản? <a href="{{ route('register') }}" class="text-white font-bold hover:underline">Tạo tài khoản ngay</a>
    </div>

</div>

</body>
</html>
