@extends('admin.layout')
@section('page-title', 'Thương Hiệu')
@section('page-subtitle', 'Quản lý danh sách thương hiệu xe')

@section('admin-content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Add Brand Form -->
    <div class="bg-surface-card border border-border rounded-xl p-6">
        <h2 class="font-headline font-bold uppercase tracking-tight text-sm mb-6 pb-4 border-b border-border">Thêm Thương Hiệu Mới</h2>
        <form method="POST" action="{{ route('admin.brands.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Tên Thương Hiệu</label>
                <input name="name" required
                    class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all"
                    placeholder="VD: Bugatti">
            </div>
            @if($errors->has('name'))
                <p class="text-red-400 text-xs">{{ $errors->first('name') }}</p>
            @endif
            <button type="submit" class="w-full bg-primary hover:bg-primary/80 text-white px-4 py-3 rounded-lg text-sm font-bold uppercase tracking-widest transition-colors">
                Thêm Thương Hiệu
            </button>
        </form>
    </div>

    <!-- Brands List -->
    <div class="lg:col-span-2 bg-surface-card border border-border rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border bg-black/20">
                    <th class="px-6 py-4 text-left font-bold">Thương Hiệu</th>
                    <th class="px-6 py-4 text-left font-bold">Số Mẫu Xe</th>
                    <th class="px-6 py-4 text-left font-bold">Hành Động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($brands as $brand)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-6 py-4 font-headline font-bold text-white uppercase">{{ $brand->name }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-primary/10 text-primary-light text-xs rounded-full font-bold">{{ $brand->products_count }} xe</span>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{ route('admin.brands.delete', $brand->id) }}" onsubmit="return confirm('Xóa thương hiệu {{ $brand->name }}? Tất cả xe thuộc hãng này sẽ bị ảnh hưởng.')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 transition-colors flex items-center gap-1 text-xs font-bold uppercase tracking-widest">
                                <span class="material-symbols-outlined text-sm">delete</span> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="px-6 py-12 text-center text-gray-500">Chưa có thương hiệu nào.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
