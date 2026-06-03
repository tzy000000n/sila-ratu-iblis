@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'notifikasi'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari notifikasi...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title --}}
            <div>
                <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Pengumuman & Notifikasi</h1>
                <p style="font-size: 0.95rem; color: #6B7280;">Kirim pesan broadcast, pengumuman event, dan challenge ke pengguna.</p>
            </div>

            <div style="display:flex; gap:1.5rem; align-items:flex-start;">
                {{-- Left: Form Buat Notifikasi --}}
                <div style="flex:1; background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.25rem;">Buat Notifikasi Baru</h3>
                    
                    <div style="display:flex; flex-direction:column; gap:1.25rem;">
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Judul Pesan</label>
                            <input type="text" placeholder="Contoh: Maintenance Server Malam Ini" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Tipe Notifikasi</label>
                            <select style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                                <option>Pengumuman Sistem (Info)</option>
                                <option>Peringatan (Warning)</option>
                                <option>Event Baru (Success)</option>
                            </select>
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Target Pengguna</label>
                            <select style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                                <option>Semua Pengguna</option>
                                <option>Hanya Siswa</option>

                            </select>
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Isi Pesan</label>
                            <textarea rows="4" placeholder="Tulis pesan lengkap di sini..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                        </div>
                        <div style="display:flex; gap:1rem; margin-top:0.5rem;">
                            <button style="flex:1; background:white; color:#374151; border:1px solid #E5E7EB; padding:0.75rem; border-radius:0.5rem; font-weight:600; cursor:pointer;">Jadwalkan</button>
                            <button style="flex:2; background:#7b61ff; color:white; border:none; padding:0.75rem; border-radius:0.5rem; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(123,97,255,0.25);">Kirim Sekarang</button>
                        </div>
                    </div>
                </div>

                {{-- Right: Riwayat --}}
                <div style="flex:1.5; background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.25rem;">Riwayat Notifikasi Terkirim</h3>
                    
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        @php
                        $notifs = [];
                        @endphp
                        
                        @forelse($notifs as $n)
                        <div style="padding:1rem; border:1px solid #E5E7EB; border-radius:0.75rem; display:flex; gap:1rem; align-items:flex-start;">
                            <div style="width:40px; height:40px; border-radius:50%; background:{{ $n[1] }}15; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:0.25rem;">
                                <i data-lucide="{{ $n[0] }}" style="width:20px; height:20px; color:{{ $n[1] }};"></i>
                            </div>
                            <div style="flex:1;">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                                    <p style="font-weight:700; color:#111827; font-size:0.95rem; margin-bottom:0.25rem;">{{ $n[2] }}</p>
                                    <span style="font-size:0.7rem; font-weight:600; color:#6B7280; background:#F3F4F6; padding:0.2rem 0.5rem; border-radius:0.25rem;">{{ $n[4] }}</span>
                                </div>
                                <p style="font-size:0.85rem; color:#4B5563; margin-bottom:0.5rem; line-height:1.5;">{{ $n[3] }}</p>
                                <p style="font-size:0.75rem; color:#9CA3AF; font-weight:600;"><i data-lucide="users" style="width:12px; height:12px; display:inline-block; vertical-align:middle; margin-right:2px;"></i> Target: {{ $n[5] }}</p>
                            </div>
                        </div>
                        @empty
                        <div style="text-align:center; padding:2rem 1rem; color:#6B7280; font-size:0.9rem;">
                            Belum ada riwayat notifikasi.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
@endsection
