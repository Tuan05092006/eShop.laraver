@extends('layouts.store')

@section('content')
<main class="pt-32 pb-24 px-6 md:px-12 max-w-7xl mx-auto min-h-screen">
    <div class="mb-12">
        <h1 class="text-5xl md:text-7xl font-headline font-bold tracking-tighter uppercase text-on-background mb-4">Giỏ hàng</h1>
        <p class="text-on-surface-variant font-label tracking-wide uppercase text-sm">Tuyển tập những kiệt tác bạn đã chọn</p>
    </div>

    @if(session('success'))
        <div class="bg-primary/10 border border-primary/30 text-primary p-4 rounded mb-8 text-sm font-bold uppercase tracking-widest">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <!-- Cart Items List -->
        <div class="lg:col-span-8 space-y-8">
            @forelse($cart as $id => $details)
                <!-- Item -->
                <div class="group bg-surface-container-low p-6 flex flex-col md:flex-row gap-8 relative overflow-hidden transition-all duration-500 hover:bg-surface-container-high">
                    <div class="w-full md:w-64 h-44 overflow-hidden bg-surface-container-highest flex-shrink-0">
                        <img alt="{{ $details['name'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $details['image'] }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                    </div>
                    <div class="flex-grow flex flex-col justify-between py-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-3xl font-headline font-bold tracking-tight uppercase text-on-background leading-none mb-2">{{ $details['name'] }}</h2>
                                <span class="bg-secondary-container text-on-secondary-container text-[10px] px-3 py-1 rounded-full font-label font-bold tracking-widest uppercase">{{ $details['brand'] }}</span>
                            </div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-outline hover:text-error transition-colors">
                                    <span class="material-symbols-outlined">close</span>
                                </button>
                            </form>
                        </div>
                        <div class="mt-6 flex flex-wrap gap-4 text-xs font-label text-on-surface-variant tracking-wider uppercase">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">directions_car</span> Mẫu: {{ $details['model'] }}
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between items-end">
                            <div class="flex items-center gap-4 bg-surface-container-highest px-4 py-2">
                                <button class="text-on-surface hover:text-primary transition-colors"><span class="material-symbols-outlined text-sm">remove</span></button>
                                <span class="font-headline font-bold text-lg w-4 text-center">1</span>
                                <button class="text-on-surface hover:text-primary transition-colors"><span class="material-symbols-outlined text-sm">add</span></button>
                            </div>
                            <div class="text-right">
                                <p class="text-primary font-headline text-3xl font-bold tracking-tighter">{{ number_format($details['price']) }} ₫</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-24 glass-card bg-surface-container-low">
                    <p class="text-on-surface-variant italic mb-8">Giỏ hàng của bạn đang trống.</p>
                    <a href="/" class="kinetic-gradient px-8 py-4 rounded-lg text-on-primary font-bold uppercase tracking-widest text-sm inline-block">Tiếp tục mua sắm</a>
                </div>
            @endforelse
        </div>

        <!-- Order Summary -->
        @if(count($cart) > 0)
        <aside class="lg:col-span-4 bg-surface-container p-8 sticky top-32 border-l-0 border-outline-variant/20">
            <h3 class="text-xl font-headline font-bold tracking-widest uppercase mb-8 pb-4 border-b border-outline-variant/20">Tóm tắt đơn hàng</h3>
            <div class="space-y-6 mb-12">
                <div class="flex justify-between text-on-surface-variant font-label uppercase text-sm tracking-widest">
                    <span>Tạm tính</span>
                    <span class="text-on-surface font-headline font-bold">{{ number_format($total) }} ₫</span>
                </div>
                <div class="flex justify-between text-on-surface-variant font-label uppercase text-sm tracking-widest">
                    <span>Phí vận chuyển</span>
                    <span class="text-tertiary font-headline font-bold">Miễn phí</span>
                </div>
            </div>
            <div class="border-t border-outline-variant/50 pt-8 mb-10">
                <div class="flex justify-between items-end">
                    <span class="text-on-surface-variant font-label uppercase text-sm tracking-[0.2em]">Tổng cộng</span>
                    <div class="text-right">
                        <p class="text-primary font-headline text-4xl font-bold tracking-tighter">{{ number_format($total) }} ₫</p>
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <a href="{{ route('checkout.index') }}" class="w-full inline-block text-center py-5 bg-gradient-to-r from-primary-container to-primary text-on-primary font-headline font-bold uppercase tracking-[0.15em] rounded-lg text-sm hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-primary-container/20">
                    Tiến hành thanh toán
                </a>
                <a href="/" class="w-full inline-block text-center py-5 bg-transparent border border-primary text-primary font-headline font-bold uppercase tracking-[0.15em] rounded-lg text-sm hover:bg-primary/5 transition-all">
                    Tiếp tục mua sắm
                </a>
            </div>
            <div class="mt-8 flex items-center gap-3 text-on-surface-variant opacity-60">
                <span class="material-symbols-outlined text-sm">verified_user</span>
                <span class="text-[10px] font-label uppercase tracking-widest">Giao dịch an toàn &amp; Bảo mật tuyệt đối</span>
            </div>
        </aside>
        @endif
    </div>
</main>
@endsection
