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
            <a href="{{ route('dashboard') }}"
               style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem; border-radius:0.75rem;
                      font-size:0.9rem; font-weight:{{ $active === 'dashboard' ? '600' : '500' }};
                      background:{{ $active === 'dashboard' ? 'rgba(123,97,255,0.1)' : 'transparent' }};
                      color:{{ $active === 'dashboard' ? '#7b61ff' : '#6B7280' }};"
               onmouseover="if('{{ $active }}' !== 'dashboard') this.style.background='#F3F4F6'"
               onmouseout="if('{{ $active }}' !== 'dashboard') this.style.background='transparent'">
                <i data-lucide="layout-dashboard" style="width:18px;height:18px;flex-shrink:0;"></i> Dashboard
            </a>
            <a href="{{ route('materi') }}"
               style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem; border-radius:0.75rem;
                      font-size:0.9rem; font-weight:{{ $active === 'materi' ? '600' : '500' }};
                      background:{{ $active === 'materi' ? 'rgba(123,97,255,0.1)' : 'transparent' }};
                      color:{{ $active === 'materi' ? '#7b61ff' : '#6B7280' }};"
               onmouseover="if('{{ $active }}' !== 'materi') this.style.background='#F3F4F6'"
               onmouseout="if('{{ $active }}' !== 'materi') this.style.background='transparent'">
                <i data-lucide="book-open" style="width:18px;height:18px;flex-shrink:0;"></i> Materi
            </a>
            @foreach([['file-question','Quiz'],['play-square','Simulasi'],['bar-chart-2','Hasil'],['star','Rekomendasi'],['shield-check','Password Checker'],['user-circle','Profil']] as $nav)
            <a href="#"
               style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                      border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280;"
               onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
                <i data-lucide="{{ $nav[0] }}" style="width:18px;height:18px;flex-shrink:0;"></i> {{ $nav[1] }}
            </a>
            @endforeach
        </nav>
    </div>
    <div style="padding:1rem 0.75rem; border-top:1px solid #E5E7EB; display:flex; flex-direction:column; gap:4px;">
        <a href="#"
           style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                  border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280;"
           onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
            <i data-lucide="settings" style="width:18px;height:18px;flex-shrink:0;"></i> Settings
        </a>
        <a href="{{ route('logout') }}"
           style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                  border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#EF4444;"
           onmouseover="this.style.background='#FEE2E2'" onmouseout="this.style.background='transparent'">
            <i data-lucide="log-out" style="width:18px;height:18px;flex-shrink:0;"></i> Logout
        </a>
    </div>
</aside>
