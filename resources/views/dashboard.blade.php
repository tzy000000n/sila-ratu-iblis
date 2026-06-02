@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">

    @include('partials.sidebar', ['active' => 'dashboard'])

    {{-- ===== MAIN ===== --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">

        {{-- Header --}}
        <header style="position:sticky; top:0; z-index:20; background:#fff;
                       border-bottom:1px solid #E5E7EB; padding:1rem 1.75rem;
                       display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:8px; background:#F9FAFB;
                        border:1px solid #E5E7EB; border-radius:0.75rem; padding:0.5rem 0.85rem; width:380px;">
                <i data-lucide="search" style="width:16px;height:16px;color:#9CA3AF;flex-shrink:0;"></i>
                <input type="text" placeholder="Cari materi atau simulasi..."
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

        {{-- Content --}}
        <div style="padding:2rem; display:flex; flex-direction:column; gap:2rem;">

            {{-- Banner --}}
            <div style="border-radius:1.25rem; padding:2.5rem;
                        background:linear-gradient(135deg,#7C3AED 0%,#4F46E5 100%);
                        color:#fff; position:relative; overflow:hidden;">
                <div style="position:absolute;right:-8%;top:-60%;width:55%;height:220%;
                            background:rgba(255,255,255,0.07);transform:rotate(15deg);"></div>
                <div style="position:relative;z-index:1;max-width:580px;">
                    <h2 style="font-size:2.25rem;font-weight:800;line-height:1.2;margin-bottom:0.85rem;letter-spacing:-0.02em;">
                        Halo, {{ session('user') ?? 'Siswa' }}! 👋
                    </h2>
                    <p style="font-size:0.975rem;opacity:0.88;margin-bottom:1.5rem;line-height:1.65;">
                        Siap melanjutkan petualanganmu hari ini? Kamu tinggal sedikit lagi menyelesaikan modul <strong>Ethical Hacking 101</strong>.
                    </p>
                    <div style="display:flex;gap:0.75rem;">
                        <button style="display:inline-flex;align-items:center;padding:0.75rem 1.75rem;
                                       border-radius:9999px;font-weight:700;font-size:0.9rem;
                                       background:#fff;color:#7b61ff;border:none;cursor:pointer;
                                       box-shadow:0 4px 16px rgba(0,0,0,0.15);">
                            Lanjut Belajar
                        </button>
                        <button style="display:inline-flex;align-items:center;padding:0.75rem 1.75rem;
                                       border-radius:9999px;font-weight:600;font-size:0.9rem;
                                       background:rgba(255,255,255,0.15);color:#fff;
                                       border:1px solid rgba(255,255,255,0.3);cursor:pointer;">
                            Lihat Roadmap
                        </button>
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
                            <span style="font-size:0.7rem;font-weight:800;padding:0.25rem 0.75rem;
                                         border-radius:9999px;background:#D1FAE5;color:#10B981;">Level: Pro</span>
                        </div>
                        <div style="display:flex;gap:2rem;margin-bottom:1.75rem;">
                            <div>
                                <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-bottom:4px;">MATERI SELESAI</p>
                                <p style="font-size:1.85rem;font-weight:800;color:#7b61ff;">24 <span style="font-size:0.875rem;font-weight:400;color:#9CA3AF;">/32</span></p>
                            </div>
                            <div>
                                <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-bottom:4px;">POIN NEXYRA</p>
                                <p style="font-size:1.85rem;font-weight:800;color:#7b61ff;">1,240</p>
                            </div>
                            <div>
                                <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-bottom:4px;">STREAKS</p>
                                <p style="font-size:1.85rem;font-weight:800;color:#F59E0B;">12 <span style="font-size:0.875rem;font-weight:400;color:#9CA3AF;">Hari</span></p>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.5rem;align-items:flex-end;height:7rem;border-bottom:1px solid #E5E7EB;">
                            @foreach([40,60,80,50,70,100,90] as $h)
                            <div style="flex:1;background:#7b61ff;opacity:{{ $h >= 90 ? '1' : '0.2' }};
                                        height:{{ $h }}%;border-radius:4px 4px 0 0;"></div>
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
                        $cards = [
                            ['book-open','#7b61ff','Materi','Akses perpustakaan modul keamanan siber yang interaktif.','bar','75%'],
                            ['file-question','#F59E0B','Quiz','Uji pengetahuanmu dengan tantangan seru tiap akhir modul.','badge-warning','12 BARU'],
                            ['play-square','#10B981','Simulasi','Praktek langsung di Virtual Lab yang aman dan terisolasi.','badge-success','LAB AKTIF'],
                            ['bar-chart-2','#EF4444','Hasil','Lihat perkembangan skill dan sertifikat yang telah diraih.','badge-danger','LIHAT RAPOR'],
                        ];
                        @endphp
                        @foreach($cards as $c)
                        <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;padding:1.25rem;
                                    display:flex;flex-direction:column;gap:0.5rem;box-shadow:0 2px 8px rgba(0,0,0,0.03);">
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
                        $activities = [
                            ['check-circle','#7b61ff','Selesai: Pengenalan SQL Injection','2 jam yang lalu • Modul Dasar','+50 XP','#10B981'],
                            ['award','#F59E0B','Lencana Baru: Junior Defender','Kemarin • Achievement','Badge','#7b61ff'],
                            ['log-in','#9CA3AF','Login dari Perangkat Baru','2 hari yang lalu • Jakarta, ID','Info','#9CA3AF'],
                        ];
                        @endphp
                        <div style="display:flex;flex-direction:column;gap:0.25rem;">
                            @foreach($activities as $a)
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
                            @endforeach
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
                        <p style="font-size:1rem;font-weight:800;color:#111827;margin-bottom:1.25rem;">Leaderboard Kelas</p>
                        @php
                        $lb = [
                            ['1','Sari Wijaya','2,450 XP','100%','#9CA3AF'],
                            ['2','Raka Pratama (Kamu)','1,240 XP','50%','#7b61ff'],
                            ['3','Budi Santoso','1,120 XP','45%','#7b61ff'],
                        ];
                        @endphp
                        <div style="display:flex;flex-direction:column;gap:0.5rem;">
                            @foreach($lb as $i => $u)
                            <div style="display:flex;align-items:center;gap:0.75rem;padding:0.5rem 0.6rem;
                                        border-radius:0.75rem;{{ $i===1 ? 'background:rgba(123,97,255,0.08);' : '' }}">
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
                        <button style="width:100%;padding:0.7rem;margin-top:1.1rem;font-size:0.8rem;font-weight:700;
                                       color:#6B7280;background:#F9FAFB;border-radius:0.75rem;border:none;cursor:pointer;font-family:inherit;"
                                onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='#F9FAFB'">
                            Lihat Peringkat Lengkap
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
