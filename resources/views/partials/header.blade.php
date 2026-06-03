<header style="position:sticky; top:0; z-index:20; background:#fff;
               border-bottom:1px solid #E5E7EB; padding:1rem 1.75rem;
               display:flex; align-items:center; justify-content:space-between;">
    <button id="mobile-drawer-toggle" type="button" style="display:none; background:none; border:none; font-size:1.5rem; margin-right:1rem;" aria-label="Toggle menu">☰</button>
    @if(isset($showSearch) && $showSearch)
    <div style="position:relative; width: 380px;" id="global-search-container">
        <form action="{{ route('global.search') }}" method="GET" style="display:flex; align-items:center; gap:8px; background:#F9FAFB;
                    border:1px solid #E5E7EB; border-radius:0.75rem; padding:0.5rem 0.85rem; width:100%; margin:0;">
            <i data-lucide="search" style="width:16px;height:16px;color:#9CA3AF;flex-shrink:0;"></i>
            <input type="text" name="q" id="global-search-input" placeholder="{{ str_replace('lab', 'quiz', $placeholder ?? 'Cari materi atau quiz...') }}"
                   style="border:none; background:transparent; outline:none; width:100%;
                          font-family:inherit; font-size:0.875rem; color:#374151;" autocomplete="off" value="{{ request('q') }}">
        </form>
        <div id="search-suggestions" style="display:none; position:absolute; top:calc(100% + 0.5rem); left:0; width:100%; background:white; border:1px solid #E5E7EB; border-radius:0.75rem; box-shadow:0 10px 25px rgba(0,0,0,0.08); overflow:hidden; z-index:50;">
            <!-- suggestions go here -->
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('global-search-input');
        const box = document.getElementById('search-suggestions');
        const container = document.getElementById('global-search-container');
        let timeout = null;

        if(input) {
            input.addEventListener('input', function() {
                clearTimeout(timeout);
                const q = this.value.trim();
                if(q.length < 2) {
                    box.style.display = 'none';
                    return;
                }
                
                timeout = setTimeout(() => {
                    fetch('/api/search?q=' + encodeURIComponent(q))
                        .then(res => res.json())
                        .then(data => {
                            box.innerHTML = '';
                            if(data.length === 0) {
                                box.innerHTML = '<div style="padding:1rem; text-align:center; color:#6B7280; font-size:0.85rem; font-weight:600;">Kata kunci tidak ditemukan</div>';
                            } else {
                                data.forEach(item => {
                                    const a = document.createElement('a');
                                    a.href = item.url;
                                    a.style = "display:flex; flex-direction:column; padding:0.75rem 1rem; border-bottom:1px solid #F3F4F6; text-decoration:none; color:inherit; transition: background 0.2s;";
                                    a.innerHTML = `<span style="font-size:0.85rem; font-weight:700; color:#111827; margin-bottom:2px;">${item.judul}</span>
                                                   <span style="font-size:0.7rem; color:${item.type === 'Materi' ? '#7b61ff' : '#F59E0B'}; font-weight:700; background:${item.type === 'Materi' ? 'rgba(123,97,255,0.1)' : '#FEF3C7'}; padding:0.15rem 0.5rem; border-radius:9999px; width:fit-content;">${item.type}</span>`;
                                    a.onmouseover = function() { this.style.backgroundColor = '#F9FAFB'; };
                                    a.onmouseout = function() { this.style.backgroundColor = 'transparent'; };
                                    box.appendChild(a);
                                });
                            }
                            box.style.display = 'block';
                        })
                        .catch(err => {
                            console.error(err);
                        });
                }, 400);
            });

            // Focus shows suggestions if it has value
            input.addEventListener('focus', function() {
                if(this.value.trim().length >= 2 && box.innerHTML.trim() !== '') {
                    box.style.display = 'block';
                }
            });

            // Hide on outside click
            document.addEventListener('click', function(e) {
                if(container && !container.contains(e.target)) {
                    box.style.display = 'none';
                }
            });
        }
    });
    </script>
    @else
    <div style="flex:1;"></div>
    @endif
    <div style="display:flex; align-items:center; gap:1.5rem;">
        <div style="display:flex; gap:1rem;">
            <a href="{{ route('notifications') }}" style="color:#6B7280; background:none; border:none; cursor:pointer; text-decoration:none;" title="Notifikasi">
                <i data-lucide="bell" style="width:20px;height:20px;"></i>
            </a>
            <a href="{{ route('help') }}" style="color:#6B7280; background:none; border:none; cursor:pointer; text-decoration:none;" title="Bantuan">
                <i data-lucide="help-circle" style="width:20px;height:20px;"></i>
            </a>
        </div>
        <a href="{{ route('profile') }}" style="display:flex; align-items:center; gap:12px; padding-left:1.5rem; border-left:1px solid #E5E7EB; text-decoration: none;">
            <div style="text-align:right;">
                <p style="font-size:0.875rem; font-weight:700; color:#111827;">{{ auth()->user()->name ?? 'User' }}</p>
                <p style="font-size:0.65rem; font-weight:700; color:#9CA3AF; letter-spacing:0.08em; text-transform: uppercase;">{{ auth()->user()->role ?? 'Siswa' }}</p>
            </div>
            <div style="width:40px; height:40px; border-radius:0.75rem; background:#8B5CF6;
                        display:flex; align-items:center; justify-content:center;">
                <i data-lucide="user" style="width:22px;height:22px;color:#fff;"></i>
            </div>
        </a>
    </div>
</header>
