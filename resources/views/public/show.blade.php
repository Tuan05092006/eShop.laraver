@extends('layouts.store')

@section('content')
<main class="pt-24 pb-20 max-w-7xl mx-auto px-6 lg:px-8">
    <!-- Hero Gallery Section -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16">
        <!-- Main Display -->
        <div class="lg:col-span-8 relative group overflow-hidden rounded-lg bg-surface-container">
            <img alt="{{ $car->name }}" class="w-full h-[600px] object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $car->image }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
            <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent">
                <span class="bg-tertiary text-on-tertiary px-3 py-1 text-[10px] tracking-widest font-bold uppercase rounded-sm mb-4 inline-block">Mẫu Xe Hiện Có</span>
                <h1 class="text-5xl font-black font-headline tracking-tighter uppercase text-white mb-2">{{ $car->name }}</h1>
                <p class="text-on-surface-variant font-medium tracking-wide">{{ $car->model }} | {{ $car->brand->name }} ({{ $car->year }})</p>
            </div>
        </div>
        <!-- Side Gallery Bento (Dữ liệu mẫu từ Stitch) -->
        <div class="lg:col-span-4 flex flex-col gap-4">
            <div class="h-1/2 overflow-hidden rounded-lg bg-surface-container">
                <img alt="Interior View" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyApeaMVO3HUJw7qU00_QB6sHgBP0aFNLxlHjqINyL2bgLYPJKR8da8hxZ_9CfR0OAKcV9o5Qswkgw3FZjxR9-J8yl27LIPThl3n3xxGlTabkVbLHWrxijqtyOHWjj5GvHMTNMSORljE_qQkx2xPfLjmrW918CHN0y0LBdkV6sq9UFs5sC_tqVqi0JGmgioBDUtrGR3qe9IVdVu5H0wlhX8kILtLKGGSS8U2oWV5dbZapHj-DM9GXT-2iFAJBb7viuFLpaD5j1wHAa"/>
            </div>
            <div class="h-1/2 grid grid-cols-2 gap-4">
                <div class="rounded-lg bg-surface-container overflow-hidden">
                    <img alt="Wheel Detail" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrkHHbmJ0WBvHl6umKrdYbssl6tQu0fYn3mSBHQeuxgxZN7qO1z8XxH7KdcvKeBxHhpT41MJ3ughKgouwjqZOUnUD3r_WwHesBizIF_vlfVCrLmtbs2kDAyKGUEeTZ4LQ91RaAJx5O9RE5S7f1-Dcs1vkvcrb59KQfL-OulVsZGz7fitLXHUH7jhyL6nlIG8-KlK2v0iktkzIDfkThgiCZNllTfH-NY8rKft7yASgLO3UpwB5Uf7vDu9dUIM-JWzGTpXbW28Ra5UCn"/>
                </div>
                <div class="rounded-lg bg-surface-container overflow-hidden relative flex items-center justify-center group cursor-pointer">
                    <img alt="Rear Detail" class="w-full h-full object-cover brightness-50" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzMNooHKM1ZL_puRY1AYE1gz0gCHxx1J4VF03L-pvzChXRliVF30vnjp62GlLragYoUSLrnGgYXY59HdoE-XuSVm03lEuB-DI1NL96KGRjL-LHfvyHJaNKEQUZVQPc3ka5SKHwXgGx-pPNInbgVhnqk8Imyi3w3IdiXBbFtl-BFmAB9qczr8znkQnufofAzwFHrLddZk0VI_GUlxvo-1XypzW2CSQL6ApyxkmeTYpWuOE0sPsueOKkdiuWY0XzkpMnwwgAHSCL5tTy"/>
                    <div class="absolute inset-0 flex flex-col items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-3xl">grid_view</span>
                        <span class="text-xs font-headline font-bold tracking-widest uppercase">Xem tất cả</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content & Specs -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Details Column -->
        <div class="lg:col-span-2 space-y-16">
            <!-- Info Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end pb-8 border-b border-outline-variant/20">
                <div>
                    <h2 class="text-sm font-headline tracking-[0.2em] text-primary uppercase mb-4">{{ $car->brand->name }} / {{ $car->model }}</h2>
                    <p class="text-lg text-on-surface-variant max-w-xl">
                        {{ $car->description ?? 'Trải nghiệm sự hoàn mỹ với dòng xe ' . $car->name . '. Thiết kế khí động học tối ưu và hệ thống truyền động tân tiến tái định nghĩa cảm giác lái trong kỷ nguyên mới.' }}
                    </p>
                </div>
                <div class="mt-6 md:mt-0 text-right">
                    <span class="text-xs text-on-surface-variant tracking-widest uppercase block mb-1">Giá Niêm Yết</span>
                    <span class="text-4xl font-headline font-black text-on-surface">{{ number_format($car->price) }} VNĐ</span>
                </div>
            </div>

            <!-- Technical Specs Bento -->
            <div>
                <h3 class="text-2xl font-headline font-bold uppercase tracking-tight mb-8 flex items-center gap-3">
                    <span class="w-8 h-[2px] bg-primary"></span> Thông số kỹ thuật
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-surface-container-low p-6 rounded-lg transition-colors hover:bg-surface-container-high group text-center">
                        <span class="material-symbols-outlined text-primary mb-4">bolt</span>
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1">Động Cơ</p>
                        <p class="font-headline font-bold text-lg">{{ $car->engine }}</p>
                    </div>
                    <div class="bg-surface-container-low p-6 rounded-lg transition-colors hover:bg-surface-container-high group text-center">
                        <span class="material-symbols-outlined text-primary mb-4">speed</span>
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1">Truyền động</p>
                        <p class="font-headline font-bold text-lg">{{ $car->transmission }}</p>
                    </div>
                    <div class="bg-surface-container-low p-6 rounded-lg transition-colors hover:bg-surface-container-high group text-center">
                        <span class="material-symbols-outlined text-primary mb-4">local_gas_station</span>
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1">Nhiên liệu</p>
                        <p class="font-headline font-bold text-lg">{{ $car->fuel_type }}</p>
                    </div>
                    <div class="bg-surface-container-low p-6 rounded-lg transition-colors hover:bg-surface-container-high group text-center">
                        <span class="material-symbols-outlined text-primary mb-4">history</span>
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1">Số Km đi</p>
                        <p class="font-headline font-bold text-lg">{{ number_format($car->mileage) }} Km</p>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-xl font-headline font-bold uppercase tracking-tight mb-6 flex items-center gap-3">An Toàn</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 text-on-surface-variant group">
                            <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                            <span class="group-hover:text-on-surface transition-colors">Hệ thống phanh ABS/EBD cao cấp</span>
                        </li>
                        <li class="flex items-center gap-4 text-on-surface-variant group">
                            <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                            <span class="group-hover:text-on-surface transition-colors">Hệ thống túi khí bao quanh 360 độ</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-headline font-bold uppercase tracking-tight mb-6 flex items-center gap-3">Tiện Nghi</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 text-on-surface-variant group">
                            <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                            <span class="group-hover:text-on-surface transition-colors">Điều hòa 2 vùng độc lập</span>
                        </li>
                        <li class="flex items-center gap-4 text-on-surface-variant group">
                            <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                            <span class="group-hover:text-on-surface transition-colors">Hệ thống âm thanh vòm đỉnh cao</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sticky CTA Sidebar -->
        <div class="lg:col-span-1">
            <div class="sticky top-28 space-y-6">
                <div class="bg-surface-container-low p-8 rounded-lg border border-outline-variant/10">
                    <div class="mb-8">
                        <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-2">Tình trạng</p>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span class="text-sm font-bold uppercase">Sẵn hàng tại Gallery</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <a href="{{ route('cart.add', $car->id) }}" class="w-full block text-center py-4 px-6 bg-gradient-to-br from-primary-container to-primary text-on-primary-container font-headline font-bold uppercase tracking-wider rounded-lg transition-all hover:scale-[1.02] active:scale-95 shadow-lg shadow-primary-container/20">
                            Thêm vào giỏ hàng
                        </a>
                        <button class="w-full py-4 px-6 border border-primary text-primary font-headline font-bold uppercase tracking-wider rounded-lg transition-all hover:bg-primary/10 active:scale-95">
                            Liên hệ tư vấn
                        </button>
                    </div>
                    <div class="mt-8 pt-8 border-t border-outline-variant/20 space-y-4">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-on-surface-variant">verified_user</span>
                            <div>
                                <p class="text-sm font-bold">Bảo hành 5 năm</p>
                                <p class="text-xs text-on-surface-variant">Hoặc 100.000km đầu tiên</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
