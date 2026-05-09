@extends('layouts.store')

@section('content')
<main class="pt-32 pb-20 px-6 md:px-12 lg:px-24">
    <!-- Hero Section -->
    <section class="mb-20">
        <!-- Hero Header -->
        <header class="relative h-[600px] flex flex-col justify-center mb-16 overflow-hidden rounded-2xl">
            <img class="absolute inset-0 w-full h-full object-cover opacity-60" src="https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Showroom Background" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';">
            <div class="absolute inset-0 bg-gradient-to-r from-background via-background/80 to-transparent"></div>
            
            <div class="relative z-10">
                <span class="text-primary font-headline font-bold text-xs tracking-[0.4em] uppercase mb-6 block animate-fade-in">Danh mục 2024</span>
                <h1 class="text-6xl md:text-8xl font-headline font-black tracking-tighter mb-8 uppercase leading-none">
                    BỘ SƯU TẬP<br/>
                    <span class="text-primary italic animate-pulse">VELOX AUTO</span>
                </h1>
                <p class="text-on-surface-variant font-body text-lg max-w-xl leading-relaxed opacity-80">
                    Khám phá các tuyệt tác kỹ thuật được phân loại theo phong cách sống và nhu cầu vận hành của bạn. Mỗi chiếc xe là một sự khẳng định về đẳng cấp.
                </p>
            </div>

            <!-- Quick Stats -->
            <div class="absolute bottom-0 right-0 p-12 bg-surface-container/40 backdrop-blur-xl border-l border-t border-outline-variant/20 rounded-tl-3xl hidden md:flex gap-12">
                <div class="text-center">
                    <span class="block text-4xl font-headline font-black text-on-background">{{ $totalCars }}</span>
                    <span class="text-[10px] font-label uppercase tracking-widest text-outline">Xe có sẵn</span>
                </div>
                <div class="w-px bg-outline-variant/30 h-12"></div>
                <div class="text-center">
                    <span class="block text-4xl font-headline font-black text-on-background">{{ $brands->count() }}</span>
                    <span class="text-[10px] font-label uppercase tracking-widest text-outline">Thương hiệu</span>
                </div>
            </div>
        </header>
    </section>

    <!-- Bento Grid Catalog -->
    <section class="grid grid-cols-1 md:grid-cols-12 gap-6 h-auto md:h-[1200px]">
        @php
            $segments = [
                ['name' => 'SUV', 'col' => 'md:col-span-8 md:row-span-2', 'img' => 'https://images.unsplash.com/photo-1632243542379-373266e74dfb', 'count' => $typeCounts['SUV'] ?? 0, 'sub' => 'All-Terrain Luxury'],
                ['name' => 'SEDAN', 'col' => 'md:col-span-4 md:row-span-1', 'img' => 'https://images.unsplash.com/photo-1631214500115-598fc2cb882e', 'count' => $typeCounts['SEDAN'] ?? 0, 'sub' => 'Executive Comfort'],
                ['name' => 'COUPE', 'col' => 'md:col-span-4 md:row-span-1', 'img' => 'https://images.unsplash.com/photo-1592198084033-aade902d1aae', 'count' => $typeCounts['COUPE'] ?? 0, 'sub' => 'Sporty Performance'],
                ['name' => 'CONVERTIBLE', 'col' => 'md:col-span-6 md:row-span-1', 'img' => 'https://images.unsplash.com/photo-1597404294360-fedeca4d9300', 'count' => $typeCounts['CONVERTIBLE'] ?? 0, 'sub' => 'Open-Air Freedom'],
                ['name' => 'PERFORMANCE', 'col' => 'md:col-span-6 md:row-span-1', 'img' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70', 'count' => $typeCounts['PERFORMANCE'] ?? 0, 'sub' => 'Extreme Power'],
            ];
        @endphp

        @foreach($segments as $segment)
        <a href="{{ route('showroom', ['type' => $segment['name']]) }}#category-results" class="{{ $segment['col'] }} group relative overflow-hidden rounded-lg bg-surface-container-low transition-colors duration-500 hover:bg-surface-container-high cursor-pointer {{ $selectedType == $segment['name'] ? 'ring-2 ring-primary ring-inset' : '' }}">
            <img class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" src="{{ $segment['img'] }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
            <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-10 w-full flex justify-between items-end">
                <div>
                    <span class="text-tertiary font-headline font-bold text-xs tracking-widest uppercase mb-2 block">{{ $segment['sub'] }}</span>
                    <h3 class="{{ $segment['name'] == 'SUV' ? 'text-5xl' : 'text-3xl' }} text-on-background font-headline font-black tracking-tighter uppercase mb-2">{{ $segment['name'] }}</h3>
                    <div class="flex gap-4">
                        <span class="bg-primary/20 text-primary px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">{{ $segment['count'] }} Mẫu xe</span>
                    </div>
                </div>
                <div class="kinetic-gradient w-14 h-14 rounded-lg flex items-center justify-center text-on-primary shadow-2xl group-hover:translate-x-2 transition-transform">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </div>
        </a>
        @endforeach
    </section>

    <!-- Brands Grid -->
    <section class="mt-32">
        <h2 class="text-3xl font-headline font-bold uppercase tracking-tight mb-12 flex items-center gap-4 text-on-background">
            <span class="w-12 h-[2px] bg-primary"></span> Đối tác thương hiệu
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach($brands as $brand)
            <a href="{{ route('showroom', ['brand' => $brand->id]) }}#category-results" class="bg-surface-container-low p-8 rounded-lg flex flex-col items-center justify-center grayscale hover:grayscale-0 transition-all cursor-pointer border border-outline-variant/10 hover:border-primary/50 block {{ $selectedBrandId == $brand->id ? 'grayscale-0 border-primary shadow-lg shadow-primary/10' : '' }}">
                <span class="text-xl font-black font-headline text-on-surface uppercase">{{ $brand->name }}</span>
                <span class="text-[10px] uppercase tracking-widest text-on-surface-variant mt-2">{{ $brand->cars_count }} Kiệt tác</span>
            </a>
            @endforeach
        </div>
    </section>

    <!-- Category Results Section -->
    @if($selectedProducts)
    <section id="category-results" class="mt-32 scroll-mt-32">
        <div class="flex justify-between items-end mb-12 border-b border-outline-variant/20 pb-6">
            <div>
                <span class="text-primary font-headline font-bold text-xs tracking-widest uppercase mb-2 block">Kết quả tìm thấy</span>
                <h2 class="text-4xl font-headline font-black tracking-tighter text-on-background uppercase">
                    DANH MỤC: {{ $selectedType ?? $brands->find($selectedBrandId)->name }}
                </h2>
                <p class="text-on-surface-variant font-body mt-2 uppercase text-xs tracking-widest">Hiển thị {{ $selectedProducts->count() }} kiệt tác phù hợp</p>
            </div>
            <a href="{{ route('showroom') }}" class="text-xs text-on-surface-variant hover:text-white uppercase tracking-widest font-bold flex items-center gap-2 transition-colors">
                <span class="material-symbols-outlined text-sm">close</span> Đóng bộ lọc
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($selectedProducts as $car)
            <div class="bg-surface-container-low rounded-lg overflow-hidden group transition-all duration-500 hover:bg-surface-container-high">
                <div class="relative h-64 overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $car->image }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                    <div class="absolute bottom-0 left-0 w-full h-1/2 scrim-bottom flex items-end p-6">
                        <span class="text-white font-headline text-3xl font-bold tracking-tighter uppercase">{{ $car->name }}</span>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between text-on-surface-variant font-body text-xs tracking-wider uppercase">
                        <span>{{ $car->category->name }}</span>
                        <span>{{ $car->year }}</span>
                    </div>
                    <div class="h-[1px] bg-outline-variant/10"></div>
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-on-surface-variant text-[10px] uppercase tracking-widest font-bold">Giá ưu đãi</p>
                            <p class="text-2xl font-headline font-black text-primary">{{ number_format($car->price) }} <span class="text-xs font-normal">VND</span></p>
                        </div>
                        <a href="{{ route('car.show', $car->id) }}" class="material-symbols-outlined text-primary p-2 rounded-lg border border-primary/20 hover:bg-primary/10 transition-colors">arrow_forward</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Quick Concierge CTA -->
    <section class="mt-32 glass-nav p-12 rounded-lg border-l-4 border-primary">
        <div class="flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="max-w-xl">
                <h2 class="text-4xl font-headline font-black tracking-tighter uppercase mb-4 text-on-background">Chưa tìm thấy mẫu xe ưng ý?</h2>
                <p class="text-on-surface-variant leading-relaxed">Đăng ký nhận thông báo khi có các mẫu xe mới về showroom hoặc yêu cầu một dịch vụ tìm kiếm xe cá nhân hóa từ đội ngũ Concierge của chúng tôi.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                <a href="mailto:concierge@veloxauto.com" class="kinetic-gradient px-8 py-4 rounded-lg font-headline font-bold uppercase tracking-widest text-sm shadow-xl hover:shadow-primary/20 transition-all active:scale-95 inline-block text-center text-white">Liên hệ Tư vấn</a>
            </div>
        </div>
    </section>
</main>
@endsection
