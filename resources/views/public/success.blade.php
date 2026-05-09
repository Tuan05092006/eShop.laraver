@extends('layouts.store')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-background px-6 pt-20">
    <div class="w-full max-w-2xl relative">
        <!-- Background Glow -->
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-primary/20 rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-tertiary/20 rounded-full blur-[120px]"></div>

        <div class="relative z-10 bg-surface-container-low/60 backdrop-blur-3xl border border-outline-variant/20 p-12 md:p-16 rounded-2xl shadow-2xl text-center">
            <div class="w-24 h-24 kinetic-gradient rounded-full flex items-center justify-center mx-auto mb-10 shadow-[0_0_50px_rgba(41,98,255,0.3)] scale-110">
                <span class="material-symbols-outlined text-on-primary text-5xl">check_circle</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-headline font-black tracking-tighter mb-6 uppercase text-on-background">
                ĐẶT HÀNG <br/>
                <span class="text-primary italic">THÀNH CÔNG</span>
            </h1>
            
            <div class="h-[2px] w-24 bg-outline-variant/30 mx-auto mb-8"></div>
            
            <p class="text-on-surface-variant mb-12 font-body text-lg leading-relaxed max-w-md mx-auto">
                Cảm ơn bạn đã tin tưởng <span class="text-on-surface font-bold">VELOX AUTO</span>. 
                Đơn hàng của bạn đã được chuyển đến bộ phận chuyên gia. Chúng tôi sẽ liên hệ trong ít phút để hoàn tất các thủ tục cá nhân hóa.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="/" class="kinetic-gradient text-on-primary font-headline font-bold py-5 px-8 rounded-lg tracking-[0.2em] uppercase text-xs hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-primary-container/20">
                    QUAY LẠI TRANG CHỦ
                </a>
                <a href="{{ route('dashboard') }}" class="bg-surface-container border border-outline-variant/30 text-on-surface font-headline font-bold py-5 px-8 rounded-lg tracking-[0.2em] uppercase text-xs hover:bg-surface-container-high transition-all">
                    XEM ĐƠN HÀNG
                </a>
            </div>

            <div class="mt-12 flex items-center justify-center gap-8 text-on-surface-variant opacity-40">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">verified_user</span>
                    <span class="text-[10px] font-label uppercase tracking-widest">Bảo mật tuyệt đối</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">support_agent</span>
                    <span class="text-[10px] font-label uppercase tracking-widest">Hỗ trợ 24/7</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
