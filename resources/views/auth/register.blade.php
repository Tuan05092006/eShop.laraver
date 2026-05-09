<!DOCTYPE html>
<html class="dark" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>VELOX AUTO | Tạo tài khoản</title>
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
                        "surface-high": "#222222",
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
        /* Custom Checkbox */
        input[type="checkbox"] {
            appearance: none;
            background-color: transparent;
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 1.15em;
            height: 1.15em;
            border: 1px solid #404040;
            border-radius: 0.15em;
            display: grid;
            place-content: center;
        }
        input[type="checkbox"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-color, #b6c4ff);
            background-color: #b6c4ff;
            transform-origin: center;
            clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
        }
        input[type="checkbox"]:checked::before {
            transform: scale(1);
        }
        input[type="checkbox"]:checked {
            border-color: #b6c4ff;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

<!-- Background Image -->
<img src="https://images.unsplash.com/photo-1614200187524-dc4b892acf16?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Background" class="absolute inset-0 w-full h-full object-cover opacity-40 z-0 pointer-events-none">
<div class="absolute inset-0 bg-gradient-to-t from-background via-background/80 to-background/20 z-0 pointer-events-none"></div>

<div class="w-full max-w-[28rem] flex flex-col min-h-screen sm:min-h-0 sm:bg-surface/60 sm:backdrop-blur-2xl sm:p-8 sm:rounded-2xl sm:shadow-2xl relative z-10 sm:border sm:border-outline/10">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-8 pt-4 sm:pt-0">
        <a href="/" class="flex items-center gap-3 group">
            <img src="/images/logo.png" alt="Logo" class="h-6 w-auto object-contain transition-transform duration-500 group-hover:scale-105">
            <span class="text-lg font-black tracking-widest text-white font-headline uppercase group-hover:text-primary transition-colors duration-300">VELOX AUTO</span>
        </a>
        <a href="/" class="flex items-center gap-1 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant hover:text-white transition-colors">
            <span class="material-symbols-outlined text-[14px]">close</span> Thoát
        </a>
    </div>

    <!-- Container Content -->
    <div class="flex-grow flex flex-col justify-center sm:bg-transparent sm:p-0 sm:border-0">
        
        <!-- Title -->
        <div class="mb-8 text-center">
            <h1 class="font-headline text-3xl font-bold tracking-tight mb-2 text-white uppercase">Tạo tài khoản</h1>
            <p class="text-on-surface-variant text-xs font-body tracking-wider">Điền thông tin bên dưới để bắt đầu<br>hành trình của bạn.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-error/10 text-error p-4 rounded text-xs font-bold uppercase tracking-widest border border-error/20">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-on-surface-variant mb-2">Họ và tên</label>
                <input name="name" value="{{ old('name') }}" class="w-full bg-surface-high sm:bg-background border-0 rounded py-3 px-4 text-on-surface placeholder:text-outline focus:ring-1 focus:ring-primary transition-all text-sm" placeholder="Nguyễn Văn A" type="text" required autofocus/>
            </div>

            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-on-surface-variant mb-2">Địa chỉ Email</label>
                <input name="email" value="{{ old('email') }}" class="w-full bg-surface-high sm:bg-background border-0 rounded py-3 px-4 text-on-surface placeholder:text-outline focus:ring-1 focus:ring-primary transition-all text-sm" placeholder="email@example.com" type="email" required/>
            </div>

            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-on-surface-variant mb-2">Mật khẩu</label>
                <input name="password" class="w-full bg-surface-high sm:bg-background border-0 rounded py-3 px-4 text-on-surface placeholder:text-outline focus:ring-1 focus:ring-primary transition-all text-sm" placeholder="••••••••" type="password" required autocomplete="new-password"/>
            </div>

            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-on-surface-variant mb-2">Xác nhận</label>
                <input name="password_confirmation" class="w-full bg-surface-high sm:bg-background border-0 rounded py-3 px-4 text-on-surface placeholder:text-outline focus:ring-1 focus:ring-primary transition-all text-sm" placeholder="••••••••" type="password" required autocomplete="new-password"/>
            </div>

            <div class="flex items-start gap-3 mt-6 mb-8">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" required class="cursor-pointer">
                </div>
                <label for="terms" class="text-[10px] leading-tight text-on-surface-variant cursor-pointer">
                    Tôi đồng ý với các <span class="text-white">Điều khoản Dịch vụ</span> và <span class="text-white">Chính sách Bảo mật</span> của VELOX AUTO.
                </label>
            </div>

            <button class="kinetic-gradient w-full py-4 text-xs font-bold tracking-[0.2em] text-white rounded hover:brightness-110 transition-all uppercase" type="submit">
                Đăng ký ngay
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-10 text-center flex flex-col items-center">
            <p class="text-xs text-on-surface-variant mb-4">Đã có tài khoản?</p>
            <a href="{{ route('login') }}" class="inline-block px-12 py-3 rounded border border-outline/30 text-xs font-bold uppercase tracking-widest text-on-surface-variant hover:text-white hover:border-white/50 transition-all bg-surface-high sm:bg-background">
                Đăng nhập
            </a>
        </div>

    </div>
</div>

</body>
</html>
