@extends('layouts.store')

@section('content')
<main class="pt-32 pb-20 px-4 md:px-8 max-w-screen-xl mx-auto">
    <!-- Dashboard Header -->
    <section class="mb-12">
        <h1 class="text-5xl font-headline font-black tracking-tighter text-on-background uppercase mb-2">BÀN ĐIỀU KHIỂN</h1>
        <p class="text-on-surface-variant font-body uppercase text-xs tracking-[0.2em]">Chào mừng trở lại, {{ Auth::user()->email }}</p>
    </section>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="bg-surface-container-low p-8 rounded-lg border border-outline-variant/10 hover:border-primary/30 transition-all group">
            <span class="material-symbols-outlined text-primary text-4xl mb-4 group-hover:scale-110 transition-transform">shopping_bag</span>
            <h3 class="text-on-surface-variant text-[10px] uppercase font-bold tracking-[0.2em] mb-1">Đơn hàng của bạn</h3>
            <p class="text-4xl font-headline font-black text-on-background">{{ $orderCount }}</p>
        </div>
        <div class="bg-surface-container-low p-8 rounded-lg border border-outline-variant/10 hover:border-primary/30 transition-all group">
            <span class="material-symbols-outlined text-primary text-4xl mb-4 group-hover:scale-110 transition-transform">favorite</span>
            <h3 class="text-on-surface-variant text-[10px] uppercase font-bold tracking-[0.2em] mb-1">Xe đã lưu</h3>
            <p class="text-4xl font-headline font-black text-on-background">0</p>
        </div>
        <div class="bg-surface-container-low p-8 rounded-lg border border-outline-variant/10 hover:border-primary/30 transition-all group">
            <span class="material-symbols-outlined text-primary text-4xl mb-4 group-hover:scale-110 transition-transform">account_circle</span>
            <h3 class="text-on-surface-variant text-[10px] uppercase font-bold tracking-[0.2em] mb-1">Loại tài khoản</h3>
            <p class="text-4xl font-headline font-black text-on-background">{{ Auth::user()->id == 1 ? 'Quản trị' : 'Thành viên' }}</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Activity Log -->
        <div class="lg:col-span-2 bg-surface-container rounded-lg p-8">
            <h2 class="text-2xl font-headline font-bold text-on-background uppercase mb-8 border-b border-outline-variant/10 pb-4">Hoạt động gần đây</h2>
            <div class="space-y-6">
                @forelse($orders as $order)
                <div class="flex gap-4 items-start pb-6 border-b border-outline-variant/5">
                    <span class="inline-block p-2 bg-primary/10 rounded-full">
                        <span class="material-symbols-outlined text-primary text-sm">receipt_long</span>
                    </span>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-on-surface font-body font-bold uppercase tracking-tight">{{ $order->code }}</p>
                                <p class="text-xs text-on-surface-variant mt-1">{{ $order->created_at->diffForHumans() }}</p>
                            </div>
                            <span class="bg-primary/20 text-primary text-[10px] font-black px-3 py-1 rounded uppercase tracking-widest">
                                {{ $order->status == 'pending' ? 'Đang xử lý' : ($order->status == 'completed' ? 'Hoàn tất' : 'Đã hủy') }}
                            </span>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($order->orderDetails as $detail)
                                <span class="text-[10px] bg-surface-container-highest px-3 py-1 rounded-full text-on-surface-variant border border-outline-variant/20">
                                    {{ $detail->product->name }} (x{{ $detail->quantity }})
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex flex-col items-center justify-center py-20 text-center opacity-30">
                    <span class="material-symbols-outlined text-6xl mb-4">history</span>
                    <p class="font-body text-sm uppercase tracking-widest">Chưa có dữ liệu giao dịch</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Account Settings / Rapid Actions -->
        <div class="space-y-8">
            <div class="bg-surface-container-high rounded-lg p-8">
                <h2 class="text-xl font-headline font-bold text-on-background uppercase mb-6">Thao tác nhanh</h2>
                <div class="flex flex-col gap-4">
                    @if(Auth::user()->hasRole(['admin', 'manager']))
                    <a href="{{ route('admin.index') }}" class="bg-gradient-to-r from-red-600 to-orange-500 text-white font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:brightness-110 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">admin_panel_settings</span>
                        TRANG QUẢN TRỊ
                    </a>
                    @endif
                    <a href="/" class="kinetic-gradient text-on-primary font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:brightness-110 transition-all">TIẾP TỤC MUA XE</a>
                    <a href="/profile" class="bg-surface-container border border-outline-variant/20 text-on-surface font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:bg-surface-container-highest transition-all">THÔNG TIN CÁ NHÂN</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-error font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:bg-error/10 transition-all border border-error/10">ĐĂNG XUẤT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
