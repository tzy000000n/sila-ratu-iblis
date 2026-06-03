@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">

    @include('partials.sidebar', ['active' => 'dashboard'])

    {{-- ===== MAIN ===== --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; min-width:0;">

        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari materi atau quiz...', 'showSearch' => true])

        {{-- Content --}}
        <div style="padding:2rem; display:flex; flex-direction:column; gap:2rem;">

            {{-- Banner --}}
            <div style="border-radius:1.25rem; padding:2.5rem;
                        background:linear-gradient(135deg,#7C3AED 0%,#4F46E5 100%);
                        color:#fff; position:relative; overflow:hidden;">
                <div style="position:absolute;right:-8%;top:-60%;width:55%;height:220%;
                            background:rgba(255,255,255,0.07);transform:rotate(15deg);pointer-events:none;"></div>
                <div style="position:relative;z-index:1;">
                    <h2 style="font-size:2.25rem;font-weight:800;line-height:1.2;margin-bottom:0.5rem;letter-spacing:-0.02em;">
                        Halo, {{ auth()->user()->name ?? 'Siswa' }}! 👋
                    </h2>
                    <p style="font-size:1rem;opacity:0.88;margin-bottom:1.5rem;line-height:1.65; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        Siap melanjutkan petualanganmu hari ini? Kamu tinggal sedikit lagi menyelesaikan modul <strong>{{ $materiLanjut ? $materiLanjut->judul : 'Keamanan Digital' }}</strong>.
                    </p>
                    <div style="display:flex;gap:0.75rem;">
                        <a href="{{ $materiLanjut ? route('materi.detail', $materiLanjut->slug) : route('materi') }}" style="display:inline-flex;align-items:center;padding:0.75rem 1.75rem;
                                       border-radius:9999px;font-weight:700;font-size:0.9rem;text-decoration:none;
                                       background:#fff;color:#7b61ff;border:none;cursor:pointer;
                                       box-shadow:0 4px 16px rgba(0,0,0,0.15);">
                            Lanjut Belajar
                        </a>
                    </div>
                </div>
            </div>

            {{-- Two column --}}
            <div style="display:flex;gap:1.75rem;align-items:flex-start;">

                {{-- Left --}}
                <div style="flex:1;display:flex;flex-direction:column;gap:1.75rem;">

                    {{-- Statistik --}}
                    <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;
                                padding:1.5rem;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1.5rem;">
                            <div>
                                <p style="font-size:1.15rem;font-weight:800;color:#111827;">Statistik Belajar</p>
                                <p style="font-size:0.8rem;color:#6B7280;margin-top:2px;">Minggu ini kamu sangat produktif!</p>
                            </div>
                            @php
                                $xp = auth()->user()->xp ?? 0;
                                $userLevel = 'Pemula';
                                if ($xp > 500) $userLevel = 'Menengah';
                                if ($xp > 1500) $userLevel = 'Lanjutan';
                                if ($xp > 3000) $userLevel = 'Ahli';
                            @endphp
                            <span style="font-size:0.7rem;font-weight:800;padding:0.25rem 0.75rem;
                                         border-radius:9999px;background:#E5E7EB;color:#6B7280;">Level: {{ $userLevel }}</span>
                        </div>
                        <div style="display:flex;gap:2rem;margin-bottom:1.75rem;">
                            <div>
                                <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-bottom:4px;">MATERI SELESAI</p>
                                <p style="font-size:1.85rem;font-weight:800;color:#7b61ff;">{{ \App\Models\UserResult::where('user_id', auth()->id())->where('type', 'materi')->count() }} <span style="font-size:0.875rem;font-weight:400;color:#9CA3AF;">/{{ \App\Models\Materi::count() }}</span></p>
                            </div>
                            <div>
                                <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-bottom:4px;">POIN NEXYRA</p>
                                <p style="font-size:1.85rem;font-weight:800;color:#7b61ff;">{{ number_format(auth()->user()->xp ?? 0) }}</p>
                            </div>
                            <div>
                                <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-bottom:4px;">STREAKS</p>
                                <p style="font-size:1.85rem;font-weight:800;color:#F59E0B;">{{ auth()->user()->streak_days ?? 0 }} <span style="font-size:0.875rem;font-weight:400;color:#9CA3AF;">Hari</span></p>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.5rem;align-items:flex-end;height:7rem;border-bottom:1px solid #E5E7EB;">
                            @foreach([0,0,0,0,0,0,0] as $h)
                            <div style="flex:1;background:#7b61ff;opacity:{{ $h > 0 ? '1' : '0.2' }};
                                        height:{{ $h > 0 ? $h : 0 }}%;border-radius:4px 4px 0 0;"></div>
                            @endforeach
                        </div>
                        <div style="display:flex;justify-content:space-between;margin-top:0.5rem;">
                            @foreach(['SEN','SEL','RAB','KAM','JUM','SAB','MIN'] as $d)
                            <span style="font-size:0.65rem;font-weight:700;color:#9CA3AF;">{{ $d }}</span>
                            @endforeach
                        </div>
                    </div>

                    {{-- 4 cards --}}
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;">
                        @php
                        $mCount = \App\Models\Materi::count();
                        $cCount = \App\Models\UserResult::where('user_id', auth()->id())->where('type', 'materi')->count();
                        $pct = $mCount > 0 ? round(($cCount / $mCount) * 100) : 0;
                        
                        $cards = [
                            ['book-open','#7b61ff','Materi','Akses perpustakaan modul keamanan siber yang interaktif.','bar', $pct . '%', route('materi')],
                            ['file-question','#F59E0B','Quiz','Uji pengetahuanmu dengan tantangan seru tiap akhir modul.','badge-warning','12 BARU', route('quiz')],
                            ['play-square','#10B981','Simulasi','Praktek langsung di Virtual Lab yang aman dan terisolasi.','badge-success','LAB AKTIF', route('simulasi')],
                            ['bar-chart-2','#EF4444','Hasil','Lihat perkembangan skill dan sertifikat yang telah diraih.','badge-danger','LIHAT RAPOR', route('hasil')],
                        ];
                        @endphp
                        @foreach($cards as $c)
                        <a href="{{ $c[6] ?? '#' }}" style="text-decoration:none; color:inherit;">
                            <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;padding:1.25rem;
                                        display:flex;flex-direction:column;gap:0.5rem;box-shadow:0 2px 8px rgba(0,0,0,0.03); height:100%; transition:transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.03)'">
                                <div style="width:40px;height:40px;border-radius:0.5rem;background:#F9FAFB;
                                            border:1px solid #E5E7EB;display:flex;align-items:center;justify-content:center;margin-bottom:0.25rem;">
                                    <i data-lucide="{{ $c[0] }}" style="width:20px;height:20px;color:{{ $c[1] }};"></i>
                                </div>
                                <p style="font-size:0.9rem;font-weight:700;color:#111827;">{{ $c[2] }}</p>
                                <p style="font-size:0.75rem;color:#6B7280;line-height:1.55;flex:1;">{{ $c[3] }}</p>
                                @if($c[4] === 'bar')
                                <div style="display:flex;align-items:center;gap:6px;margin-top:auto;">
                                    <div style="flex:1;background:#E5E7EB;border-radius:9999px;height:5px;">
                                        <div style="background:#7b61ff;height:5px;border-radius:9999px;width:{{ $c[5] }};"></div>
                                    </div>
                                    <span style="font-size:0.65rem;font-weight:700;color:#9CA3AF;">{{ $c[5] }}</span>
                                </div>
                                @elseif($c[4] === 'badge-warning')
                                <span style="font-size:0.65rem;font-weight:800;padding:0.2rem 0.5rem;border-radius:0.375rem;
                                             background:#FEF3C7;color:#F59E0B;width:fit-content;margin-top:auto;">{{ $c[5] }}</span>
                                @elseif($c[4] === 'badge-success')
                                <span style="font-size:0.65rem;font-weight:800;padding:0.2rem 0.5rem;border-radius:0.375rem;
                                             background:#D1FAE5;color:#10B981;width:fit-content;margin-top:auto;">{{ $c[5] }}</span>
                                @else
                                <span style="font-size:0.65rem;font-weight:800;padding:0.2rem 0.5rem;border-radius:0.375rem;
                                             background:#FEE2E2;color:#EF4444;width:fit-content;margin-top:auto;">{{ $c[5] }}</span>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>

                    {{-- Aktivitas --}}
                    <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;
                                padding:1.5rem;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;">
                            <p style="font-size:1.1rem;font-weight:800;color:#111827;">Aktivitas Terakhir</p>
                            <a href="#" style="font-size:0.8rem;font-weight:700;color:#7b61ff;">Lihat Semua</a>
                        </div>
                        @php
                        $recentResults = \App\Models\UserResult::where('user_id', auth()->id())->latest()->take(3)->get();
                        $activities = [];
                        foreach($recentResults as $r) {
                            $icon = 'check-circle';
                            $color = '#7b61ff';
                            $desc = '';
                            $xpText = '';
                            $tag = '';
                            
                            if($r->type == 'materi') {
                                $icon = 'book-open';
                                $desc = 'Membaca Materi Selesai';
                                $xpText = '+10 XP';
                                $tag = 'Materi';
                            } elseif($r->type == 'simulasi') {
                                $icon = 'play-square';
                                $color = '#10B981';
                                $desc = 'Simulasi Selesai';
                                $xpText = '+50 XP';
                                $tag = 'Lab';
                            } elseif($r->type == 'quiz') {
                                $icon = 'file-question';
                                $color = '#F59E0B';
                                $desc = 'Quiz Selesai (Skor: '.$r->score.')';
                                $xpText = '+'.$r->score.' XP';
                                $tag = 'Quiz';
                            }

                            $activities[] = [$icon, $color, $desc, $r->created_at->diffForHumans(), $xpText, $color];
                        }
                        @endphp
                        <div style="display:flex;flex-direction:column;gap:0.25rem;">
                            @forelse($activities as $a)
                            <div style="display:flex;align-items:center;justify-content:space-between;padding:0.65rem 0.5rem;
                                        border-radius:0.75rem;" onmouseover="this.style.background='#F9FAFB'" onmouseout="this.style.background='transparent'">
                                <div style="display:flex;align-items:center;gap:1rem;">
                                    <div style="width:38px;height:38px;border-radius:50%;background:#F9FAFB;
                                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i data-lucide="{{ $a[0] }}" style="width:18px;height:18px;color:{{ $a[1] }};"></i>
                                    </div>
                                    <div>
                                        <p style="font-size:0.875rem;font-weight:700;color:#111827;">{{ $a[2] }}</p>
                                        <p style="font-size:0.75rem;color:#9CA3AF;margin-top:2px;">{{ $a[3] }}</p>
                                    </div>
                                </div>
                                <span style="font-size:0.75rem;font-weight:700;color:{{ $a[5] }};">{{ $a[4] }}</span>
                            </div>
                            @empty
                            <div style="text-align:center; padding:1.5rem 0; color:#6B7280; font-size:0.85rem;">
                                Belum ada aktivitas terbaru. Ayo mulai belajar!
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Right --}}
                <div style="width:300px;flex-shrink:0;display:flex;flex-direction:column;gap:1.5rem;">

                    {{-- Cyber Tip --}}
                    <div style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);border:1px solid rgba(123,97,255,0.15);
                                border-radius:1rem;padding:1.4rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;right:-12px;bottom:-12px;opacity:0.06;">
                            <i data-lucide="shield-check" style="width:110px;height:110px;"></i>
                        </div>
                        <div style="width:38px;height:38px;border-radius:50%;background:rgba(123,97,255,0.18);
                                    display:flex;align-items:center;justify-content:center;margin-bottom:0.85rem;">
                            <i data-lucide="lightbulb" style="width:18px;height:18px;color:#7b61ff;"></i>
                        </div>
                        <p style="font-size:1rem;font-weight:800;color:#111827;margin-bottom:0.6rem;">Cyber-Tip Hari Ini</p>
                        <p style="font-size:0.82rem;color:#6B7280;font-style:italic;line-height:1.7;margin-bottom:1rem;">
                            "Selalu gunakan Two-Factor Authentication (2FA) pada akun pentingmu. Ini adalah lapisan pertahanan ekstra yang membuat hacker sulit masuk meskipun mereka tahu password-mu."
                        </p>
                        <a href="#" style="display:inline-flex;align-items:center;gap:4px;font-size:0.82rem;font-weight:700;color:#7b61ff;">
                            Pelajari Selengkapnya <i data-lucide="chevron-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>

                    {{-- Leaderboard --}}
                    <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;
                                padding:1.4rem;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                        <p style="font-size:1rem;font-weight:800;color:#111827;margin-bottom:1.25rem;">Leaderboard</p>
                        @php
                        // Fetch top 3 users by XP
                        $topUsers = \App\Models\User::where('role', 'siswa')->orderByDesc('xp')->take(3)->get();
                        $lb = [];
                        $maxLbXp = $topUsers->first() ? max($topUsers->first()->xp, 1) : 1; // avoid div 0
                        foreach($topUsers as $i => $u) {
                            $isMe = $u->id === auth()->id();
                            $color = $isMe ? '#7b61ff' : '#9CA3AF';
                            $pct = round(($u->xp / $maxLbXp) * 100);
                            $name = $isMe ? $u->name . ' (Kamu)' : $u->name;
                            $lb[] = [$i+1, $name, number_format($u->xp).' XP', $pct.'%', $color, $isMe];
                        }
                        @endphp
                        <div style="display:flex;flex-direction:column;gap:0.5rem;">
                            @foreach($lb as $i => $u)
                            <div style="display:flex;align-items:center;gap:0.75rem;padding:0.5rem 0.6rem;
                                        border-radius:0.75rem;{{ $u[5] ? 'background:rgba(123,97,255,0.08);' : '' }}">
                                <span style="font-size:0.8rem;font-weight:700;width:16px;text-align:center;color:{{ $u[4] }};">{{ $u[0] }}</span>
                                <div style="width:30px;height:30px;border-radius:50%;background:#E5E7EB;
                                            display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i data-lucide="user" style="width:14px;height:14px;color:#6B7280;"></i>
                                </div>
                                <div style="flex:1;">
                                    <div style="display:flex;justify-content:space-between;margin-bottom:3px;">
                                        <span style="font-size:0.8rem;font-weight:700;color:#111827;">{{ $u[1] }}</span>
                                        <span style="font-size:0.7rem;font-weight:700;color:#7b61ff;">{{ $u[2] }}</span>
                                    </div>
                                    <div style="background:#E5E7EB;border-radius:9999px;height:4px;">
                                        <div style="background:#7b61ff;height:4px;border-radius:9999px;width:{{ $u[3] }};"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a href="{{ route('leaderboard') }}" style="display:block;text-align:center;text-decoration:none;width:100%;padding:0.7rem;margin-top:1.1rem;font-size:0.8rem;font-weight:700;
                                       color:#6B7280;background:#F9FAFB;border-radius:0.75rem;border:none;cursor:pointer;font-family:inherit;"
                                onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='#F9FAFB'">
                            Lihat Peringkat Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
