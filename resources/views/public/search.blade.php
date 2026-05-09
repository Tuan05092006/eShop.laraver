@extends('layouts.store')

@section('content')
<main class="pt-32 pb-20 px-4 md:px-8 max-w-screen-2xl mx-auto">
    <!-- Search & Filter Bar -->
    <section class="mb-12 relative overflow-hidden rounded-2xl p-8 md:p-12">
        <img class="absolute inset-0 w-full h-full object-cover opacity-50" src="https://images.unsplash.com/photo-1614200187524-dc4b892acf16?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Search Background" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';">
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/70 to-background/30"></div>

        <div class="relative z-10 flex flex-col gap-8">
            <div class="text-center mb-4">
                <h1 class="text-4xl md:text-5xl font-headline font-black tracking-tighter text-on-background uppercase mb-2">Tìm kiếm xe</h1>
                <p class="text-on-surface-variant font-body uppercase text-xs tracking-widest">Sử dụng công cụ bên dưới để tìm mẫu xe mơ ước của bạn</p>
            </div>
            
            <form action="{{ route('search') }}" method="GET" class="relative w-full max-w-4xl mx-auto shadow-2xl rounded-lg overflow-hidden">
                <input name="query" value="{{ $query }}" class="w-full bg-surface-container-high/90 backdrop-blur-md border-0 border-b-2 border-primary/50 focus:border-primary focus:ring-0 text-xl py-6 px-12 font-body text-on-surface transition-all outline-none placeholder:text-outline" placeholder="Nhập tên xe, dòng xe..." type="text"/>
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary text-3xl">search</span>
                <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 kinetic-gradient text-on-primary font-headline font-bold px-8 py-3 rounded text-sm tracking-widest shadow-lg hover:brightness-110 transition-all">TÌM</button>
            </form>
            
            <!-- Bento Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto w-full">
                <div class="bg-surface-container/60 backdrop-blur-xl p-6 rounded-lg border border-outline-variant/20 hover:border-primary/30 transition-all">
                    <label class="text-[0.65rem] tracking-[0.2em] text-primary font-bold uppercase mb-2 block">Hãng Xe</label>
                    <select name="brand" onchange="this.form.submit()" class="bg-transparent border-0 w-full font-headline text-lg text-on-background outline-none appearance-none cursor-pointer focus:ring-0">
                        <option value="" class="bg-surface">Tất cả hãng xe</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('brand') == $cat->id ? 'selected' : '' }} class="bg-surface">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bg-surface-container/60 backdrop-blur-xl p-6 rounded-lg border border-outline-variant/20 hover:border-primary/30 transition-all">
                    <label class="text-[0.65rem] tracking-[0.2em] text-primary font-bold uppercase mb-2 block">Nhiên liệu</label>
                    <select name="fuel" onchange="this.form.submit()" class="bg-transparent border-0 w-full font-headline text-lg text-on-background outline-none appearance-none cursor-pointer focus:ring-0">
                        <option value="" class="bg-surface">Tất cả</option>
                        <option value="Petrol" {{ request('fuel') == 'Petrol' ? 'selected' : '' }} class="bg-surface">Xăng (Petrol)</option>
                        <option value="Hybrid" {{ request('fuel') == 'Hybrid' ? 'selected' : '' }} class="bg-surface">Hybrid</option>
                        <option value="Electric" {{ request('fuel') == 'Electric' ? 'selected' : '' }} class="bg-surface">Điện (Electric)</option>
                    </select>
                </div>
                <div class="flex items-center justify-end bg-surface-container/30 backdrop-blur-xl p-6 rounded-lg border border-outline-variant/10">
                    <a href="{{ route('search') }}" class="text-xs text-on-surface-variant hover:text-primary uppercase tracking-widest font-bold flex items-center gap-2 transition-colors">
                        <span class="material-symbols-outlined text-sm">filter_alt_off</span> Xóa bộ lọc
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Header -->
    <div class="flex justify-between items-end mb-8 border-b border-outline-variant/20 pb-4">
        <div>
            <h2 class="text-4xl font-headline font-black tracking-tighter text-on-background uppercase">KẾT QUẢ TÌM KIẾM</h2>
            <p class="text-on-surface-variant font-body mt-1 uppercase text-xs tracking-widest leading-loose">
                Tìm thấy {{ $cars->count() }} mẫu xe phù hợp
                @if($query) cho "{{ $query }}" @endif
                @if(request('type')) loại "{{ request('type') }}" @endif
            </p>
        </div>
        <div class="flex gap-4">
            <button class="bg-surface-container-high text-on-surface px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">sort</span> Sắp xếp: Mới nhất
            </button>
        </div>
    </div>

    <!-- Car Results Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($cars as $car)
        <!-- Car Card -->
        <div class="bg-surface-container-low rounded-lg overflow-hidden group transition-all duration-500 hover:bg-surface-container-high">
            <div class="relative h-64 overflow-hidden">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $car->image }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800';"/>
                <div class="absolute bottom-0 left-0 w-full h-1/2 scrim-bottom flex items-end p-6">
                    <span class="text-white font-headline text-3xl font-bold tracking-tighter uppercase">{{ $car->name }}</span>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between text-on-surface-variant font-body text-xs tracking-wider uppercase">
                    <span>{{ $car->brand->name }}</span>
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
        @empty
        <div class="col-span-full text-center py-24 glass-nav">
            <p class="text-on-surface-variant italic mb-8">Không tìm thấy xe nào khớp với tiêu chí tìm kiếm của bạn.</p>
            <a href="/" class="kinetic-gradient px-8 py-4 rounded-lg text-on-primary font-bold uppercase tracking-widest text-sm inline-block">Xem tất cả xe</a>
        </div>
        @endforelse
    </div>
</main>
@endsection
