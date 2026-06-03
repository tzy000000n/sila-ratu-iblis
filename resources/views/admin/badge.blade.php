@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'badge'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari badge...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title & Action --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Gamification Center</h1>
                    <p style="font-size: 0.95rem; color: #6B7280;">Kelola XP reward, badge, dan achievement pengguna.</p>
                </div>
                <button style="background:#7b61ff; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.75rem; font-weight:600; font-size:0.9rem; cursor:pointer; display:flex; align-items:center; gap:0.5rem; box-shadow:0 4px 12px rgba(123,97,255,0.25);" onclick="document.getElementById('modal-badge').style.display='flex'">
                    <i data-lucide="plus" style="width:18px; height:18px;"></i> Tambah Badge
                </button>
            </div>

            {{-- Konfigurasi XP --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.25rem;">Konfigurasi XP Reward Dasar</h3>
                <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:1rem;">
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Selesaikan Materi</label>
                        <div style="display:flex; align-items:center; border:1px solid #E5E7EB; border-radius:0.5rem; overflow:hidden;">
                            <input type="number" value="10" style="width:100%; padding:0.6rem; border:none; outline:none; font-family:inherit; font-size:0.9rem; text-align:right;">
                            <span style="background:#F3F4F6; padding:0.6rem; font-size:0.85rem; font-weight:700; color:#6B7280;">XP</span>
                        </div>
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Lulus Quiz (= Skor)</label>
                        <div style="display:flex; align-items:center; border:1px solid #E5E7EB; border-radius:0.5rem; overflow:hidden;">
                            <input type="number" value="0-100" style="width:100%; padding:0.6rem; border:none; outline:none; font-family:inherit; font-size:0.9rem; text-align:right;" placeholder="= Skor" disabled>
                            <span style="background:#F3F4F6; padding:0.6rem; font-size:0.85rem; font-weight:700; color:#6B7280;">XP</span>
                        </div>
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Selesaikan Simulasi</label>
                        <div style="display:flex; align-items:center; border:1px solid #E5E7EB; border-radius:0.5rem; overflow:hidden;">
                            <input type="number" value="50" style="width:100%; padding:0.6rem; border:none; outline:none; font-family:inherit; font-size:0.9rem; text-align:right;">
                            <span style="background:#F3F4F6; padding:0.6rem; font-size:0.85rem; font-weight:700; color:#6B7280;">XP</span>
                        </div>
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Daily Login Streak</label>
                        <div style="display:flex; align-items:center; border:1px solid #E5E7EB; border-radius:0.5rem; overflow:hidden;">
                            <input type="number" value="5" style="width:100%; padding:0.6rem; border:none; outline:none; font-family:inherit; font-size:0.9rem; text-align:right;">
                            <span style="background:#F3F4F6; padding:0.6rem; font-size:0.85rem; font-weight:700; color:#6B7280;">XP</span>
                        </div>
                    </div>
                </div>
                <div style="margin-top:1rem; display:flex; justify-content:flex-end;">
                    <button style="background:#10B981; color:white; border:none; padding:0.5rem 1rem; border-radius:0.5rem; font-weight:600; font-size:0.85rem; cursor:pointer;">Simpan Konfigurasi</button>
                </div>
            </div>

            {{-- Table Badge --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <table style="width: 100%; border-collapse: collapse; text-align:left;">
                    <thead>
                        <tr style="background:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Ikon</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Nama Badge</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Deskripsi</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">XP Reward</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Status</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $dummy = [];
                        @endphp
                        @forelse($dummy as $d)
                        <tr style="border-bottom:1px solid #F3F4F6;">
                            <td style="padding:1rem 1.5rem;">
                                <div style="width:40px; height:40px; border-radius:50%; background:{{ $d[1] }}20; display:flex; align-items:center; justify-content:center;">
                                    <i data-lucide="{{ $d[0] }}" style="width:20px; height:20px; color:{{ $d[1] }};"></i>
                                </div>
                            </td>
                            <td style="padding:1rem 1.5rem; font-weight:700; color:#111827; font-size:0.95rem;">{{ $d[2] }}</td>
                            <td style="padding:1rem 1.5rem; color:#6B7280; font-size:0.85rem; max-width:250px;">{{ $d[3] }}</td>
                            <td style="padding:1rem 1.5rem; font-weight:700; color:#7b61ff; font-size:0.9rem;">+{{ $d[4] }}</td>
                            <td style="padding:1rem 1.5rem;">
                                @if($d[5] == 'Aktif')
                                    <span style="background:#D1FAE5; color:#065F46; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Aktif</span>
                                @else
                                    <span style="background:#F3F4F6; color:#4B5563; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Draft</span>
                                @endif
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; gap:0.5rem;">
                                    <button style="background:none; border:none; color:#F59E0B; cursor:pointer;" title="Edit"><i data-lucide="edit" style="width:18px; height:18px;"></i></button>
                                    <button style="background:none; border:none; color:#EF4444; cursor:pointer;" title="Hapus"><i data-lucide="trash-2" style="width:18px; height:18px;"></i></button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="padding:2rem; text-align:center; color:#6B7280; font-size:0.9rem;">Belum ada badge yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    {{-- Modal Badge --}}
    <div id="modal-badge" style="display:none; position:fixed; inset:0; background:rgba(17,24,39,0.5); backdrop-filter:blur(4px); z-index:50; justify-content:center; align-items:center; padding:2rem;">
        <div style="background:white; border-radius:1rem; width:100%; max-width:500px; display:flex; flex-direction:column; box-shadow:0 10px 25px rgba(0,0,0,0.1); animation: slideUp 0.3s ease-out forwards;">
            <div style="padding:1.5rem; border-bottom:1px solid #E5E7EB; display:flex; justify-content:space-between; align-items:center;">
                <h2 style="font-size:1.25rem; font-weight:800; color:#111827;">Tambah Badge Baru</h2>
                <button onclick="document.getElementById('modal-badge').style.display='none'" style="background:none; border:none; cursor:pointer; color:#9CA3AF;">
                    <i data-lucide="x" style="width:24px; height:24px;"></i>
                </button>
            </div>
            <div style="padding:1.5rem; display:flex; flex-direction:column; gap:1.25rem;">
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Nama Badge</label>
                    <input type="text" placeholder="Contoh: First Blood" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                </div>
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Deskripsi Pencapaian</label>
                    <textarea rows="2" placeholder="Syarat mendapatkan badge ini..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                </div>
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">XP Reward</label>
                    <input type="number" placeholder="500" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                </div>
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Ikon SVG/Lucide</label>
                    <input type="text" placeholder="Contoh: shield-check" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                </div>
            </div>
            <div style="padding:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end; gap:0.75rem;">
                <button type="button" onclick="document.getElementById('modal-badge').style.display='none'" style="padding:0.75rem 1.5rem; border:1px solid #E5E7EB; background:white; border-radius:0.5rem; font-weight:600; color:#374151; cursor:pointer;">Batal</button>
                <button type="button" style="padding:0.75rem 1.5rem; border:none; background:#7b61ff; color:white; border-radius:0.5rem; font-weight:600; cursor:pointer;">Simpan Badge</button>
            </div>
        </div>
    </div>
</div>
<style>
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
