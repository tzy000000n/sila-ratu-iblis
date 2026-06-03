@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'simulasi'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari simulasi...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title & Action --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Kelola Simulasi</h1>
                    <p style="font-size: 0.95rem; color: #6B7280;">Buat skenario serangan siber interaktif untuk pengguna.</p>
                </div>
                <button style="background:#7b61ff; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.75rem; font-weight:600; font-size:0.9rem; cursor:pointer; display:flex; align-items:center; gap:0.5rem; box-shadow:0 4px 12px rgba(123,97,255,0.25);" onclick="document.getElementById('modal-simulasi').style.display='flex'">
                    <i data-lucide="plus" style="width:18px; height:18px;"></i> Buat Simulasi
                </button>
            </div>

            {{-- Cards --}}
            <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1.25rem;">
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(123,97,255,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="layers" style="width:24px; height:24px; color:#7b61ff;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Total Simulasi</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ $simulasis->count() }}</p>
                    </div>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(16,185,129,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="check-circle" style="width:24px; height:24px; color:#10B981;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Aktif</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ $simulasis->count() }}</p>
                    </div>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(245,158,11,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="file-edit" style="width:24px; height:24px; color:#F59E0B;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Draft</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">0</p>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <table style="width: 100%; border-collapse: collapse; text-align:left;">
                    <thead>
                        <tr style="background:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Nama Simulasi</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Tipe</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Tingkat Kesulitan</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Status</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($simulasis as $sim)
                        <tr style="border-bottom:1px solid #F3F4F6;">
                            <td style="padding:1rem 1.5rem; font-weight:700; color:#111827; font-size:0.95rem;">{{ $sim->title }}</td>
                            <td style="padding:1rem 1.5rem; color:#4B5563; font-size:0.9rem;">{{ $sim->materi->kategori ?? 'Umum' }}</td>
                            <td style="padding:1rem 1.5rem; color:#4B5563; font-size:0.9rem;">
                                @php $level = $sim->materi->tingkat_kesulitan ?? 'Pemula'; @endphp
                                @if($level == 'Pemula')
                                    <span style="color:#10B981; font-weight:600;">{{ $level }}</span>
                                @elseif($level == 'Menengah')
                                    <span style="color:#F59E0B; font-weight:600;">{{ $level }}</span>
                                @else
                                    <span style="color:#EF4444; font-weight:600;">{{ $level }}</span>
                                @endif
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <span style="background:#D1FAE5; color:#065F46; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Aktif</span>
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; gap:0.5rem;">
                                    <button style="background:none; border:none; color:#F59E0B; cursor:pointer;" onclick="editSimulasi()" title="Edit Simulasi"><i data-lucide="edit" style="width:18px; height:18px;"></i></button>
                                    <button style="background:none; border:none; color:#EF4444; cursor:pointer;" onclick="if(confirm('Yakin hapus simulasi ini?')) { alert('Simulasi dihapus!'); }" title="Hapus"><i data-lucide="trash-2" style="width:18px; height:18px;"></i></button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding:2rem; text-align:center; color:#6B7280; font-size:0.9rem;">Belum ada simulasi yang dibuat.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    {{-- Modal Simulasi --}}
    <div id="modal-simulasi" style="display:none; position:fixed; inset:0; background:rgba(17,24,39,0.5); backdrop-filter:blur(4px); z-index:50; justify-content:center; align-items:center; padding:2rem;">
        <div style="background:white; border-radius:1rem; width:100%; max-width:700px; max-height:90vh; display:flex; flex-direction:column; box-shadow:0 10px 25px rgba(0,0,0,0.1); animation: slideUp 0.3s ease-out forwards;">
            <div style="padding:1.5rem; border-bottom:1px solid #E5E7EB; display:flex; justify-content:space-between; align-items:center;">
                <h2 style="font-size:1.25rem; font-weight:800; color:#111827;">Editor Simulasi</h2>
                <button onclick="document.getElementById('modal-simulasi').style.display='none'" style="background:none; border:none; cursor:pointer; color:#9CA3AF;">
                    <i data-lucide="x" style="width:24px; height:24px;"></i>
                </button>
            </div>
            <div style="padding:1.5rem; overflow-y:auto; flex:1; display:flex; flex-direction:column; gap:1.25rem;">
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Judul Simulasi</label>
                    <input type="text" placeholder="Masukkan judul" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                </div>
                <div style="display:flex; gap:1rem;">
                    <div style="flex:1;">
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Tipe Simulasi</label>
                        <select style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                            <option>Email Phishing</option>
                            <option>SMS Scam</option>
                            <option>Social Engineering</option>
                            <option>Password Attack</option>
                        </select>
                    </div>
                    <div style="flex:1;">
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Tingkat Kesulitan</label>
                        <select style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                            <option>Pemula</option>
                            <option>Menengah</option>
                            <option>Sulit</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Skenario (Deskripsi)</label>
                    <textarea rows="3" placeholder="Jelaskan konteks skenario ini..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                </div>
                <div style="background:#F9FAFB; padding:1rem; border-radius:0.75rem; border:1px solid #E5E7EB;">
                    <h4 style="font-size:0.9rem; font-weight:700; color:#111827; margin-bottom:0.75rem;">Pilihan Respon</h4>
                    
                    <div style="display:flex; flex-direction:column; gap:0.5rem;">
                        <div style="display:flex; align-items:center; gap:0.5rem;">
                            <input type="radio" name="sim_ans" title="Benar">
                            <input type="text" placeholder="Respon 1" style="flex:1; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.375rem; outline:none; font-size:0.85rem;">
                        </div>
                        <div style="display:flex; align-items:center; gap:0.5rem;">
                            <input type="radio" name="sim_ans" title="Benar">
                            <input type="text" placeholder="Respon 2" style="flex:1; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.375rem; outline:none; font-size:0.85rem;">
                        </div>
                    </div>
                    
                    <div style="margin-top:1rem;">
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Feedback Edukatif</label>
                        <textarea rows="2" placeholder="Berikan feedback setelah pengguna memilih..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                    </div>
                </div>
            </div>
            <div style="padding:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end; gap:0.75rem;">
                <button type="button" onclick="document.getElementById('modal-simulasi').style.display='none'" style="padding:0.75rem 1.5rem; border:1px solid #E5E7EB; background:white; border-radius:0.5rem; font-weight:600; color:#374151; cursor:pointer;">Batal</button>
                <button type="button" style="padding:0.75rem 1.5rem; border:none; background:#7b61ff; color:white; border-radius:0.5rem; font-weight:600; cursor:pointer;">Simpan Simulasi</button>
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
<script>
function editSimulasi() {
    document.getElementById('modal-simulasi').style.display='flex';
}
</script>
@endsection
