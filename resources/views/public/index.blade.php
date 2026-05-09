@extends('layouts.store')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen w-full flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Hero" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1621135802920-133df287f89c?auto=format&fit=crop&q=80&w=1920"/>
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute inset-0 scrim-bottom"></div>
    </div>
    <div class="container mx-auto px-8 relative z-10 pt-20">
        <div class="max-w-4xl">
            <span class="inline-block px-4 py-1 mb-6 rounded-full border border-primary/30 bg-primary/10 text-primary text-xs font-bold tracking-[0.2em] uppercase">
                Sự hoàn hảo trong từng chuyển động
            </span>
            <h1 class="font-headline text-6xl md:text-8xl font-black tracking-tighter text-on-background leading-none mb-8 uppercase">
                VELOX AUTO <br/> <span class="text-primary italic">Đẳng cấp</span>
            </h1>
            <p class="text-on-surface-variant text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                Khám phá bộ sưu tập xe sang được tinh tuyển, nơi công nghệ cơ khí đỉnh cao hòa quyện cùng nghệ thuật thiết kế đương đại.
            </p>
            <div class="flex flex-col md:flex-row gap-4">
                <button class="kinetic-gradient px-10 py-5 rounded-lg text-on-primary font-bold uppercase tracking-widest text-sm hover:brightness-110 transition-all active:scale-95">
                    Khám phá ngay
                </button>
                <button class="px-10 py-5 rounded-lg border border-primary/50 text-primary font-bold uppercase tracking-widest text-sm hover:bg-primary/5 transition-all active:scale-95">
                    Đặt lịch lái thử
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Xe Mới Về -->
<section class="py-24 bg-surface px-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="font-headline text-4xl font-bold tracking-tighter uppercase text-on-background">Xe Mới Về</h2>
                <div class="h-1 w-24 bg-primary mt-4"></div>
            </div>
            <a class="text-primary font-bold uppercase text-xs tracking-widest hover:translate-x-2 transition-transform inline-flex items-center gap-2" href="#">
                Xem tất cả <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            @if($allCars->count() > 0)
                @php $firstCar = $allCars->first(); @endphp
                <!-- Featured New Car -->
                <div class="md:col-span-8 group relative overflow-hidden bg-surface-container-low rounded-lg">
                    <img alt="{{ $firstCar->name }}" class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $firstCar->image }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 p-10 w-full">
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-tertiary font-bold uppercase tracking-widest text-xs mb-2 block">{{ $firstCar->brand->name }} Performance</span>
                                <h3 class="font-headline text-4xl font-bold text-white mb-4">{{ $firstCar->name }}</h3>
                                <div class="flex gap-8 text-on-surface-variant">
                                    <div>
                                        <span class="block text-xs uppercase tracking-tighter opacity-60">Động cơ</span>
                                        <span class="font-bold text-lg text-white">{{ $firstCar->engine }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-xs uppercase tracking-tighter opacity-60">Năm sản xuất</span>
                                        <span class="font-bold text-lg text-white">{{ $firstCar->year }}</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('cart.add', $firstCar->id) }}" class="kinetic-gradient p-4 rounded-full text-on-primary">
                                <span class="material-symbols-outlined">add_shopping_cart</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Secondary New Cars -->
                <div class="md:col-span-4 grid grid-rows-2 gap-8">
                    @foreach($allCars->skip(1)->take(2) as $car)
                    <div class="bg-surface-container-low p-6 rounded-lg group">
                        <a href="{{ route('car.show', $car->id) }}">
                            <img alt="{{ $car->name }}" class="w-full h-40 object-cover mb-4 rounded transition-transform duration-500 group-hover:scale-105" src="{{ $car->image }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                            <h4 class="font-headline font-bold text-xl uppercase">{{ $car->name }}</h4>
                            <p class="text-primary font-bold mt-2">{{ number_format($car->price) }} VND</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Xe Được Yêu Thích -->
<section class="py-24 bg-surface-container-lowest px-8">
    <div class="container mx-auto">
        <div class="text-center mb-20">
            <h2 class="font-headline text-5xl font-black tracking-tighter uppercase text-on-background mb-4">Được Yêu Thích Nhất</h2>
            <p class="text-on-surface-variant max-w-xl mx-auto">Những kiệt tác cơ khí được săn đón nhất trong tháng này tại VELOX AUTO.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach($featuredCars as $car)
            <div class="bg-surface-container-low rounded-lg overflow-hidden transition-all duration-300 hover:bg-surface-container-high hover:-translate-y-2">
                <div class="relative">
                    <img alt="{{ $car->name }}" class="w-full h-64 object-cover" src="{{ $car->image }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                    <span class="absolute top-4 left-4 bg-tertiary-container text-on-tertiary-container text-[10px] font-black px-3 py-1 uppercase rounded-full">Bán chạy</span>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="font-headline text-2xl font-bold uppercase tracking-tight">{{ $car->name }}</h3>
                            <span class="text-xs text-on-surface-variant uppercase tracking-widest">{{ $car->engine }} • {{ $car->transmission }}</span>
                        </div>
                        <span class="material-symbols-outlined text-primary cursor-pointer">favorite</span>
                    </div>
                    <div class="flex justify-between items-center pt-6 border-t border-outline-variant/20">
                        <span class="text-xl font-black font-headline text-white">{{ number_format($car->price) }} VND</span>
                        <a href="{{ route('car.show', $car->id) }}" class="text-primary hover:text-white transition-colors">
                            <span class="material-symbols-outlined">arrow_forward_ios</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tin tức & Đánh giá (Giữ nguyên giao diện Stitch) -->
<section class="py-24 bg-surface px-8">
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-24">
        <div>
            <h2 class="font-headline text-3xl font-bold uppercase tracking-tight mb-12">Tạp chí VELOX AUTO</h2>
            <div class="space-y-10">
                <article class="flex gap-6 items-center group cursor-pointer">
                    <div class="w-32 h-32 flex-shrink-0 overflow-hidden rounded">
                        <img alt="News 1" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.pexels.com/photos/244206/pexels-photo-244206.jpeg?auto=format&fit=crop&q=80&w=400"/>
                    </div>
                    <div>
                        <span class="text-primary text-[10px] font-bold uppercase tracking-widest mb-1 block">Công nghệ</span>
                        <h4 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors">Tương lai của động cơ Hybrid trong xe đua F1</h4>
                        <p class="text-on-surface-variant text-sm mt-2 line-clamp-2">Khám phá cách các kỹ sư tối ưu hóa hiệu suất điện năng trên đường đua khắc nghiệt nhất hành tinh.</p>
                    </div>
                </article>
                <article class="flex gap-6 items-center group cursor-pointer">
                    <div class="w-32 h-32 flex-shrink-0 overflow-hidden rounded">
                        <img alt="News 2" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.pexels.com/photos/3593922/pexels-photo-3593922.jpeg?auto=format&fit=crop&q=80&w=400"/>
                    </div>
                    <div>
                        <span class="text-primary text-[10px] font-bold uppercase tracking-widest mb-1 block">Sự kiện</span>
                        <h4 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors">Triển lãm xe cổ Concours d'Elegance 2024</h4>
                        <p class="text-on-surface-variant text-sm mt-2 line-clamp-2">Nơi hội tụ của những huyền thoại thiết kế vượt thời gian từ khắp nơi trên thế giới.</p>
                    </div>
                </article>
            </div>
        </div>
        <div class="bg-surface-container-high p-12 rounded-lg relative overflow-hidden">
            <span class="material-symbols-outlined text-8xl absolute -top-4 -right-4 opacity-10 text-primary">format_quote</span>
            <h2 class="font-headline text-3xl font-bold uppercase tracking-tight mb-12">Khách hàng nói gì</h2>
            <div class="space-y-12">
                <div class="relative z-10">
                    <p class="text-xl italic font-light leading-relaxed text-on-surface mb-6">"Trải nghiệm mua sắm tại VELOX AUTO hoàn toàn khác biệt. Họ không chỉ bán xe, họ bán một phong cách sống và sự an tâm tuyệt đối."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center font-bold text-primary">TD</div>
                        <div>
                            <p class="font-bold uppercase tracking-widest text-sm">Trần Duy</p>
                            <p class="text-xs text-on-surface-variant">Doanh nhân / Chủ sở hữu Porsche 911</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
