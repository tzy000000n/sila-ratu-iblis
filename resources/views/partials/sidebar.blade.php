<aside style="width:260px; flex-shrink:0; position:fixed; top:0; left:0; height:100vh;
              background:rgba(255,255,255,0.92); backdrop-filter:blur(12px);
              border-right:1px solid #E5E7EB; display:flex; flex-direction:column;
              justify-content:space-between; z-index:30; overflow-y:auto;">
    <div>
        <div style="padding:1.5rem 1.5rem 1rem;">
            <p style="font-size:1.35rem; font-weight:800; color:#7b61ff; line-height:1;">Nexyra Learn</p>
            <p style="font-size:0.65rem; font-weight:700; color:#9CA3AF; letter-spacing:0.1em; margin-top:3px;">CYBERSECURITY LAB</p>
        </div>
        <nav style="padding:0.5rem 0.75rem; display:flex; flex-direction:column; gap:4px;">
            @php
                $navItems = [
                    ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'layout-dashboard'],
                    ['route' => 'materi', 'label' => 'Materi', 'icon' => 'book-open'],
                    ['route' => 'quiz', 'label' => 'Quiz', 'icon' => 'file-question'],
                    ['route' => 'simulasi', 'label' => 'Simulasi', 'icon' => 'play-square'],
                    ['route' => 'hasil', 'label' => 'Hasil', 'icon' => 'bar-chart-2'],
                    ['route' => 'rekomendasi', 'label' => 'Rekomendasi', 'icon' => 'sparkles'],
                    ['route' => 'password-checker', 'label' => 'Password Checker', 'icon' => 'shield-check'],
                    ['route' => 'profile', 'label' => 'Profil', 'icon' => 'user-circle'],
                ];



                if (auth()->check() && auth()->user()->role === 'admin') {
                    array_unshift($navItems, ['route' => 'admin.dashboard', 'label' => 'Admin Panel', 'icon' => 'shield']);
                }
            @endphp

            @foreach($navItems as $item)
                @php
                    $isRoute = $item['route'] !== '#';
                    $href = $isRoute ? route($item['route']) : '#';
                    $isActive = $active === $item['route'];
                @endphp
                <a href="{{ $href }}"
                   style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem; border-radius:0.75rem;
                          font-size:0.9rem; font-weight:{{ $isActive ? '600' : '500' }};
                          background:{{ $isActive ? 'rgba(123,97,255,0.1)' : 'transparent' }};
                          color:{{ $isActive ? '#7b61ff' : '#6B7280' }}; transition: all 0.2s ease;"
                   @if(!$isActive)
                       onmouseover="this.style.background='#F3F4F6'"
                       onmouseout="this.style.background='transparent'"
                   @endif>
                    <i data-lucide="{{ $item['icon'] }}" style="width:18px;height:18px;flex-shrink:0;"></i> {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
    </div>
    <div style="padding:1rem 0.75rem; border-top:1px solid #E5E7EB; display:flex; flex-direction:column; gap:4px;">
        <a href="{{ route('settings') }}" class="nav-item {{ ($active ?? '') == 'settings' ? 'active' : '' }}" style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem; border-radius:0.75rem; text-decoration:none; color:#6B7280;">
            <i data-lucide="settings" style="width: 20px; height: 20px; flex-shrink: 0;"></i>
            <span style="font-size: 0.95rem; font-weight: 600;">Pengaturan</span>
        </a>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
            @csrf
            <button type="submit" class="nav-item" style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem; border-radius:0.75rem; width: 100%; text-align: left; background: none; border: none; cursor: pointer; color: #ef4444; margin-top: 0.5rem; transition: all 0.2s;">
                <i data-lucide="log-out" style="width: 20px; height: 20px; flex-shrink: 0;"></i>
                <span style="font-size: 0.95rem; font-weight: 700;">Keluar</span>
            </button>
        </form>
    </div>
</aside>
