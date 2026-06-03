@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'analytics'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari laporan...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Learning Analytics</h1>
                    <p style="font-size: 0.95rem; color: #6B7280;">Pantau performa belajar, tingkat retensi, dan aktivitas pengguna.</p>
                </div>
                <button style="background:white; color:#374151; border:1px solid #E5E7EB; padding:0.75rem 1.5rem; border-radius:0.75rem; font-weight:600; font-size:0.9rem; cursor:pointer; display:flex; align-items:center; gap:0.5rem; box-shadow:0 2px 5px rgba(0,0,0,0.02);">
                    <i data-lucide="download" style="width:18px; height:18px;"></i> Export Report
                </button>
            </div>

            {{-- Widget Data --}}
            <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:1.25rem;">
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.5rem;">Total Waktu Pembelajaran</p>
                    <p style="font-size:1.75rem; font-weight:800; color:#111827;">0 <span style="font-size:0.85rem; font-weight:600; color:#9CA3AF;">Jam</span></p>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.5rem;">Total Quiz Diambil</p>
                    <p style="font-size:1.75rem; font-weight:800; color:#111827;">0 <span style="font-size:0.85rem; font-weight:600; color:#9CA3AF;">Kali</span></p>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.5rem;">Rata-rata Nilai Global</p>
                    <p style="font-size:1.75rem; font-weight:800; color:#10B981;">0 <span style="font-size:0.85rem; font-weight:600; color:#9CA3AF;">/ 100</span></p>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.5rem;">Retention Rate</p>
                    <p style="font-size:1.75rem; font-weight:800; color:#7b61ff;">0% <span style="font-size:0.85rem; font-weight:600; color:#9CA3AF;">+0%</span></p>
                </div>
            </div>

            {{-- Charts --}}
            <div style="display:flex; gap:1.5rem;">
                {{-- Chart Kiri: Aktivitas Bulanan --}}
                <div style="flex:2; background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.5rem;">Aktivitas Pengguna Bulanan</h3>
                    <div style="height:250px; display:flex; align-items:flex-end; gap:1rem; padding-top:1rem;">
                        @php
                        $bars = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
                        @endphp
                        @foreach($bars as $i => $h)
                        <div style="flex:1; display:flex; flex-direction:column; align-items:center; gap:0.5rem;">
                            <div style="width:100%; height:100%; display:flex; align-items:flex-end; background:#F3F4F6; border-radius:4px 4px 0 0; position:relative;">
                                <div style="width:100%; height:{{ $h > 0 ? ($h/120)*100 : 0 }}%; background:linear-gradient(180deg, #7b61ff 0%, #4F46E5 100%); border-radius:4px 4px 0 0; opacity:0.8;"></div>
                            </div>
                            <span style="font-size:0.75rem; font-weight:600; color:#9CA3AF;">{{ $months[$i] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Chart Kanan: Progress Kategori --}}
                <div style="flex:1; background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                    <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.5rem;">Progress per Kategori</h3>
                    <div style="display:flex; flex-direction:column; gap:1.25rem;">
                        @php
                        $cats = [];
                        @endphp
                        @forelse($cats as $c)
                        <div>
                            <div style="display:flex; justify-content:space-between; margin-bottom:0.4rem;">
                                <span style="font-size:0.85rem; font-weight:600; color:#111827;">{{ $c[0] }}</span>
                                <span style="font-size:0.85rem; font-weight:700; color:{{ $c[2] }};">{{ $c[1] }}%</span>
                            </div>
                            <div style="width:100%; height:8px; background:#F3F4F6; border-radius:999px;">
                                <div style="height:100%; border-radius:999px; background:{{ $c[2] }}; width:{{ $c[1] }}%;"></div>
                            </div>
                        </div>
                        @empty
                        <div style="text-align:center; padding:1rem; color:#6B7280; font-size:0.85rem;">
                            Data belum tersedia.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Heatmap --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                    <h3 style="font-size:1.1rem; font-weight:700; color:#111827;">Heatmap Aktivitas (30 Hari Terakhir)</h3>
                    <span style="font-size:0.8rem; color:#6B7280;">Semakin gelap warna, semakin banyak aktivitas.</span>
                </div>
                <div style="display:grid; grid-template-columns:repeat(30, 1fr); gap:4px;">
                    @for($i=0; $i<30; $i++)
                        <div style="aspect-ratio:1; border-radius:4px; background:#E5E7EB;" title="Aktivitas: 0"></div>
                    @endfor
                </div>
            </div>

        </div>
    </main>
</div>
@endsection
