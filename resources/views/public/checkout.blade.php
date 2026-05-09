@extends('layouts.store')

@section('content')
<main class="pt-32 pb-20 px-4 md:px-8 max-w-7xl mx-auto">
    <div class="mb-12">
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter uppercase text-on-surface mb-2">THANH TOÁN</h1>
        <p class="text-on-surface-variant tracking-wider uppercase text-sm font-medium">Hoàn tất quy trình sở hữu tuyệt tác kỹ thuật.</p>
    </div>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left Column: Checkout Form -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Customer Info Section -->
                <section class="bg-surface-container-low p-8 rounded-lg relative overflow-hidden text-on-background">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <span class="material-symbols-outlined text-9xl">person</span>
                    </div>
                    <h2 class="text-2xl font-bold tracking-tight uppercase mb-8 flex items-center gap-3">
                        <span class="text-primary">01</span> THÔNG TIN KHÁCH HÀNG
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-1">
                            <label class="text-xs font-bold tracking-widest text-on-surface-variant uppercase">Họ và Tên</label>
                            <input name="name" value="{{ auth()->user()->name ?? '' }}" class="w-full bg-surface-container-highest border-b-2 border-outline-variant/30 focus:border-primary px-0 py-3 text-on-surface outline-none transition-all placeholder:text-outline/50 uppercase font-medium" placeholder="NGUYEN VAN A" type="text" required/>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold tracking-widest text-on-surface-variant uppercase">Số điện thoại</label>
                            <input name="phone" class="w-full bg-surface-container-highest border-b-2 border-outline-variant/30 focus:border-primary px-0 py-3 text-on-surface outline-none transition-all placeholder:text-outline/50 font-medium" placeholder="+84 000 000 000" type="tel" required/>
                        </div>
                        <div class="md:col-span-2 space-y-1">
                            <label class="text-xs font-bold tracking-widest text-on-surface-variant uppercase">Email</label>
                            <input name="email" value="{{ auth()->user()->email ?? '' }}" class="w-full bg-surface-container-highest border-b-2 border-outline-variant/30 focus:border-primary px-0 py-3 text-on-surface outline-none transition-all placeholder:text-outline/50 uppercase font-medium" placeholder="CONTACT@KINETIC.VN" type="email" required/>
                        </div>
                        <div class="md:col-span-2 space-y-1">
                            <label class="text-xs font-bold tracking-widest text-on-surface-variant uppercase">Địa chỉ giao xe / Showroom nhận xe</label>
                            <input name="address" class="w-full bg-surface-container-highest border-b-2 border-outline-variant/30 focus:border-primary px-0 py-3 text-on-surface outline-none transition-all placeholder:text-outline/50 uppercase font-medium" placeholder="72 LÊ THÁNH TÔN, QUẬN 1, TP.HCM" type="text" required/>
                        </div>
                    </div>
                </section>

                <!-- Payment Method Section -->
                <section class="bg-surface-container-low p-8 rounded-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <span class="material-symbols-outlined text-9xl">payments</span>
                    </div>
                    <h2 class="text-2xl font-bold tracking-tight uppercase mb-8 flex items-center gap-3">
                        <span class="text-primary">02</span> PHƯƠNG THỨC THANH TOÁN
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <label class="cursor-pointer group">
                            <input checked="" class="hidden peer" name="payment_method" value="Bank Transfer" type="radio"/>
                            <div class="p-6 border-2 border-outline-variant/20 peer-checked:border-primary peer-checked:bg-surface-container-high bg-surface-container transition-all flex flex-col items-center text-center gap-4">
                                <span class="material-symbols-outlined text-3xl text-primary">account_balance</span>
                                <div>
                                    <p class="text-sm font-bold tracking-widest uppercase mb-1">Chuyển khoản</p>
                                    <p class="text-[10px] text-on-surface-variant leading-relaxed">Xác nhận nhanh chóng qua cổng liên ngân hàng.</p>
                                </div>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input class="hidden peer" name="payment_method" value="Installment" type="radio"/>
                            <div class="p-6 border-2 border-outline-variant/20 peer-checked:border-primary peer-checked:bg-surface-container-high bg-surface-container transition-all flex flex-col items-center text-center gap-4">
                                <span class="material-symbols-outlined text-3xl text-primary">credit_card</span>
                                <div>
                                    <p class="text-sm font-bold tracking-widest uppercase mb-1">Trả góp</p>
                                    <p class="text-[10px] text-on-surface-variant leading-relaxed">Lãi suất 0% qua các đối tác tài chính chiến lược.</p>
                                </div>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input class="hidden peer" name="payment_method" value="Cash" type="radio"/>
                            <div class="p-6 border-2 border-outline-variant/20 peer-checked:border-primary peer-checked:bg-surface-container-high bg-surface-container transition-all flex flex-col items-center text-center gap-4">
                                <span class="material-symbols-outlined text-3xl text-primary">payments</span>
                                <div>
                                    <p class="text-sm font-bold tracking-widest uppercase mb-1">Tiền mặt</p>
                                    <p class="text-[10px] text-on-surface-variant leading-relaxed">Thanh toán trực tiếp tại hệ thống Gallery.</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </section>
            </div>

            <!-- Right Column: Order Summary -->
            <aside class="lg:col-span-4">
                <div class="sticky top-32 space-y-6">
                    <div class="bg-surface-container-high p-8 rounded-lg shadow-2xl">
                        <h3 class="text-xl font-bold tracking-tight uppercase mb-6 border-b border-outline-variant/20 pb-4">ĐƠN HÀNG CỦA BẠN</h3>
                        @foreach($cart as $id => $details)
                        <div class="flex gap-4 mb-6">
                            <div class="w-16 h-16 bg-surface-container-highest rounded overflow-hidden flex-shrink-0">
                                <img alt="{{ $details['name'] }}" class="w-full h-full object-cover" src="{{ $details['image'] }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="font-bold tracking-tight uppercase text-[10px] text-on-surface">{{ $details['name'] }}</h4>
                                <p class="text-primary font-bold text-xs">{{ number_format($details['price']) }} ₫</p>
                            </div>
                        </div>
                        @endforeach

                        <div class="border-t border-outline-variant/30 pt-6 mb-8">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold tracking-widest uppercase text-on-surface-variant">Tổng cộng</span>
                                <span class="text-3xl font-black text-on-surface tracking-tighter">{{ number_format($total) }} ₫</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-br from-primary-container to-primary text-on-primary py-5 rounded-lg font-bold tracking-widest uppercase text-sm shadow-[0_10px_40px_rgba(41,98,255,0.3)] hover:scale-[1.02] active:scale-95 transition-all duration-300">
                            XÁC NHẬN &amp; THANH TOÁN
                        </button>
                        <p class="text-[9px] text-center text-outline mt-6 uppercase tracking-widest leading-relaxed">
                            Bằng cách nhấn xác nhận, bạn đồng ý với các <a class="underline" href="#">Điều khoản &amp; Chính sách</a> của Kinetic Gallery.
                        </p>
                    </div>
                </div>
            </aside>
        </div>
    </form>
</main>
@endsection
