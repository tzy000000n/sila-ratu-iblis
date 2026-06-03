@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'materi'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari materi...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title & Action --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Kelola Materi Pembelajaran</h1>
                    <p style="font-size: 0.95rem; color: #6B7280;">Tambah, ubah, dan pantau materi edukasi cybersecurity.</p>
                </div>
                <button style="background:#7b61ff; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.75rem; font-weight:600; font-size:0.9rem; cursor:pointer; display:flex; align-items:center; gap:0.5rem; box-shadow:0 4px 12px rgba(123,97,255,0.25);" onclick="openModalAdd()">
                    <i data-lucide="plus" style="width:18px; height:18px;"></i> Tambah Materi
                </button>
            </div>

            {{-- Filters --}}
            <div style="display:flex; gap:1rem; align-items:center; background:white; padding:1rem 1.5rem; border-radius:1rem; border:1px solid #E5E7EB;">
                <div style="display:flex; align-items:center; gap:0.5rem; flex:1; background:#F3F4F6; padding:0.5rem 1rem; border-radius:0.5rem;">
                    <i data-lucide="search" style="width:18px; height:18px; color:#9CA3AF;"></i>
                    <input type="text" placeholder="Cari materi..." style="border:none; background:transparent; width:100%; outline:none; font-family:inherit; font-size:0.9rem;">
                </div>
                <select style="border:1px solid #E5E7EB; background:#F9FAFB; padding:0.6rem 1rem; border-radius:0.5rem; font-family:inherit; font-size:0.9rem; color:#4B5563; outline:none;">
                    <option value="">Semua Kategori</option>
                    <option value="network">Network Security</option>
                    <option value="web">Web Security</option>
                    <option value="crypto">Cryptography</option>
                </select>
                <select style="border:1px solid #E5E7EB; background:#F9FAFB; padding:0.6rem 1rem; border-radius:0.5rem; font-family:inherit; font-size:0.9rem; color:#4B5563; outline:none;">
                    <option value="">Semua Level</option>
                    <option value="EASY">Beginner</option>
                    <option value="MEDIUM">Intermediate</option>
                    <option value="HARD">Advanced</option>
                </select>
            </div>

            {{-- Data Table --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <table style="width: 100%; border-collapse: collapse; text-align:left;">
                    <thead>
                        <tr style="background:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem; width:50px;">No</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Judul Materi</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Kategori</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Level</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materis as $index => $m)
                        <tr style="border-bottom:1px solid #F3F4F6;">
                            <td style="padding:1rem 1.5rem; color:#6B7280; font-size:0.9rem;">{{ $materis->firstItem() + $index }}</td>
                            <td style="padding:1rem 1.5rem;">
                                <p style="font-weight:700; color:#111827; font-size:0.95rem;">{{ $m->judul }}</p>
                                <p style="color:#6B7280; font-size:0.75rem; margin-top:2px;">Ditambahkan: {{ $m->created_at->format('d M Y') }}</p>
                            </td>
                            <td style="padding:1rem 1.5rem; color:#4B5563; font-size:0.9rem;">{{ $m->kategori }}</td>
                            <td style="padding:1rem 1.5rem;">
                                @if($m->level == 'EASY')
                                    <span style="background:#D1FAE5; color:#065F46; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">{{ $m->level }}</span>
                                @elseif($m->level == 'MEDIUM')
                                    <span style="background:#FEF3C7; color:#92400E; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">{{ $m->level }}</span>
                                @else
                                    <span style="background:#FEE2E2; color:#991B1B; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">{{ $m->level }}</span>
                                @endif
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; gap:0.5rem; align-items:center;">
                                    <a href="{{ route('materi.detail', $m->slug) }}" target="_blank" style="background:none; border:none; color:#3B82F6; cursor:pointer;" title="Lihat">
                                        <i data-lucide="eye" style="width:18px; height:18px;"></i>
                                    </a>
                                    <button style="background:none; border:none; color:#F59E0B; cursor:pointer;" title="Edit" onclick="editMateri({{ $m->id }})">
                                        <i data-lucide="edit" style="width:18px; height:18px;"></i>
                                    </button>
                                    <form action="{{ route('admin.materi.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:none; border:none; color:#EF4444; cursor:pointer;" title="Hapus">
                                            <i data-lucide="trash-2" style="width:18px; height:18px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="padding:1rem 1.5rem; display:flex; justify-content:space-between; align-items:center; border-top:1px solid #E5E7EB; background:#F9FAFB;">
                    <p style="font-size:0.85rem; color:#6B7280;">Menampilkan {{ $materis->firstItem() ?? 0 }} hingga {{ $materis->lastItem() ?? 0 }} dari {{ $materis->total() }} materi</p>
                    <div style="display:flex; gap:0.5rem;">
                        @if ($materis->onFirstPage())
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">&laquo; Sebelumnya</span>
                        @else
                            <a href="{{ $materis->previousPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">&laquo; Sebelumnya</a>
                        @endif

                        @if ($materis->hasMorePages())
                            <a href="{{ $materis->nextPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">Selanjutnya &raquo;</a>
                        @else
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">Selanjutnya &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- Modal Form Materi --}}
    <div id="modal-materi" style="display:none; position:fixed; inset:0; background:rgba(17,24,39,0.5); backdrop-filter:blur(4px); z-index:50; justify-content:center; align-items:center; padding:2rem;">
        <form id="form-materi" method="POST" action="{{ route('admin.materi.store') }}" style="background:white; border-radius:1rem; width:100%; max-width:700px; max-height:90vh; display:flex; flex-direction:column; box-shadow:0 10px 25px rgba(0,0,0,0.1); animation: slideUp 0.3s ease-out forwards;">
            @csrf
            <input type="hidden" name="_method" id="form-method" value="POST">
            
            <div style="padding:1.5rem; border-bottom:1px solid #E5E7EB; display:flex; justify-content:space-between; align-items:center;">
                <h2 id="modal-title" style="font-size:1.25rem; font-weight:800; color:#111827;">Tambah Materi Baru</h2>
                <button type="button" onclick="document.getElementById('modal-materi').style.display='none'" style="background:none; border:none; cursor:pointer; color:#9CA3AF;">
                    <i data-lucide="x" style="width:24px; height:24px;"></i>
                </button>
            </div>
            
            <div style="padding:1.5rem; overflow-y:auto; flex:1; display:flex; flex-direction:column; gap:1.25rem;">
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Judul Materi</label>
                    <input type="text" name="judul" id="input-judul" required placeholder="Masukkan judul materi" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                </div>
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Slug</label>
                    <input type="text" name="slug" id="input-slug" required placeholder="judul-materi-slug" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; background:#F9FAFB;">
                </div>
                <div style="display:flex; gap:1rem;">
                    <div style="flex:1;">
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Kategori</label>
                        <select name="kategori" id="input-kategori" required style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                            <option value="Network Security">Network Security</option>
                            <option value="Web Security">Web Security</option>
                            <option value="Cryptography">Cryptography</option>
                        </select>
                    </div>
                    <div style="flex:1;">
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Level</label>
                        <select name="level" id="input-level" required style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                            <option value="EASY">EASY</option>
                            <option value="MEDIUM">MEDIUM</option>
                            <option value="HARD">HARD</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Isi Materi (Rich Text)</label>
                    <textarea name="konten" id="input-konten" rows="6" required placeholder="Tulis isi materi di sini..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                </div>
            </div>
            
            <div style="padding:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end; gap:0.75rem;">
                <button type="button" onclick="document.getElementById('modal-materi').style.display='none'" style="padding:0.75rem 1.5rem; border:1px solid #E5E7EB; background:white; border-radius:0.5rem; font-weight:600; color:#374151; cursor:pointer;">Batal</button>
                <button type="submit" id="btn-submit" style="padding:0.75rem 1.5rem; border:none; background:#10B981; color:white; border-radius:0.5rem; font-weight:600; cursor:pointer;">Simpan Materi</button>
            </div>
        </form>
    </div>
    </div>
</div>
<style>
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Fix for large pagination icons */
nav[role="navigation"] svg {
    width: 20px;
    height: 20px;
}
</style>
<script>
function openModalAdd() {
    document.getElementById('modal-title').innerText = 'Tambah Materi Baru';
    document.getElementById('form-method').value = 'POST';
    document.getElementById('form-materi').action = '{{ route("admin.materi.store") }}';
    
    document.getElementById('input-judul').value = '';
    document.getElementById('input-slug').value = '';
    document.getElementById('input-kategori').value = 'Network Security';
    document.getElementById('input-level').value = 'EASY';
    document.getElementById('input-konten').value = '';
    document.getElementById('btn-submit').innerText = 'Simpan Materi';

    document.getElementById('modal-materi').style.display='flex';
}

function editMateri(materi) {
    document.getElementById('modal-title').innerText = 'Edit Materi';
    document.getElementById('form-method').value = 'PUT';
    document.getElementById('form-materi').action = '/admin/materi/' + materi.id;
    
    document.getElementById('input-judul').value = materi.judul;
    document.getElementById('input-slug').value = materi.slug;
    document.getElementById('input-kategori').value = materi.kategori;
    document.getElementById('input-level').value = materi.level;
    document.getElementById('input-konten').value = materi.konten;
    document.getElementById('btn-submit').innerText = 'Perbarui Materi';

    document.getElementById('modal-materi').style.display='flex';
}

// Auto-generate slug
document.getElementById('input-judul').addEventListener('keyup', function() {
    if(document.getElementById('form-method').value === 'POST') {
        let title = this.value;
        let slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
        document.getElementById('input-slug').value = slug;
    }
});
</script>
@endsection
