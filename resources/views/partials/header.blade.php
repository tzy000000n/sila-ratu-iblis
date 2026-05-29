<header style="position:sticky; top:0; z-index:20; background:#fff;
               border-bottom:1px solid #E5E7EB; padding:1rem 1.75rem;
               display:flex; align-items:center; justify-content:space-between;">
    <div style="display:flex; align-items:center; gap:8px; background:#F9FAFB;
                border:1px solid #E5E7EB; border-radius:0.75rem; padding:0.5rem 0.85rem; width:380px;">
        <i data-lucide="search" style="width:16px;height:16px;color:#9CA3AF;flex-shrink:0;"></i>
        <input type="text" placeholder="{{ $placeholder ?? 'Cari materi atau simulasi...' }}"
               style="border:none; background:transparent; outline:none; width:100%;
                      font-family:inherit; font-size:0.875rem; color:#374151;">
    </div>
    <div style="display:flex; align-items:center; gap:1.5rem;">
        <div style="display:flex; gap:1rem;">
            <button style="color:#6B7280; background:none; border:none; cursor:pointer;">
                <i data-lucide="bell" style="width:20px;height:20px;"></i>
            </button>
            <button style="color:#6B7280; background:none; border:none; cursor:pointer;">
                <i data-lucide="help-circle" style="width:20px;height:20px;"></i>
            </button>
        </div>
        <div style="display:flex; align-items:center; gap:12px; padding-left:1.5rem; border-left:1px solid #E5E7EB;">
            <div style="text-align:right;">
                <p style="font-size:0.875rem; font-weight:700; color:#111827;">{{ session('user') }}</p>
                <p style="font-size:0.65rem; font-weight:700; color:#9CA3AF; letter-spacing:0.08em;">STUDENT TIER 2</p>
            </div>
            <div style="width:40px; height:40px; border-radius:0.75rem; background:#8B5CF6;
                        display:flex; align-items:center; justify-content:center;">
                <i data-lucide="user" style="width:22px;height:22px;color:#fff;"></i>
            </div>
        </div>
    </div>
</header>
