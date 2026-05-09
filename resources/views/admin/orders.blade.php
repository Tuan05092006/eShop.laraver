@extends('admin.layout')
@section('page-title', 'Đơn Hàng')
@section('page-subtitle', 'Quản lý tất cả đơn hàng')

@section('admin-content')
<div class="bg-surface-card border border-border rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border bg-black/20">
                <th class="px-6 py-4 text-left font-bold">Mã ĐH</th>
                <th class="px-6 py-4 text-left font-bold">Khách Hàng</th>
                <th class="px-6 py-4 text-left font-bold">Sản Phẩm</th>
                <th class="px-6 py-4 text-left font-bold">Tổng Tiền</th>
                <th class="px-6 py-4 text-left font-bold">Trạng Thái</th>
                <th class="px-6 py-4 text-left font-bold">Ngày</th>
                <th class="px-6 py-4 text-left font-bold">Cập Nhật</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            @forelse($orders as $order)
            <tr class="hover:bg-white/5 transition-colors">
                <td class="px-6 py-4 font-headline font-bold text-primary-light">#{{ $order->id }}</td>
                <td class="px-6 py-4">
                    <p class="text-white font-bold text-xs">{{ $order->user?->name ?? 'Khách' }}</p>
                    <p class="text-gray-500 text-[10px]">{{ $order->user?->email ?? '' }}</p>
                </td>
                <td class="px-6 py-4">
                    <div class="space-y-1">
                        @foreach($order->orderDetails as $detail)
                            <p class="text-gray-300 text-xs">{{ $detail->product?->name ?? 'Xe' }} × {{ $detail->quantity }}</p>
                        @endforeach
                    </div>
                </td>
                <td class="px-6 py-4 font-bold text-white text-xs">{{ number_format($order->orderDetails->sum(fn($d) => $d->price * $d->quantity)) }} VND</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest
                        {{ ($order->status ?? 'pending') === 'completed' ? 'bg-green-900/40 text-green-400' :
                           (($order->status ?? 'pending') === 'cancelled' ? 'bg-red-900/40 text-red-400' : 'bg-yellow-900/40 text-yellow-400') }}">
                        {{ $order->status ?? 'Chờ xử lý' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500 text-xs">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
                        @csrf @method('PATCH')
                        <select name="status" onchange="this.form.submit()" class="bg-black/60 border border-border text-white text-xs rounded px-2 py-1 outline-none focus:ring-1 focus:ring-primary">
                            <option value="pending" {{ ($order->status ?? 'pending') === 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="processing" {{ ($order->status ?? '') === 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="completed" {{ ($order->status ?? '') === 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="cancelled" {{ ($order->status ?? '') === 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-6 py-12 text-center text-gray-500">Chưa có đơn hàng nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-border">
        {{ $orders->links() }}
    </div>
</div>
@endsection
