@extends('admin.layout')
@section('page-title', 'Tổng Quan')
@section('page-subtitle', 'Thống kê & Phân tích dữ liệu hệ thống VELOX AUTO')

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

<!-- ═══════════════════════════════════════════════════════ -->
<!-- PHÂN TÍCH ĐỘ TUỔI KHÁCH HÀNG                          -->
<!-- ═══════════════════════════════════════════════════════ -->
<div class="mb-10">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-1 h-8 bg-primary rounded-full"></div>
        <h2 class="font-headline font-black text-xl uppercase tracking-tight">Phân Tích Độ Tuổi Khách Hàng</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Age Stats Cards -->
        <div class="bg-surface-card border border-border rounded-xl p-6 flex flex-col items-center justify-center">
            <span class="material-symbols-outlined text-4xl text-primary-light mb-3">cake</span>
            <p class="text-3xl font-headline font-black text-white">{{ $avgAge }}</p>
            <p class="text-gray-500 text-xs mt-1 uppercase tracking-widest">Tuổi trung bình</p>
        </div>
        <div class="bg-surface-card border border-border rounded-xl p-6 flex flex-col items-center justify-center">
            <span class="material-symbols-outlined text-4xl text-green-400 mb-3">person</span>
            <p class="text-3xl font-headline font-black text-white">{{ $usersWithAge->count() }}</p>
            <p class="text-gray-500 text-xs mt-1 uppercase tracking-widest">Có dữ liệu tuổi</p>
        </div>

        <!-- Pie Chart -->
        <div class="bg-surface-card border border-border rounded-xl p-6">
            <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-4 text-center">Phân Bổ Nhóm Tuổi</h3>
            <div class="w-full max-w-[220px] mx-auto">
                <canvas id="ageChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Age Distribution Bar -->
    <div class="bg-surface-card border border-border rounded-xl p-6 mb-6">
        <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-4">Phân Bổ Theo Nhóm Tuổi</h3>
        <div class="space-y-3">
            @php $maxGroup = max(array_values($ageGroups)) ?: 1; @endphp
            @foreach($ageGroups as $group => $count)
            <div class="flex items-center gap-4">
                <span class="text-sm font-headline font-bold text-white w-16">{{ $group }}</span>
                <div class="flex-1 bg-border rounded-full h-6 overflow-hidden">
                    <div class="h-full rounded-full flex items-center px-3 text-[10px] font-bold transition-all duration-700"
                         style="width: {{ $maxGroup > 0 ? ($count / $maxGroup * 100) : 0 }}%; background: linear-gradient(90deg, #2962ff, #b6c4ff);">
                        {{ $count }}
                    </div>
                </div>
                <span class="text-xs text-gray-500 w-12 text-right">{{ $usersWithAge->count() > 0 ? round($count / $usersWithAge->count() * 100) : 0 }}%</span>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-surface-card border border-border rounded-xl p-6">
        <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-4">Bảng Thống Kê Tuổi Khách Hàng</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border">
                        <th class="pb-4 text-left font-bold">ID</th>
                        <th class="pb-4 text-left font-bold">Họ Tên</th>
                        <th class="pb-4 text-left font-bold">Email</th>
                        <th class="pb-4 text-left font-bold">Ngày Sinh</th>
                        <th class="pb-4 text-center font-bold">Tuổi</th>
                        <th class="pb-4 text-left font-bold">Nhóm Tuổi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($usersWithAge as $u)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-3 font-headline font-bold text-primary-light">#{{ $u['id'] }}</td>
                        <td class="py-3 text-white font-semibold">{{ $u['name'] }}</td>
                        <td class="py-3 text-gray-400">{{ $u['email'] }}</td>
                        <td class="py-3 text-gray-300">{{ $u['date_of_birth'] }}</td>
                        <td class="py-3 text-center">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                                {{ $u['age'] < 30 ? 'bg-green-900/40 text-green-400' :
                                   ($u['age'] < 45 ? 'bg-blue-900/40 text-blue-400' :
                                   'bg-yellow-900/40 text-yellow-400') }}">
                                {{ $u['age'] }} tuổi
                            </span>
                        </td>
                        <td class="py-3">
                            @php
                                $age = $u['age'];
                                $group = $age <= 25 ? '18-25' : ($age <= 35 ? '26-35' : ($age <= 45 ? '36-45' : ($age <= 55 ? '46-55' : '55+')));
                            @endphp
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ $group }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="py-8 text-center text-gray-500">Chưa có khách hàng nào có dữ liệu ngày sinh. Hãy đăng ký tài khoản mới để xem dữ liệu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════════════════ -->
<!-- PHÂN TÍCH SẢN PHẨM BÁN CHẠY / ÍT NHẤT                -->
<!-- ═══════════════════════════════════════════════════════ -->
<div class="mb-10">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-1 h-8 bg-purple-500 rounded-full"></div>
        <h2 class="font-headline font-black text-xl uppercase tracking-tight">Phân Tích Sản Phẩm Bán Chạy</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Top Products Bar Chart -->
        <div class="bg-surface-card border border-border rounded-xl p-6">
            <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-4">Top 10 Sản Phẩm Bán Chạy Nhất</h3>
            <div class="h-80">
                <canvas id="topProductsChart"></canvas>
            </div>
        </div>

        <!-- Revenue by Brand Chart -->
        <div class="bg-surface-card border border-border rounded-xl p-6">
            <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-4">Doanh Thu Theo Thương Hiệu</h3>
            <div class="h-80">
                <canvas id="brandRevenueChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Top Products Table -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-surface-card border border-border rounded-xl p-6">
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-green-400">trending_up</span>
                <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold">Bán Chạy Nhất</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border">
                            <th class="pb-3 text-left font-bold">Hạng</th>
                            <th class="pb-3 text-left font-bold">Sản Phẩm</th>
                            <th class="pb-3 text-left font-bold">Thương Hiệu</th>
                            <th class="pb-3 text-right font-bold">SL Bán</th>
                            <th class="pb-3 text-right font-bold">Doanh Thu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse($topProducts as $index => $p)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="py-3">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full text-[10px] font-bold
                                    {{ $index == 0 ? 'bg-yellow-500/20 text-yellow-400' :
                                       ($index == 1 ? 'bg-gray-400/20 text-gray-300' :
                                       ($index == 2 ? 'bg-orange-500/20 text-orange-400' : 'bg-border text-gray-500')) }}">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td class="py-3 text-white font-semibold">{{ $p->product_name }}</td>
                            <td class="py-3 text-primary-light text-xs uppercase tracking-wider">{{ $p->brand_name }}</td>
                            <td class="py-3 text-right font-headline font-bold text-green-400">{{ $p->total_quantity }}</td>
                            <td class="py-3 text-right text-xs text-gray-400">{{ number_format($p->total_revenue) }} VND</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-gray-500">Chưa có dữ liệu bán hàng.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-surface-card border border-border rounded-xl p-6">
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-red-400">trending_down</span>
                <h3 class="text-xs text-gray-400 uppercase tracking-widest font-bold">Bán Ít Nhất</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-500 text-xs uppercase tracking-widest border-b border-border">
                            <th class="pb-3 text-left font-bold">Hạng</th>
                            <th class="pb-3 text-left font-bold">Sản Phẩm</th>
                            <th class="pb-3 text-left font-bold">Thương Hiệu</th>
                            <th class="pb-3 text-right font-bold">SL Bán</th>
                            <th class="pb-3 text-right font-bold">Doanh Thu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse($bottomProducts as $index => $p)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="py-3">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full text-[10px] font-bold bg-red-900/30 text-red-400">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td class="py-3 text-white font-semibold">{{ $p->product_name }}</td>
                            <td class="py-3 text-primary-light text-xs uppercase tracking-wider">{{ $p->brand_name }}</td>
                            <td class="py-3 text-right font-headline font-bold text-red-400">{{ $p->total_quantity }}</td>
                            <td class="py-3 text-right text-xs text-gray-400">{{ number_format($p->total_revenue) }} VND</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-gray-500">Chưa có dữ liệu bán hàng.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
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

<!-- ═══════════════════════════════════════════════════════ -->
<!-- CHART.JS SCRIPTS                                        -->
<!-- ═══════════════════════════════════════════════════════ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ── Age Pie Chart ──────────────────────────────
    const ageCtx = document.getElementById('ageChart');
    if (ageCtx) {
        new Chart(ageCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($ageGroups)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($ageGroups)) !!},
                    backgroundColor: [
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(167, 139, 250, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(248, 113, 113, 0.8)',
                    ],
                    borderColor: '#1e1e1e',
                    borderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#9ca3af',
                            font: { size: 10, family: 'Manrope', weight: 'bold' },
                            padding: 12,
                            usePointStyle: true,
                            pointStyleWidth: 8,
                        }
                    }
                },
                cutout: '55%',
            }
        });
    }

    // ── Top Products Bar Chart ──────────────────────
    const topCtx = document.getElementById('topProductsChart');
    if (topCtx) {
        const topData = @json($topProducts->values());
        new Chart(topCtx, {
            type: 'bar',
            data: {
                labels: topData.map(p => p.product_name.length > 15 ? p.product_name.substring(0, 15) + '...' : p.product_name),
                datasets: [{
                    label: 'Số lượng bán',
                    data: topData.map(p => p.total_quantity),
                    backgroundColor: topData.map((_, i) =>
                        i === 0 ? 'rgba(251, 191, 36, 0.8)' :
                        i === 1 ? 'rgba(156, 163, 175, 0.8)' :
                        i === 2 ? 'rgba(251, 146, 60, 0.8)' :
                        'rgba(96, 165, 250, 0.6)'
                    ),
                    borderColor: 'transparent',
                    borderRadius: 6,
                    borderSkipped: false,
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#6b7280', font: { size: 10, family: 'Manrope' } },
                    },
                    y: {
                        grid: { display: false },
                        ticks: { color: '#d1d5db', font: { size: 10, family: 'Space Grotesk', weight: 'bold' } },
                    },
                },
            }
        });
    }

    // ── Brand Revenue Chart ──────────────────────
    const brandCtx = document.getElementById('brandRevenueChart');
    if (brandCtx) {
        const brandData = @json($brandRevenue);
        const brandColors = [
            'rgba(41, 98, 255, 0.8)',
            'rgba(182, 196, 255, 0.8)',
            'rgba(167, 139, 250, 0.8)',
            'rgba(52, 211, 153, 0.8)',
            'rgba(251, 191, 36, 0.8)',
            'rgba(248, 113, 113, 0.8)',
            'rgba(96, 165, 250, 0.8)',
            'rgba(251, 146, 60, 0.8)',
            'rgba(236, 72, 153, 0.8)',
            'rgba(45, 212, 191, 0.8)',
        ];
        new Chart(brandCtx, {
            type: 'bar',
            data: {
                labels: brandData.map(b => b.brand_name),
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: brandData.map(b => b.total_revenue),
                    backgroundColor: brandData.map((_, i) => brandColors[i % brandColors.length]),
                    borderColor: 'transparent',
                    borderRadius: 6,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) {
                                return new Intl.NumberFormat('vi-VN').format(ctx.raw) + ' VND';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#d1d5db', font: { size: 9, family: 'Space Grotesk', weight: 'bold' }, maxRotation: 45 },
                    },
                    y: {
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: {
                            color: '#6b7280',
                            font: { size: 9, family: 'Manrope' },
                            callback: function(value) {
                                if (value >= 1e9) return (value / 1e9).toFixed(1) + ' tỷ';
                                if (value >= 1e6) return (value / 1e6).toFixed(0) + ' tr';
                                return value;
                            }
                        },
                    },
                },
            }
        });
    }
});
</script>
@endsection
