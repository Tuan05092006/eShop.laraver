@extends('admin.layout')
@section('page-title', isset($product) ? 'Chỉnh Sửa Xe' : 'Thêm Xe Mới')
@section('page-subtitle', isset($product) ? $product->name : 'Nhập thông tin mẫu xe mới')

@section('admin-content')
<div class="max-w-3xl">
    <form method="POST" action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" class="space-y-6">
        @csrf
        @if(isset($product)) @method('PUT') @endif

        <div class="bg-surface-card border border-border rounded-xl p-6 space-y-6">
            <h2 class="font-headline font-bold uppercase tracking-tight text-gray-400 text-xs border-b border-border pb-4">Thông Tin Cơ Bản</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Tên Xe *</label>
                    <input name="name" value="{{ old('name', $product->name ?? '') }}" required
                        class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all"
                        placeholder="VD: Lamborghini Huracán EVO">
                </div>
                <div>
                    <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Model</label>
                    <input name="model" value="{{ old('model', $product->model ?? '') }}"
                        class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all"
                        placeholder="VD: Huracán EVO">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Thương Hiệu *</label>
                    <select name="category_id" required class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none">
                        <option value="">-- Chọn hãng --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Năm *</label>
                    <input name="year" type="number" min="1990" max="2030" value="{{ old('year', $product->year ?? date('Y')) }}" required
                        class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Giá (VND) *</label>
                    <input name="price" type="number" min="0" value="{{ old('price', $product->price ?? '') }}" required
                        class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all"
                        placeholder="VD: 15000000000">
                </div>
            </div>

            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">URL Hình Ảnh</label>
                <input name="image" value="{{ old('image', $product->image ?? '') }}"
                    class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all"
                    placeholder="https://...">
                @if(isset($product) && $product->image)
                    <img src="{{ $product->image }}" class="mt-3 h-24 rounded-lg object-cover" onerror="this.remove()">
                @endif
            </div>

            <div>
                <label class="block text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-2">Mô Tả</label>
                <textarea name="description" rows="4"
                    class="w-full bg-black/40 border border-border rounded-lg px-4 py-3 text-white text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all resize-none"
                    placeholder="Mô tả ngắn về mẫu xe...">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 rounded bg-black/40 border-border text-primary focus:ring-primary">
                <span class="text-sm text-gray-300 font-body">Đánh dấu là <span class="text-yellow-400 font-bold">Xe Nổi Bật</span> (hiển thị trên trang chủ)</span>
            </label>
        </div>

        @if($errors->any())
        <div class="bg-red-900/30 border border-red-700/50 text-red-400 p-4 rounded-lg text-sm">
            <ul class="space-y-1">@foreach($errors->all() as $err)<li>• {{ $err }}</li>@endforeach</ul>
        </div>
        @endif

        <div class="flex gap-4">
            <button type="submit" class="bg-primary hover:bg-primary/80 text-white px-8 py-3 rounded-lg text-sm font-bold uppercase tracking-widest transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                {{ isset($product) ? 'Lưu Thay Đổi' : 'Thêm Xe' }}
            </button>
            <a href="{{ route('admin.products') }}" class="bg-border hover:bg-gray-700 text-gray-300 px-8 py-3 rounded-lg text-sm font-bold uppercase tracking-widest transition-colors">Hủy</a>
        </div>
    </form>
</div>
@endsection
