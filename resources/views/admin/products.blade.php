@extends('admin.layout')
@section('page-title', 'Quản Lý Sản Phẩm')
@section('page-subtitle', 'Danh sách xe trong kho')

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-400 text-sm">{{ $products->total() }} mẫu xe</p>
    <a href="{{ route('admin.products.create') }}" class="flex items-center gap-2 bg-primary hover:bg-primary/80 text-white px-5 py-2.5 rounded-lg text-sm font-bold uppercase tracking-widest transition-colors">
        <span class="material-symbols-outlined text-sm">add</span> Thêm Xe Mới
    </a>
</div>

<div class="bg-surface-card border border-border rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border bg-black/20">
                <th class="px-6 py-4 text-left font-bold">Xe</th>
                <th class="px-6 py-4 text-left font-bold">Thương Hiệu</th>
                <th class="px-6 py-4 text-left font-bold">Năm</th>
                <th class="px-6 py-4 text-left font-bold">Giá (VND)</th>
                <th class="px-6 py-4 text-left font-bold">Nổi Bật</th>
                <th class="px-6 py-4 text-left font-bold">Hành Động</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            @foreach($products as $product)
            <tr class="hover:bg-white/5 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-14 h-10 object-cover rounded" onerror="this.src='https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=100&q=60'">
                        <span class="font-headline font-bold text-white">{{ $product->name }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-400">{{ $product->category->name ?? '—' }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $product->year }}</td>
                <td class="px-6 py-4 font-bold text-primary-light">{{ number_format($product->price) }}</td>
                <td class="px-6 py-4">
                    @if($product->is_featured)
                        <span class="px-2 py-1 bg-yellow-900/40 text-yellow-400 text-[10px] rounded-full font-bold uppercase">★ Nổi Bật</span>
                    @else
                        <span class="text-gray-600 text-xs">—</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-primary-light hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </a>
                        <form method="POST" action="{{ route('admin.products.delete', $product->id) }}" onsubmit="return confirm('Xóa xe {{ $product->name }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 transition-colors">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-border">
        {{ $products->links() }}
    </div>
</div>
@endsection
