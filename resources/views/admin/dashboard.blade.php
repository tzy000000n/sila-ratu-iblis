@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'dashboard'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari pengguna, materi, atau pengaturan...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:2rem;">
            
            {{-- Header Title --}}
            <div>
                <h1 style="font-size: 2rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; letter-spacing: -0.02em;">
                    Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}
                </h1>
                <p style="font-size: 1rem; color: #6B7280;">Kelola seluruh ekosistem pembelajaran cybersecurity Nexyra Learn.</p>
            </div>

            {{-- 6 Cards Statistik --}}
            <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1.25rem;">
                @php
                $stats = [
                    ['Total User', number_format($totalUser), '+12% minggu ini', 'users', '#7b61ff', 'rgba(123,97,255,0.1)'],
                    ['Materi Aktif', number_format($materiAktif), '+3 materi baru', 'book-open', '#10B981', 'rgba(16,185,129,0.1)'],
                    ['Quiz Aktif', number_format($materiAktif), '0% completion', 'file-question', '#F59E0B', 'rgba(245,158,11,0.1)'],
                    ['Simulasi Aktif', number_format($simulasiAktif), '10 session', 'play-square', '#EC4899', 'rgba(236,72,153,0.1)'],
                    ['Total XP Diperoleh', number_format($totalXp), 'Semua User', 'zap', '#8B5CF6', 'rgba(139,92,246,0.1)'],
                    ['Rata-rata Skor', $completionRate.'%', 'Berdasarkan Quiz', 'trending-up', '#3B82F6', 'rgba(59,130,246,0.1)'],
                ];
                @endphp
                @foreach($stats as $s)
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02); display:flex; align-items:center; justify-content:space-between; transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                    <div>
                        <p style="font-size:0.875rem; font-weight:600; color:#6B7280; margin-bottom:0.5rem;">{{ $s[0] }}</p>
                        <p style="font-size:1.75rem; font-weight:800; color:#111827; margin-bottom:0.25rem;">{{ $s[1] }}</p>
                        <p style="font-size:0.75rem; font-weight:600; color:#10B981;">{{ $s[2] }}</p>
                    </div>
                    <div style="width:56px; height:56px; border-radius:1rem; background:{{ $s[5] }}; display:flex; align-items:center; justify-content:center;">
                        <i data-lucide="{{ $s[3] }}" style="width:28px; height:28px; color:{{ $s[4] }};"></i>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- 2 Columns --}}
            <div style="display:flex; gap:1.5rem; align-items:flex-start;">
                {{-- Left Col --}}
                <div style="flex:2; display:flex; flex-direction:column; gap:1.5rem;">
                    {{-- Chart Mockup --}}
                    <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                            <h3 style="font-size:1.1rem; font-weight:700; color:#111827;">Aktivitas Belajar & Pertumbuhan User</h3>
                            <select style="border:1px solid #E5E7EB; border-radius:0.5rem; padding:0.4rem 0.8rem; font-size:0.8rem; color:#4B5563; outline:none; background:#F9FAFB;">
                                <option>Minggu Ini</option>
                                <option>Bulan Ini</option>
                                <option>Tahun Ini</option>
                            </select>
                        </div>
                        <div style="height:200px; display:flex; align-items:flex-end; gap:0.5rem; padding-top:1rem;">
                            @php
                            $bars = [0, 0, 0, 0, 0, 0, 0];
                            $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                            @endphp
                            @foreach($bars as $i => $h)
                            <div style="flex:1; display:flex; flex-direction:column; align-items:center; gap:0.5rem;">
                                <div style="width:100%; height:100%; display:flex; align-items:flex-end; background:#F3F4F6; border-radius:4px 4px 0 0;">
                                    <div style="width:100%; height:{{ $h > 0 ? $h : 0 }}%; background:linear-gradient(180deg, #7b61ff 0%, #4F46E5 100%); border-radius:4px 4px 0 0; opacity:0.8;"></div>
                                </div>
                                <span style="font-size:0.75rem; font-weight:600; color:#9CA3AF;">{{ $days[$i] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- Right Col --}}
                <div style="flex:1; display:flex; flex-direction:column; gap:1.5rem;">
                    {{-- Aktivitas Terbaru --}}
                    <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.25rem;">Aktivitas Terbaru</h3>
                        @php
                        $activities = [];
                        foreach($recentResults ?? [] as $r) {
                            $icon = 'check-circle';
                            $color = '#7b61ff';
                            $desc = '';
                            $action = '';
                            if($r->type == 'materi') {
                                $icon = 'book-open';
                                $action = 'Membaca Materi Selesai';
                            } elseif($r->type == 'simulasi') {
                                $icon = 'play-square';
                                $color = '#10B981';
                                $action = 'Menyelesaikan Simulasi';
                            } elseif($r->type == 'quiz') {
                                $icon = 'file-question';
                                $color = '#F59E0B';
                                $action = 'Menyelesaikan Quiz (Skor: '.$r->score.')';
                            }
                            $activities[] = [$icon, $color, $r->user->name ?? 'Unknown User', $action, $r->created_at->diffForHumans()];
                        }
                        @endphp
                        <div style="display:flex; flex-direction:column; gap:1rem;">
                            @forelse($activities as $a)
                            <div style="display:flex; gap:1rem;">
                                <div style="width:36px; height:36px; border-radius:50%; background:rgba(243,244,246,1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i data-lucide="{{ $a[0] }}" style="width:16px; height:16px; color:{{ $a[1] }};"></i>
                                </div>
                                <div>
                                    <p style="font-size:0.85rem; font-weight:700; color:#111827;">{{ $a[2] }}</p>
                                    <p style="font-size:0.75rem; color:#6B7280; margin-top:0.1rem;">{{ $a[3] }}</p>
                                    <p style="font-size:0.65rem; color:#9CA3AF; font-weight:600; margin-top:0.3rem;">{{ $a[4] }}</p>
                                </div>
                            </div>
                            @empty
                            <div style="text-align:center; padding:1rem 0; color:#6B7280; font-size:0.85rem;">Belum ada aktivitas terbaru.</div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Materi Populer --}}
                    <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.25rem;">Materi Terpopuler</h3>
                        @php
                        $popular = [];
                        @endphp
                        <div style="display:flex; flex-direction:column; gap:1rem;">
                            @forelse($popular as $i => $p)
                            <div>
                                <div style="display:flex; justify-content:space-between; margin-bottom:0.25rem;">
                                    <span style="font-size:0.85rem; font-weight:600; color:#111827;">{{ $i+1 }}. {{ $p[0] }}</span>
                                    <span style="font-size:0.75rem; font-weight:600; color:#6B7280;">{{ $p[1] }}</span>
                                </div>
                                <div style="width:100%; height:6px; background:#F3F4F6; border-radius:999px;">
                                    <div style="height:100%; border-radius:999px; background:{{ $p[2] }}; width:{{ $p[3] }};"></div>
                                </div>
                            </div>
                            @empty
                            <div style="text-align:center; padding:1rem 0; color:#6B7280; font-size:0.85rem;">Data materi belum tersedia.</div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</div>
@endsection
