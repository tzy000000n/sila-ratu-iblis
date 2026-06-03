@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @if(auth()->user()->role === 'admin')
        @include('partials.sidebar-admin', ['active' => 'settings'])
    @else
        <aside class="sidebar-nav" style="width:260px; flex-shrink:0; position:fixed; top:0; left:0; height:100vh;
                      background:rgba(255,255,255,0.92); backdrop-filter:blur(12px);
                      border-right:1px solid #E5E7EB; display:flex; flex-direction:column;
                      justify-content:space-between; z-index:30; overflow-y:auto;">
            @include('partials.sidebar', ['active' => 'settings'])
        </aside>
    @endif

    {{-- Main Content --}}
    <main class="main-content" style="flex:1; margin-left:260px; display:flex; flex-direction:column; min-width: 0;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari pengaturan...', 'showSearch' => false])

        <div style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2rem; max-width: 900px; width: 100%; margin: 0 auto;">
            
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <h1 style="font-size: 2rem; font-weight: 800; color: #111827; margin: 0; letter-spacing: -0.02em;">Pengaturan Akun</h1>
                <p style="font-size: 0.95rem; color: #6B7280; margin: 0;">Kelola preferensi akun, kata sandi, dan notifikasi Anda.</p>
            </div>

            {{-- Settings Container --}}
            <div style="background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.015);">
                
                {{-- Preferences --}}
                <div style="padding: 2rem; border-bottom: 1px solid #E5E7EB;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="settings" style="width: 20px; height: 20px; color: #7B61FF;"></i> Preferensi Umum
                    </h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="font-size: 0.95rem; font-weight: 700; color: #374151; margin: 0 0 0.25rem 0;">Tema Gelap (Dark Mode)</h4>
                                <p style="font-size: 0.85rem; color: #6B7280; margin: 0;">Ubah tampilan antar muka menjadi tema gelap.</p>
                            </div>
                            <label style="position: relative; display: inline-block; width: 50px; height: 28px;">
                                <input type="checkbox" style="opacity: 0; width: 0; height: 0;" id="dark-mode-toggle">
                                <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #E5E7EB; transition: .4s; border-radius: 34px;" id="slider-dark"></span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Security --}}
                <div style="padding: 2rem; border-bottom: 1px solid #E5E7EB;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="shield" style="width: 20px; height: 20px; color: #10B981;"></i> Keamanan
                    </h3>
                    
                    <form style="display: flex; flex-direction: column; gap: 1.25rem; max-width: 500px;">
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 700; color: #4B5563; display: block; margin-bottom: 0.5rem;">Password Saat Ini</label>
                            <input type="password" placeholder="Masukkan password saat ini" style="width: 100%; border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.75rem 1rem; outline: none; font-family: inherit;">
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 700; color: #4B5563; display: block; margin-bottom: 0.5rem;">Password Baru</label>
                            <input type="password" placeholder="Masukkan password baru" style="width: 100%; border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.75rem 1rem; outline: none; font-family: inherit;">
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 700; color: #4B5563; display: block; margin-bottom: 0.5rem;">Konfirmasi Password Baru</label>
                            <input type="password" placeholder="Konfirmasi password baru" style="width: 100%; border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.75rem 1rem; outline: none; font-family: inherit;">
                        </div>
                        <button type="button" style="background: #10B981; color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 0.75rem; font-weight: 700; cursor: pointer; width: fit-content; margin-top: 0.5rem; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.25);">
                            Perbarui Password
                        </button>
                    </form>
                </div>

                {{-- Notifications --}}
                <div style="padding: 2rem;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="bell" style="width: 20px; height: 20px; color: #F59E0B;"></i> Notifikasi
                    </h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="font-size: 0.95rem; font-weight: 700; color: #374151; margin: 0 0 0.25rem 0;">Pembaruan Materi</h4>
                                <p style="font-size: 0.85rem; color: #6B7280; margin: 0;">Terima email jika ada materi atau quiz baru.</p>
                            </div>
                            <label style="position: relative; display: inline-block; width: 50px; height: 28px;">
                                <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                                <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #7B61FF; transition: .4s; border-radius: 34px;"></span>
                            </label>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="font-size: 0.95rem; font-weight: 700; color: #374151; margin: 0 0 0.25rem 0;">Pengingat Streak</h4>
                                <p style="font-size: 0.85rem; color: #6B7280; margin: 0;">Dapatkan pengingat agar learning streak-mu tidak putus.</p>
                            </div>
                            <label style="position: relative; display: inline-block; width: 50px; height: 28px;">
                                <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                                <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #7B61FF; transition: .4s; border-radius: 34px;"></span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<style>
/* Custom Slider Style */
label span:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}
input:checked + span {
    background-color: #7B61FF !important;
}
input:checked + span:before {
    transform: translateX(22px);
}
#slider-dark:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const sliderDark = document.getElementById('slider-dark');
    
    // Set initial state
    if (document.documentElement.classList.contains('dark-theme')) {
        darkModeToggle.checked = true;
        sliderDark.style.backgroundColor = '#7B61FF';
    }

    darkModeToggle.addEventListener('change', function() {
        if(this.checked) {
            sliderDark.style.backgroundColor = '#7B61FF';
            document.documentElement.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark');
        } else {
            sliderDark.style.backgroundColor = '#E5E7EB';
            document.documentElement.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light');
        }
    });

    // Mobile sidebar handling logic if needed
    const mobileToggle = document.getElementById('mobile-drawer-toggle');
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            const sidebar = document.querySelector('aside.sidebar-nav');
            if(sidebar) sidebar.classList.toggle('show');
        });
    }
});
</script>
@endsection
