@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'pesan'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari pesan...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Kotak Masuk Pesan</h1>
                    <p style="font-size: 0.95rem; color: #6B7280;">Kelola pesan, laporan, dan pertanyaan dari pengguna.</p>
                </div>
            </div>

            {{-- Table --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <table style="width: 100%; border-collapse: collapse; text-align:left;">
                    <thead>
                        <tr style="background:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Pengirim</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Subjek / Pesan</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Tanggal</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Status</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                        <tr style="border-bottom:1px solid #F3F4F6; background: {{ $msg->is_read ? 'transparent' : '#F4F6FF' }};">
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <div style="width:40px; height:40px; border-radius:50%; background:#E5E7EB; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        @if($msg->user && $msg->user->avatar)
                                            <img src="{{ asset('uploads/avatars/' . $msg->user->avatar) }}" alt="Avatar" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                        @else
                                            <i data-lucide="user" style="width:20px; height:20px; color:#9CA3AF;"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p style="font-weight:700; color:#111827; font-size:0.95rem;">{{ $msg->user->name ?? 'Unknown User' }}</p>
                                        <p style="color:#6B7280; font-size:0.8rem;">{{ $msg->user->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:1rem 1.5rem; max-width: 300px;">
                                <p style="font-weight:700; color:#111827; font-size:0.95rem; margin-bottom: 0.25rem;">{{ $msg->subject }}</p>
                                <p style="color:#4B5563; font-size:0.85rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $msg->message }}</p>
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <p style="font-weight:600; color:#111827; font-size:0.85rem;">{{ $msg->created_at->format('d M Y') }}</p>
                                <p style="color:#6B7280; font-size:0.75rem;">{{ $msg->created_at->format('H:i') }}</p>
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                @if($msg->is_read)
                                    <span style="background:#F3F4F6; color:#4B5563; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Dibaca</span>
                                @else
                                    <span style="background:#DBEAFE; color:#1D4ED8; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Baru</span>
                                @endif
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; gap:0.5rem;">
                                    <button onclick="lihatPesan('{{ addslashes($msg->subject) }}', '{{ addslashes($msg->message) }}')" style="background:none; border:none; color:#3B82F6; cursor:pointer;" title="Baca Pesan">
                                        <i data-lucide="eye" style="width:18px; height:18px;"></i>
                                    </button>
                                    @if(!$msg->is_read)
                                    <form action="{{ route('admin.pesan.read', $msg->id) }}" method="POST" style="margin:0;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" style="background:none; border:none; color:#10B981; cursor:pointer;" title="Tandai Sudah Dibaca">
                                            <i data-lucide="check-circle" style="width:18px; height:18px;"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('admin.pesan.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:none; border:none; color:#EF4444; cursor:pointer;" title="Hapus">
                                            <i data-lucide="trash-2" style="width:18px; height:18px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding:2rem; text-align:center; color:#6B7280; font-size:0.9rem;">Belum ada pesan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div style="padding:1rem 1.5rem; display:flex; justify-content:space-between; align-items:center; border-top:1px solid #E5E7EB; background:#F9FAFB;">
                    <p style="font-size:0.85rem; color:#6B7280;">Menampilkan {{ $messages->firstItem() ?? 0 }} hingga {{ $messages->lastItem() ?? 0 }} dari {{ $messages->total() }} pesan</p>
                    <div style="display:flex; gap:0.5rem;">
                        @if ($messages->onFirstPage())
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">&laquo; Sebelumnya</span>
                        @else
                            <a href="{{ $messages->previousPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">&laquo; Sebelumnya</a>
                        @endif

                        @if ($messages->hasMorePages())
                            <a href="{{ $messages->nextPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">Selanjutnya &raquo;</a>
                        @else
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">Selanjutnya &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- Modal Baca Pesan --}}
    <div id="modal-pesan" style="display:none; position:fixed; inset:0; background:rgba(17,24,39,0.5); backdrop-filter:blur(4px); z-index:50; justify-content:center; align-items:center; padding:2rem;">
        <div style="background:white; border-radius:1rem; width:100%; max-width:600px; max-height:90vh; display:flex; flex-direction:column; box-shadow:0 10px 25px rgba(0,0,0,0.1); animation: slideUp 0.3s ease-out forwards;">
            <div style="padding:1.5rem; border-bottom:1px solid #E5E7EB; display:flex; justify-content:space-between; align-items:center;">
                <h2 id="modal-pesan-subject" style="font-size:1.25rem; font-weight:800; color:#111827;">Subjek Pesan</h2>
                <button onclick="document.getElementById('modal-pesan').style.display='none'" style="background:none; border:none; cursor:pointer; color:#9CA3AF;">
                    <i data-lucide="x" style="width:24px; height:24px;"></i>
                </button>
            </div>
            <div style="padding:1.5rem; overflow-y:auto; flex:1;">
                <p id="modal-pesan-body" style="font-size: 0.95rem; color: #4B5563; line-height: 1.6; white-space: pre-wrap;"></p>
            </div>
            <div style="padding:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end;">
                <button type="button" onclick="document.getElementById('modal-pesan').style.display='none'" style="padding:0.75rem 1.5rem; border:none; background:#7b61ff; color:white; border-radius:0.5rem; font-weight:600; cursor:pointer;">Tutup</button>
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
function lihatPesan(subject, message) {
    document.getElementById('modal-pesan-subject').innerText = subject;
    document.getElementById('modal-pesan-body').innerText = message;
    document.getElementById('modal-pesan').style.display = 'flex';
}
</script>
@endsection
