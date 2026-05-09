@extends('layouts.store')

@section('content')
<main class="pt-32 pb-20 px-4 md:px-8 max-w-screen-xl mx-auto">
    <!-- Profile Header -->
    <section class="mb-12">
        <h1 class="text-5xl font-headline font-black tracking-tighter text-on-background uppercase mb-2">Hồ sơ cá nhân</h1>
        <p class="text-on-surface-variant font-body uppercase text-xs tracking-[0.2em]">Quản lý thông tin tài khoản và bảo mật</p>
    </section>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Left Column: Forms -->
        <div class="lg:col-span-8 space-y-12">
            
            <!-- Update Profile Info -->
            <div class="bg-surface-container rounded-lg p-8 border border-outline-variant/10">
                <h2 class="text-2xl font-headline font-bold text-on-background uppercase mb-2">Thông tin hồ sơ</h2>
                <p class="text-on-surface-variant font-body text-sm mb-8">Cập nhật thông tin tài khoản và địa chỉ email của bạn.</p>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label class="block text-xs font-headline tracking-widest text-primary uppercase mb-2">Tên hiển thị</label>
                        <input name="name" value="{{ old('name', $user->name) }}" class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary outline-none py-3 px-4 rounded text-on-surface transition-all duration-300 font-medium" type="text" required autofocus autocomplete="name"/>
                        @error('name') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-headline tracking-widest text-primary uppercase mb-2">Địa chỉ Email</label>
                        <input name="email" value="{{ old('email', $user->email) }}" class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary outline-none py-3 px-4 rounded text-on-surface transition-all duration-300 font-medium" type="email" required autocomplete="username"/>
                        @error('email') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" class="kinetic-gradient text-on-primary font-bold py-3 px-8 rounded text-sm tracking-widest uppercase hover:brightness-110 transition-all shadow-lg shadow-primary-container/20">Lưu thay đổi</button>
                        
                        @if (session('status') === 'profile-updated')
                            <p class="text-sm text-primary font-bold animate-fade-in">Đã lưu thành công.</p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Update Password -->
            <div class="bg-surface-container rounded-lg p-8 border border-outline-variant/10">
                <h2 class="text-2xl font-headline font-bold text-on-background uppercase mb-2">Cập nhật mật khẩu</h2>
                <p class="text-on-surface-variant font-body text-sm mb-8">Đảm bảo tài khoản của bạn sử dụng mật khẩu dài và ngẫu nhiên để giữ an toàn.</p>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <label class="block text-xs font-headline tracking-widest text-primary uppercase mb-2">Mật khẩu hiện tại</label>
                        <input name="current_password" class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary outline-none py-3 px-4 rounded text-on-surface transition-all duration-300 font-medium" type="password" autocomplete="current-password"/>
                        @error('current_password', 'updatePassword') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-headline tracking-widest text-primary uppercase mb-2">Mật khẩu mới</label>
                        <input name="password" class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary outline-none py-3 px-4 rounded text-on-surface transition-all duration-300 font-medium" type="password" autocomplete="new-password"/>
                        @error('password', 'updatePassword') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-headline tracking-widest text-primary uppercase mb-2">Xác nhận mật khẩu</label>
                        <input name="password_confirmation" class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary outline-none py-3 px-4 rounded text-on-surface transition-all duration-300 font-medium" type="password" autocomplete="new-password"/>
                        @error('password_confirmation', 'updatePassword') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" class="kinetic-gradient text-on-primary font-bold py-3 px-8 rounded text-sm tracking-widest uppercase hover:brightness-110 transition-all shadow-lg shadow-primary-container/20">Lưu mật khẩu</button>
                        
                        @if (session('status') === 'password-updated')
                            <p class="text-sm text-primary font-bold animate-fade-in">Đã lưu thành công.</p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Delete Account -->
            <div class="bg-surface-container rounded-lg p-8 border border-error/20">
                <h2 class="text-2xl font-headline font-bold text-error uppercase mb-2">Xóa tài khoản</h2>
                <p class="text-on-surface-variant font-body text-sm mb-8">Khi tài khoản của bạn bị xóa, tất cả tài nguyên và dữ liệu sẽ bị xóa vĩnh viễn.</p>

                <button onclick="document.getElementById('delete-modal').classList.remove('hidden')" class="bg-error/10 text-error border border-error/30 font-bold py-3 px-8 rounded text-sm tracking-widest uppercase hover:bg-error/20 transition-all">
                    Xóa tài khoản
                </button>
            </div>
            
        </div>
        
        <!-- Right Column: Quick Links -->
        <div class="lg:col-span-4">
            <div class="bg-surface-container-high rounded-lg p-8 sticky top-32">
                <h2 class="text-xl font-headline font-bold text-on-background uppercase mb-6">Thao tác nhanh</h2>
                <div class="flex flex-col gap-4">
                    <a href="{{ route('dashboard') }}" class="kinetic-gradient text-on-primary font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:brightness-110 transition-all shadow-lg shadow-primary-container/20">BÀN ĐIỀU KHIỂN</a>
                    <a href="/" class="bg-surface-container border border-outline-variant/20 text-on-surface font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:bg-surface-container-highest transition-all">TIẾP TỤC MUA XE</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-error font-bold py-4 px-6 rounded-lg text-center text-xs tracking-widest uppercase hover:bg-error/10 transition-all border border-error/10">ĐĂNG XUẤT</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Delete Account Modal -->
<div id="delete-modal" class="fixed inset-0 z-[200] hidden">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm transition-opacity" onclick="document.getElementById('delete-modal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-lg bg-surface-container p-8 rounded-lg shadow-2xl border border-outline-variant/20">
        <h2 class="text-2xl font-headline font-bold text-on-background uppercase mb-4">Bạn có chắc chắn muốn xóa?</h2>
        <p class="text-on-surface-variant text-sm mb-6">Hành động này không thể hoàn tác. Vui lòng nhập mật khẩu của bạn để xác nhận.</p>
        
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            
            <input name="password" type="password" class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-error outline-none py-3 px-4 rounded text-on-surface transition-all duration-300 font-medium mb-2" placeholder="Nhập mật khẩu..." required/>
            @error('password', 'userDeletion') <span class="text-error text-xs block mb-4">{{ $message }}</span> @enderror
            
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="document.getElementById('delete-modal').classList.add('hidden')" class="px-6 py-3 text-on-surface font-bold uppercase text-xs tracking-widest hover:text-primary transition-colors">Hủy</button>
                <button type="submit" class="bg-error text-white px-6 py-3 rounded font-bold uppercase text-xs tracking-widest hover:bg-error/90 transition-colors">Xác nhận xóa</button>
            </div>
        </form>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('delete-modal').classList.remove('hidden');
    });
</script>
@endif

@endsection
