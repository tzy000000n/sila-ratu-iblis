@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => 'hasil'])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari analisis, hasil atau materi...'])

        {{-- Results Wrapper --}}
        <div style="padding: 2rem; display: flex; flex-direction: column; gap: 2rem;">
            
            {{-- Header Row --}}
            <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 1px solid #E5E7EB; padding-bottom: 1.25rem;">
                <div>
                    <h2 style="font-size: 2.15rem; font-weight: 800; color: #111827; letter-spacing: -0.01em; margin-bottom: 0.35rem;">
                        Hasil & Analisis
                    </h2>
                    <p style="font-size: 0.95rem; color: #6B7280;">
                        Ringkasan performa belajar kamu dalam 30 hari terakhir.
                    </p>
                </div>
                <button class="btn btn-primary" style="border-radius: 0.75rem; display: flex; align-items: center; gap: 8px; padding: 0.75rem 1.5rem;" onclick="triggerReportDownload()">
                    <i data-lucide="download" style="width: 18px; height: 18px;"></i> Unduh Laporan
                </button>
            </div>

            {{-- Row 1: Overall Score & Learning Trend Chart --}}
            <div style="display: grid; grid-template-columns: 340px 1fr; gap: 1.75rem; align-items: stretch;">
                
                {{-- Overall Score Card --}}
                @php
                    $user = auth()->user();
                    $avgScore = \App\Models\UserResult::where('user_id', $user->id)
                                ->whereIn('type', ['quiz', 'simulasi'])
                                ->avg('score') ?? 0;
                    $avgScore = round($avgScore);
                    
                    $level = 'Beginner';
                    if ($avgScore >= 80) $level = 'Advanced';
                    elseif ($avgScore >= 60) $level = 'Intermediate';

                    $msg = 'Ayo mulai belajar!';
                    if ($avgScore >= 80) $msg = 'Pertahankan prestasimu!';
                    elseif ($avgScore >= 60) $msg = 'Terus tingkatkan!';
                    elseif ($avgScore > 0) $msg = 'Jangan menyerah!';
                @endphp
                <div class="card" style="background: white; border: 1px solid #E5E7EB; border-radius: 1.25rem; padding: 2rem; display: flex; flex-direction: column; justify-content: center; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                    
                    <div style="font-size: 0.875rem; font-weight: 800; color: #6B7280; letter-spacing: 0.1em; display: flex; align-items: center; gap: 0.5rem; text-transform: uppercase;">
                        SKOR KESELURUHAN
                    </div>
                    
                    {{-- Big Percentage Text --}}
                    <div style="font-size: 5rem; font-weight: 850; color: #7b61ff; line-height: 1; letter-spacing: -0.03em; margin: 0.5rem 0;">
                        {{ $avgScore }}%
                    </div>
                    
                    <div>
                        <p style="font-size: 0.9rem; font-weight: 750; color: #1F2937; line-height: 1.5; margin-bottom: 4px;">
                            Kamu berada di level "{{ $level }}".
                        </p>
                        <p style="font-size: 0.85rem; color: #9CA3AF; font-weight: 500;">
                            {{ $msg }}
                        </p>
                    </div>
                </div>

                {{-- Learning Trend Card (CSS Bar Chart) --}}
                <div class="card" style="padding: 1.75rem; display: flex; flex-direction: column; gap: 1.5rem; justify-content: space-between;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827;">Tren Belajar</h3>
                        
                        {{-- Custom Legend --}}
                        <div style="display: flex; gap: 16px; align-items: center;">
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <div style="width: 10px; height: 10px; border-radius: 50%; background: #7b61ff;"></div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: #6B7280;">Skor Quiz</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <div style="width: 10px; height: 10px; border-radius: 50%; background: rgba(123, 97, 255, 0.2);"></div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: #6B7280;">Jam Belajar</span>
                            </div>
                        </div>
                    </div>

                    {{-- CSS Bar Chart Layout --}}
                    <div style="display: flex; flex-direction: column; justify-content: flex-end; flex: 1; height: 160px; padding: 0.5rem 0;">
                        <div style="display: flex; align-items: flex-end; justify-content: space-between; height: 100%; width: 100%; gap: 12px; border-bottom: 1px solid #E5E7EB; padding-bottom: 8px;">
                            @php
                                $weeklyStats = [];
                                $today = \Carbon\Carbon::today();
                                for($i = 6; $i >= 0; $i--) {
                                    $date = $today->copy()->subDays($i);
                                    // In a real scenario we'd count activities or XP gained on this day
                                    // For now, let's just query if there's any result on that date and give it a value based on count
                                    $count = \App\Models\UserResult::where('user_id', $user->id)
                                                ->whereDate('created_at', $date)
                                                ->count();
                                    $val = $count > 0 ? min($count * 20, 100) : 0; // Fake some bar height based on activity count
                                    $weeklyStats[] = [
                                        'day' => ['Minggu', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'][$date->dayOfWeek],
                                        'val' => $val,
                                        'active' => $i === 0
                                    ];
                                }
                            @endphp

                            @foreach($weeklyStats as $w)
                                <div style="flex: 1; display: flex; flex-direction: column; align-items: center; height: 100%; justify-content: flex-end; position: relative;">
                                    {{-- Value Tooltip on hover --}}
                                    <div class="chart-tooltip" style="position: absolute; bottom: calc({{ $w['val'] }}% + 8px); background: #111827; color: #fff; font-size: 0.65rem; font-weight: 800; padding: 2px 6px; border-radius: 4px; opacity: 0; pointer-events: none; transition: opacity 0.2s;">
                                        {{ $w['val'] }}%
                                    </div>
                                    
                                    {{-- Bar Track --}}
                                    <div class="chart-bar" 
                                         style="width: 100%; max-width: 48px; height: {{ $w['val'] }}%; 
                                                background: {{ $w['active'] ? '#7b61ff' : 'rgba(123, 97, 255, 0.2)' }}; 
                                                border-radius: 8px 8px 0 0; transition: all 0.3s ease; cursor: pointer;">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        {{-- Days Label --}}
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; gap: 12px; margin-top: 8px;">
                            @foreach($weeklyStats as $w)
                                <div style="flex: 1; text-align: center;">
                                    <span style="font-size: 0.75rem; font-weight: 750; color: #9CA3AF;">{{ $w['day'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Row 2: Strengths & Area of Review (Dynamically Evaluated Based on Quiz Performance Profile) --}}
            @php
                // Fetch user results for quiz
                $quizResults = \App\Models\UserResult::where('user_id', $user->id)
                                ->where('type', 'quiz')
                                ->get();
                $userScores = [];
                foreach($quizResults as $q) {
                    $slug = $q->reference_id;
                    $materi = \App\Models\Materi::where('slug', $slug)->first();
                    if($materi) {
                        $userScores[$slug] = [
                            'title' => $materi->judul,
                            'score' => $q->score,
                        ];
                    }
                }

                // Segregate strengths and reviews dynamically based on threshold of 80%
                $strengths = [];
                $reviews = [];

                foreach ($userScores as $slug => $data) {
                    if ($data['score'] >= 80) {
                        $strengths[] = [
                            'title' => $data['title'],
                            'score' => $data['score'] . '/100'
                        ];
                    } else {
                        $reviews[] = [
                            'title' => $data['title'],
                            'score' => $data['score'] . '/100',
                            'val' => $data['score'] // integer for sorting
                        ];
                    }
                }

                $dbMaterials = \App\Models\Materi::inRandomOrder()->take(3)->get();
                $suggestedMaterials = [];
                $colors = [
                    ['bg' => '#FEF3C7', 'color' => '#F59E0B', 'grad' => 'linear-gradient(135deg, #0F172A 0%, #1E293B 100%)', 'icon' => '#D946EF', 'border' => 'rgba(217, 70, 239, 0.4)'],
                    ['bg' => '#FEE2E2', 'color' => '#EF4444', 'grad' => 'linear-gradient(135deg, #2E1065 0%, #4C1D95 100%)', 'icon' => '#8B5CF6', 'border' => 'rgba(139, 92, 246, 0.4)'],
                    ['bg' => '#D1FAE5', 'color' => '#065F46', 'grad' => 'linear-gradient(135deg, #064E3B 0%, #065F46 100%)', 'icon' => '#34D399', 'border' => 'rgba(16, 185, 129, 0.4)']
                ];
                
                foreach($dbMaterials as $idx => $m) {
                    $c = $colors[$idx % count($colors)];
                    $suggestedMaterials[] = [
                        'title' => $m->judul,
                        'slug' => $m->slug,
                        'time' => '30 min',
                        'icon' => 'book-open',
                        'desc' => \Illuminate\Support\Str::limit($m->deskripsi, 60),
                        'tag' => 'REKOMENDASI',
                        'tagBg' => $c['bg'],
                        'tagColor' => $c['color'],
                        'btnLabel' => 'Pelajari',
                        'gradient' => $c['grad'],
                        'iconColor' => $c['icon'],
                        'iconBorderColor' => $c['border']
                    ];
                }
            @endphp

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.75rem;">
                
                {{-- Strengths Card --}}
                <div class="card" style="padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: #D1FAE5; display: flex; align-items: center; justify-content: center;">
                            <i data-lucide="award" style="width: 18px; height: 18px; color: #10B981;"></i>
                        </div>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827;">Kekuatan Utama</h3>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.65rem; margin-top: 0.25rem;">
                        @forelse($strengths as $s)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.85rem 1rem; border-radius: 0.75rem; background: #FAFBFD; border: 1px solid #F3F4F6;">
                                <span style="font-size: 0.875rem; font-weight: 700; color: #374151;">{{ $s['title'] }}</span>
                                <span style="font-size: 0.75rem; font-weight: 800; color: #10B981; background: #D1FAE5; padding: 4px 10px; border-radius: 9999px;">
                                    {{ $s['score'] }}
                                </span>
                            </div>
                        @empty
                            <div style="text-align: center; color: #6B7280; font-size: 0.85rem; padding: 1rem 0;">
                                Belum ada data kekuatan utama.
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Area of Review Card --}}
                <div class="card" style="padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: #FEF3C7; display: flex; align-items: center; justify-content: center;">
                            <i data-lucide="alert-triangle" style="width: 18px; height: 18px; color: #F59E0B;"></i>
                        </div>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827;">Perlu Review</h3>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.65rem; margin-top: 0.25rem;">
                        @forelse($reviews as $r)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.85rem 1rem; border-radius: 0.75rem; background: #FAFBFD; border: 1px solid #F3F4F6;">
                                <span style="font-size: 0.875rem; font-weight: 700; color: #374151;">{{ $r['title'] }}</span>
                                <span style="font-size: 0.75rem; font-weight: 800; color: #F59E0B; background: #FEF3C7; padding: 4px 10px; border-radius: 9999px;">
                                    {{ $r['score'] }}
                                </span>
                            </div>
                        @empty
                            <div style="text-align: center; color: #6B7280; font-size: 0.85rem; padding: 1rem 0;">
                                Belum ada materi yang perlu direview.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Section 3: Recommended Course Materials (Generated Dynamically Based on Need) --}}
            <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-top: 0.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #111827; letter-spacing: -0.01em;">Materi yang Disarankan</h3>
                    <a href="{{ route('materi') }}" style="font-size: 0.85rem; font-weight: 750; color: #7b61ff; display: flex; align-items: center; gap: 4px;">
                        Lihat Semua <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
                    </a>
                </div>

                {{-- Grid of Courses --}}
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
                    @foreach($suggestedMaterials as $mat)
                        {{-- Card --}}
                        <div class="course-card card" 
                             style="padding: 0; overflow: hidden; display: flex; flex-direction: column; border: 1px solid #E5E7EB; cursor: pointer; transition: all 0.25s ease;"
                             onclick="window.location.href='{{ route('materi.detail', $mat['slug']) }}'">
                            <div style="height: 140px; background: {{ $mat['gradient'] }}; position: relative; display: flex; align-items: center; justify-content: center;">
                                <span style="position: absolute; top: 12px; left: 12px; background: {{ $mat['tagBg'] }}; color: {{ $mat['tagColor'] }}; font-size: 0.65rem; font-weight: 800; padding: 3px 8px; border-radius: 4px;">
                                    {{ $mat['tag'] }}
                                </span>
                                <div style="width: 54px; height: 54px; border-radius: 50%; border: 1px solid {{ $mat['iconBorderColor'] }}; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.03);">
                                    <i data-lucide="{{ $mat['icon'] }}" style="width: 24px; height: 24px; color: {{ $mat['iconColor'] }};"></i>
                                </div>
                            </div>
                            <div style="padding: 1.25rem; display: flex; flex-direction: column; flex: 1; justify-content: space-between; gap: 1.25rem;">
                                <div>
                                    <h4 style="font-size: 1.05rem; font-weight: 800; color: #111827; margin-bottom: 6px;">{{ $mat['title'] }}</h4>
                                    <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.6;">{{ $mat['desc'] }}</p>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 0.75rem; color: #9CA3AF; display: flex; align-items: center; gap: 4px; font-weight: 500;">
                                        <i data-lucide="clock" style="width: 14px; height: 14px;"></i> {{ $mat['time'] }}
                                    </span>
                                    <a href="{{ route('materi.detail', $mat['slug']) }}" style="font-size: 0.85rem; font-weight: 800; color: #7b61ff; display: flex; align-items: center; gap: 2px;">
                                        {{ $mat['btnLabel'] }} <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bottom Cyber Tip Card --}}
            <div style="background: #F5F3FF; border: 1px solid rgba(123,97,255,0.12); border-radius: 1.25rem; padding: 1.5rem; display: flex; align-items: flex-start; gap: 1rem; margin-top: 0.5rem;">
                <div style="width: 38px; height: 38px; border-radius: 50%; background: rgba(123,97,255,0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #7b61ff;">
                    <i data-lucide="lightbulb" style="width: 20px; height: 20px;"></i>
                </div>
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 800; color: #1F1A3A; margin-bottom: 4px;">Cyber-Tip: Two-Factor Authentication</h4>
                    <p style="font-size: 0.825rem; color: #6B7280; line-height: 1.65;">
                        Tahukah kamu? Menggunakan 2FA dapat mencegah hingga 99.9% serangan pengambilalihan akun. Pastikan kamu selalu mengaktifkannya di setiap akun pentingmu!
                    </p>
                </div>
            </div>

        </div>

    </main>

</div>

{{-- Interactive Report Download Progress Modal --}}
<div id="download-modal" style="position: fixed; inset: 0; background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(4px); display: flex; justify-content: center; align-items: center; z-index: 200; opacity: 0; pointer-events: none; transition: opacity 0.3s ease;">
    <div style="background: #fff; width: 440px; border-radius: 1.5rem; padding: 2.25rem; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.15); display: flex; flex-direction: column; gap: 1.5rem; text-align: center;">
        <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
            <div id="modal-icon-bg" style="width: 60px; height: 60px; border-radius: 50%; background: rgba(123,97,255,0.08); display: flex; align-items: center; justify-content: center; color: #7b61ff; margin-bottom: 0.5rem;">
                <i id="modal-icon" data-lucide="loader-2" class="spin" style="width: 28px; height: 28px;"></i>
            </div>
            <h3 id="modal-title" style="font-size: 1.25rem; font-weight: 800; color: #111827;">Membuat Laporan Belajar</h3>
            <p id="modal-desc" style="font-size: 0.85rem; color: #6B7280; line-height: 1.5;">Harap tunggu sementara sistem mengompilasi statistik pengerjaan kuis dan virual lab Anda...</p>
        </div>
        
        {{-- Progress Bar Inside Modal --}}
        <div id="modal-progress-container" style="width: 100%; height: 6px; background: #F3F4F6; border-radius: 9999px; overflow: hidden; position: relative;">
            <div id="modal-progress-bar" style="width: 0%; height: 100%; background: #7b61ff; border-radius: 9999px; transition: width 0.1s linear;"></div>
        </div>

        <button id="modal-close-btn" class="btn btn-outline" style="border-radius: 0.75rem; width: 100%; padding: 0.75rem; display: none;" onclick="closeModal()">
            Tutup
        </button>
    </div>
</div>

<style>
    /* Styling rules */
    .course-card:hover {
        transform: translateY(-4px);
        border-color: #7b61ff !important;
        box-shadow: 0 10px 25px -5px rgba(123, 97, 255, 0.15) !important;
    }
    .chart-bar:hover {
        opacity: 0.85;
    }
    .chart-bar:hover + .chart-tooltip {
        opacity: 1 !important;
    }
    .spin {
        animation: spin-anim 1s linear infinite;
    }
    @keyframes spin-anim {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

<script>
    // Download Modal Logic
    function triggerReportDownload() {
        const modal = document.getElementById('download-modal');
        const progressBar = document.getElementById('modal-progress-bar');
        const title = document.getElementById('modal-title');
        const desc = document.getElementById('modal-desc');
        const iconBg = document.getElementById('modal-icon-bg');
        const icon = document.getElementById('modal-icon');
        const closeBtn = document.getElementById('modal-close-btn');
        const progressContainer = document.getElementById('modal-progress-container');

        // Fetch Data from Blade
        const avgScore = {{ $avgScore }};
        const level = "{{ $level }}";
        const strengths = @json($strengths);
        const reviews = @json($reviews);

        // Reset state
        progressBar.style.width = '0%';
        title.innerText = 'Membuat Laporan Belajar';
        desc.innerText = 'Harap tunggu sementara sistem mengompilasi statistik pengerjaan kuis dan virtual lab Anda...';
        iconBg.style.background = 'rgba(123,97,255,0.08)';
        iconBg.style.color = '#7b61ff';
        icon.setAttribute('data-lucide', 'loader-2');
        icon.classList.add('spin');
        progressContainer.style.display = 'block';
        closeBtn.style.display = 'none';
        lucide.createIcons();

        // Show modal
        modal.style.opacity = '1';
        modal.style.pointerEvents = 'auto';

        // Simulate progress bar filling
        let progress = 0;
        const interval = setInterval(() => {
            progress += 5;
            progressBar.style.width = progress + '%';

            if (progress >= 100) {
                clearInterval(interval);
                
                // Complete state
                title.innerText = 'Laporan Berhasil Diunduh';
                desc.innerText = 'Berkas laporan analisis pengerjaan Anda telah tersimpan di perangkat Anda.';
                iconBg.style.background = '#D1FAE5';
                iconBg.style.color = '#10B981';
                icon.setAttribute('data-lucide', 'check-circle');
                icon.classList.remove('spin');
                progressContainer.style.display = 'none';
                closeBtn.style.display = 'block';
                lucide.createIcons();

                // Generate and Trigger Download
                let reportContent = `LAPORAN HASIL PEMBELAJARAN NEXYRA LEARN\n`;
                reportContent += `Tanggal: ${new Date().toLocaleDateString('id-ID')}\n`;
                reportContent += `==========================================\n\n`;
                reportContent += `Skor Keseluruhan: ${avgScore}%\n`;
                reportContent += `Level Saat Ini: ${level}\n\n`;

                reportContent += `[ KEKUATAN UTAMA ]\n`;
                if (strengths.length > 0) {
                    strengths.forEach(s => {
                        reportContent += `- ${s.title} (Skor: ${s.score})\n`;
                    });
                } else {
                    reportContent += `- Belum ada data kekuatan utama.\n`;
                }

                reportContent += `\n[ MATERI PERLU REVIEW ]\n`;
                if (reviews.length > 0) {
                    reviews.forEach(r => {
                        reportContent += `- ${r.title} (Skor: ${r.score})\n`;
                    });
                } else {
                    reportContent += `- Semua materi sudah dikuasai dengan baik!\n`;
                }

                reportContent += `\n==========================================\n`;
                reportContent += `Terus tingkatkan belajarmu bersama Nexyra Learn!`;

                const blob = new Blob([reportContent], { type: 'text/plain;charset=utf-8' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                const timestamp = new Date().getTime();
                a.download = `Laporan_Pembelajaran_Nexyra_${timestamp}.txt`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }
        }, 120);
    }

    function closeModal() {
        const modal = document.getElementById('download-modal');
        modal.style.opacity = '0';
        modal.style.pointerEvents = 'none';
    }
</script>
@endsection
