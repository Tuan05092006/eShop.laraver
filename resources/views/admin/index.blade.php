@extends('admin.layout')
@section('page-title', 'Tổng Quan')
@section('page-subtitle', 'Thống kê hệ thống VELOX AUTO')

@section('admin-content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-surface-card border border-border rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-400 text-xs uppercase tracking-widest font-bold">Sản Phẩm</span>
            <div class="w-10 h-10 bg-blue-900/40 rounded-lg flex items-center justify-center">
                <span class="material-symbols-outlined text-primary-light text-lg">directions_car</span>
            </div>
        </div>
        <p class="text-4xl font-headline font-black text-white">{{ $total_products }}</p>
        <p class="text-gray-500 text-xs mt-2">Mẫu xe trong kho</p>
    </div>
    <div class="bg-surface-card border border-border rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-400 text-xs uppercase tracking-widest font-bold">Đơn Hàng</span>
            <div class="w-10 h-10 bg-purple-900/40 rounded-lg flex items-center justify-center">
                <span class="material-symbols-outlined text-purple-400 text-lg">receipt_long</span>
            </div>
        </div>
        <p class="text-4xl font-headline font-black text-white">{{ $total_orders }}</p>
        <p class="text-gray-500 text-xs mt-2">Tổng đơn hàng</p>
    </div>
    <div class="bg-surface-card border border-border rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-400 text-xs uppercase tracking-widest font-bold">Người Dùng</span>
            <div class="w-10 h-10 bg-green-900/40 rounded-lg flex items-center justify-center">
                <span class="material-symbols-outlined text-green-400 text-lg">group</span>
            </div>
        </div>
        <p class="text-4xl font-headline font-black text-white">{{ $total_users }}</p>
        <p class="text-gray-500 text-xs mt-2">Tài khoản đã đăng ký</p>
    </div>
    <div class="bg-surface-card border border-border rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-400 text-xs uppercase tracking-widest font-bold">Doanh Thu</span>
            <div class="w-10 h-10 bg-yellow-900/40 rounded-lg flex items-center justify-center">
                <span class="material-symbols-outlined text-yellow-400 text-lg">paid</span>
            </div>
        </div>
        <p class="text-2xl font-headline font-black text-white">{{ number_format($total_revenue) }}</p>
        <p class="text-gray-500 text-xs mt-2">VND tổng doanh thu</p>
    </div>
</div>

<!-- Recent Orders -->
<div class="bg-surface-card border border-border rounded-xl p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="font-headline font-bold text-lg uppercase tracking-tight">Đơn Hàng Gần Đây</h2>
        <a href="{{ route('admin.orders') }}" class="text-xs text-primary-light hover:underline font-bold uppercase tracking-widest">Xem tất cả →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border">
                    <th class="pb-4 text-left font-bold">Mã ĐH</th>
                    <th class="pb-4 text-left font-bold">Khách Hàng</th>
                    <th class="pb-4 text-left font-bold">Tổng Tiền</th>
                    <th class="pb-4 text-left font-bold">Trạng Thái</th>
                    <th class="pb-4 text-left font-bold">Ngày</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($recent_orders as $order)
                <tr class="hover:bg-white/2">
                    <td class="py-4 font-headline font-bold text-primary-light">#{{ $order->id }}</td>
                    <td class="py-4 text-gray-300">{{ $order->user?->name ?? 'Khách' }}</td>
                <td class="py-4 font-bold text-white">{{ number_format($order->orderDetails->sum(fn($d) => $d->price * $d->quantity)) }} VND</td>
                    <td class="py-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest
                            {{ ($order->status ?? 'pending') === 'completed' ? 'bg-green-900/40 text-green-400' :
                               (($order->status ?? 'pending') === 'cancelled' ? 'bg-red-900/40 text-red-400' : 'bg-yellow-900/40 text-yellow-400') }}">
                            {{ $order->status ?? 'Chờ xử lý' }}
                        </span>
                    </td>
                    <td class="py-4 text-gray-500 text-xs">{{ $order->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="py-8 text-center text-gray-500">Chưa có đơn hàng nào.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
