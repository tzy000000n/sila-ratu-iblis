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
                    ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'layout-dashboard'],
                    ['route' => 'admin.materi', 'label' => 'Materi', 'icon' => 'book-open'],
                    ['route' => 'admin.quiz', 'label' => 'Quiz', 'icon' => 'file-question'],
                    ['route' => 'admin.simulasi', 'label' => 'Simulasi', 'icon' => 'play-square'],
                    ['route' => 'admin.pengguna', 'label' => 'Pengguna', 'icon' => 'users'],
                    ['route' => 'admin.pesan', 'label' => 'Pesan Masuk', 'icon' => 'mail'],
                    ['route' => 'admin.analytics', 'label' => 'Analytics', 'icon' => 'bar-chart-2'],
                    ['route' => 'admin.badge', 'label' => 'Badge & XP', 'icon' => 'award'],
                    ['route' => 'admin.notifikasi', 'label' => 'Notifikasi', 'icon' => 'bell'],
                    ['route' => 'admin.settings', 'label' => 'Settings', 'icon' => 'settings'],
                ];
            @endphp

            <div style="padding: 0 0.85rem 0.5rem; margin-bottom: 0.5rem; border-bottom: 1px solid #E5E7EB;">
                <p style="font-size:0.75rem; font-weight:700; color:#9CA3AF; text-transform: uppercase;">Admin Panel</p>
            </div>

            @foreach($navItems as $item)
                @php
                    $isRoute = Route::has($item['route']);
                    $href = $isRoute ? route($item['route']) : '#';
                    // We extract the route name part after admin. for active checking, or just match exactly
                    $isActive = $active === explode('.', $item['route'])[1];
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
        <a href="{{ route('dashboard') }}"
           style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                  border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280; text-decoration:none;"
           onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
            <i data-lucide="arrow-left" style="width:18px;height:18px;flex-shrink:0;"></i> Mode User
        </a>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit"
               style="width:100%; display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                      border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#EF4444; background:none; border:none; cursor:pointer;"
               onmouseover="this.style.background='#FEE2E2'" onmouseout="this.style.background='transparent'">
                <i data-lucide="log-out" style="width:18px;height:18px;flex-shrink:0;"></i> Keluar
            </button>
        </form>
    </div>
</aside>
