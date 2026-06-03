@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => 'simulasi'])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        <header style="position:sticky; top:0; z-index:20; background:#fff; border-bottom:1px solid #E5E7EB; padding:1rem 1.75rem; display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:12px;">
                <a href="{{ route('simulasi') }}" style="width: 36px; height: 36px; border-radius: 50%; background: #F3F4F6; display: flex; align-items: center; justify-content: center; color: #4B5563; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#E5E7EB'" onmouseout="this.style.background='#F3F4F6'">
                    <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
                </a>
                <div>
                    <h1 style="font-size: 1.1rem; font-weight: 800; color: #111827; letter-spacing: -0.01em;">Lab: {{ $materi->judul }}</h1>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 0.75rem; color: #6B7280; margin-top: 2px;">
                        <span>Modul {{ $materi->kategori }}</span>
                    </div>
                </div>
            </div>
            
            <div style="display:flex; align-items:center; gap:1.5rem;">
                <a href="{{ route('profile') }}" style="display:flex; align-items:center; gap:12px; text-decoration: none;">
                    <div style="text-align:right;">
                        <p style="font-size:0.875rem; font-weight:700; color:#111827;">{{ auth()->user()->name ?? 'User' }}</p>
                        <p style="font-size:0.65rem; font-weight:700; color:#9CA3AF; text-transform: uppercase;">{{ auth()->user()->role ?? 'Siswa' }}</p>
                    </div>
                    <div style="width:40px; height:40px; border-radius:0.75rem; background:#8B5CF6; display:flex; align-items:center; justify-content:center;">
                        <i data-lucide="user" style="width:22px;height:22px;color:#fff;"></i>
                    </div>
                </a>
            </div>
        </header>

        {{-- Simulation Wrapper --}}
        <div style="padding: 2rem; display: flex; flex-direction: column; gap: 1.5rem;">
            
            {{-- Top Header Block --}}
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="max-width: 65%;">
                    <div style="width: fit-content; background: rgba(123,97,255,0.08); border: 1px solid rgba(123,97,255,0.15); padding: 4px 12px; border-radius: 9999px; display: flex; align-items: center; gap: 6px; margin-bottom: 0.85rem;">
                        <i data-lucide="shield" style="width: 13px; height: 13px; color: #7b61ff;"></i>
                        <span style="font-size: 0.65rem; font-weight: 800; color: #7b61ff; letter-spacing: 0.05em; text-transform: uppercase;">MODUL: {{ $materi->kategori }}</span>
                    </div>
                    <h2 id="case-title" style="font-size: 2.15rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; letter-spacing: -0.01em;">
                        {{ $materi->simulasiKasus->title }}
                    </h2>
                    <p id="case-description" style="font-size: 0.95rem; color: #6B7280; line-height: 1.6;">
                        {{ $materi->simulasiKasus->description }}
                    </p>
                </div>
                
                {{-- Countdown Timer --}}
                <div style="background: #fff; border: 1px solid #E5E7EB; border-radius: 1rem; padding: 0.75rem 1.25rem; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.02); min-width: 160px;">
                    <div style="width: 38px; height: 38px; border-radius: 50%; background: #FEF3C7; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="clock" style="width: 18px; height: 18px; color: #F59E0B;"></i>
                    </div>
                    <div>
                        <p style="font-size: 0.6rem; font-weight: 800; color: #9CA3AF; letter-spacing: 0.05em; margin-bottom: 2px;">WAKTU TERSISA</p>
                        <p id="sim-timer" style="font-size: 1.25rem; font-weight: 800; color: #111827; line-height: 1;">04:12</p>
                    </div>
                </div>
            </div>

            {{-- Two Columns Layout --}}
            <div style="display: grid; grid-template-columns: 1fr 400px; gap: 2rem; margin-top: 0.5rem; align-items: flex-start;">
                
                {{-- Left: Email / Scenario Card --}}
                <div style="background: #fff; border: 1px solid #E5E7EB; border-radius: 1.25rem; padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    
                    {{-- Simulated Email Client Header --}}
                    <div style="border-bottom: 1px solid #E5E7EB; padding: 1.25rem 1.75rem; background: #FAFBFD; display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #EFF6FF; display: flex; align-items: center; justify-content: center; border: 1px solid #DBEAFE;">
                                <i data-lucide="mail" style="width: 18px; height: 18px; color: #3B82F6;"></i>
                            </div>
                            <div>
                                <h4 id="email-sender-name" style="font-size: 0.95rem; font-weight: 800; color: #1F2937;">{{ $materi->simulasiKasus->sender_name }}</h4>
                                <p style="font-size: 0.75rem; color: #9CA3AF; display: flex; align-items: center; gap: 4px;">
                                    <span id="email-sender-address" class="phish-indicator" title="Perhatikan domain pengirim secara teliti." style="font-weight: 600; color: #4B5563; border-bottom: 1px dashed transparent; transition: all 0.2s;">{{ $materi->simulasiKasus->sender_address }}</span>
                                </p>
                            </div>
                        </div>
                        <span style="font-size: 0.75rem; font-weight: 700; color: #9CA3AF;">Baru Saja</span>
                    </div>

                    {{-- Email Subject --}}
                    <div style="padding: 1.25rem 1.75rem; border-bottom: 1px solid #F3F4F6;">
                        <h3 id="email-subject" style="font-size: 1.25rem; font-weight: 800; color: #111827; letter-spacing: -0.01em;">
                            {{ $materi->simulasiKasus->subject }}
                        </h3>
                    </div>

                    {{-- Email Body --}}
                    <div style="padding: 2rem 2.25rem; background: #fff; display: flex; flex-direction: column; gap: 1.5rem; color: #374151; font-size: 0.925rem; line-height: 1.7; position: relative;">
                        
                        {{-- Hover Info Info --}}
                        <div style="position: absolute; right: 2rem; top: 1.5rem; color: #9CA3AF; cursor: help;" title="Arahkan kursor Anda ke area email untuk menemukan tanda bahaya!">
                            <i data-lucide="info" style="width: 18px; height: 18px;"></i>
                        </div>

                        <div id="email-body-text" style="display: flex; flex-direction: column; gap: 1.25rem;">
                            {!! $materi->simulasiKasus->body !!}
                        </div>

                        {{-- Action Button --}}
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1rem 0; gap: 10px;">
                            <a href="javascript:void(0)" class="phish-indicator" title="Peringatan: Verifikasi kemana tautan/tombol ini mengarah!"
                               style="display: inline-flex; align-items: center; justify-content: center; padding: 0.85rem 2.5rem; background: #7b61ff; color: white; border-radius: 0.75rem; font-weight: 700; font-size: 0.95rem; box-shadow: 0 4px 15px rgba(123,97,255,0.25); text-decoration: none; transition: all 0.2s;">
                                {{ $materi->simulasiKasus->action_text }}
                            </a>
                            <span style="font-size: 0.75rem; color: #9CA3AF;">{{ $materi->simulasiKasus->action_subtext }}</span>
                        </div>

                        {{-- Disclaimers & Sign-off --}}
                        <blockquote id="email-quote" style="border-left: 3px solid #E5E7EB; padding-left: 1.25rem; margin: 0.5rem 0; font-style: italic; color: #6B7280; font-size: 0.85rem;">
                            {!! $materi->simulasiKasus->quote !!}
                        </blockquote>

                        <div id="email-signoff" style="margin-top: 0.5rem; font-size: 0.9rem;">
                            {!! $materi->simulasiKasus->signoff !!}
                        </div>
                    </div>
                </div>

                {{-- Right: Actions & Tips Panel --}}
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    {{-- Action Card --}}
                    <div style="background: #fff; border: 1px solid #E5E7EB; border-radius: 1.25rem; padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                        <div>
                            <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin-bottom: 6px;">Apa tindakanmu?</h3>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">
                                Pilih salah satu tindakan di bawah ini untuk merespon skenario di samping.
                            </p>
                        </div>

                        {{-- Interactive Options --}}
                        <div id="action-container" style="display: flex; flex-direction: column; gap: 0.85rem;">
                            @php
                                $options = json_decode($materi->simulasiKasus->options, true);
                            @endphp
                            @foreach($options as $idx => $ans)
                            @php
                                $bgColors = ['#D1FAE5', '#FEE2E2', '#EFF6FF'];
                                $iconColors = ['#10B981', '#EF4444', '#3B82F6'];
                                $icons = ['shield-check', 'link-2', 'at-sign'];
                            @endphp
                            <div id="action-{{ $idx }}" class="sim-action-card" onclick="selectAction({{ $idx }}, {{ $ans['id'] }})"
                                 style="display: flex; align-items: center; gap: 16px; padding: 1.1rem; border-radius: 1rem; border: 1px solid #E5E7EB; background: #fff; cursor: pointer; transition: all 0.25s ease;">
                                <div style="width: 42px; height: 42px; border-radius: 0.75rem; background: {{ $bgColors[$idx % 3] }}; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i data-lucide="{{ $icons[$idx % 3] }}" style="width: 20px; height: 20px; color: {{ $iconColors[$idx % 3] }};"></i>
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="font-size: 0.9rem; font-weight: 800; color: #111827;">{{ $ans['text'] }}</h4>
                                    <p style="font-size: 0.75rem; color: #6B7280; margin-top: 2px;">{{ $ans['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Dynamic Cyber-Tip Card --}}
                    <div id="tip-container" style="background: #F5F3FF; border: 1px solid rgba(123,97,255,0.15); border-radius: 1rem; padding: 1.5rem; display: flex; align-items: flex-start; gap: 12px; transition: all 0.3s ease;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(123,97,255,0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #7b61ff;">
                            <i data-lucide="lightbulb" style="width: 16px; height: 16px;"></i>
                        </div>
                        <div>
                            <p style="font-size: 0.85rem; font-weight: 800; color: #1F1A3A; margin-bottom: 4px;">Cyber-Tip</p>
                            <p id="tip-text" style="font-size: 0.78rem; color: #6B7280; line-height: 1.6;">
                                {!! $materi->simulasiKasus->tip !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Bottom Progress and Navigation Bar --}}
            <div style="border-top: 1px solid #E5E7EB; padding-top: 1.5rem; display: flex; justify-content: flex-end; align-items: center; margin-top: 1rem;">
                {{-- Action Buttons --}}
                <div style="display: flex; align-items: center; gap: 1.5rem;">
                    <a href="{{ route('simulasi') }}" style="color: #9CA3AF; font-size: 0.9rem; font-weight: 800; background: transparent; padding: 0.75rem 1.25rem; text-decoration:none;" onmouseover="this.style.color='#6B7280'" onmouseout="this.style.color='#9CA3AF'">
                        KEMBALI KE DAFTAR
                    </a>
                    <button id="btn-submit-action" style="border-radius: 0.75rem; padding: 0.75rem 2rem; display: flex; align-items: center; gap: 8px; background: #7b61ff; color:#fff; border:none; font-weight:800; font-family:inherit; cursor:pointer;" onclick="submitAnswer()">
                        KIRIM JAWABAN <i data-lucide="arrow-right" style="width: 18px; height: 18px;"></i>
                    </button>
                </div>
            </div>

        </div>
    </main>
</div>

<style>
    .phish-indicator {
        position: relative;
        cursor: help;
    }
    .phish-indicator:hover {
        background: #FEE2E2 !important;
        color: #EF4444 !important;
        border-radius: 4px;
        box-shadow: 0 0 8px rgba(239, 68, 68, 0.2);
    }
    .sim-action-card:hover {
        border-color: #7b61ff !important;
        background: rgba(123,97,255,0.01) !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.02);
    }
</style>

<script>
    const optionsData = {!! $materi->simulasiKasus->options !!};
    const materiId = {{ $materi->id }};
    
    let selectedAnswerId = null;

    window.addEventListener('DOMContentLoaded', () => {
        startTimer(4, 12);
    });

    function selectAction(idx, ansId) {
        selectedAnswerId = ansId;
        
        // Reset all borders
        const cards = document.querySelectorAll('.sim-action-card');
        cards.forEach(c => {
            c.style.border = '1px solid #E5E7EB';
            c.style.background = '#fff';
            c.style.boxShadow = 'none';
        });

        // Select the active card
        const selected = document.getElementById(`action-${idx}`);
        let glowColor = 'rgba(59, 130, 246, 0.15)'; // Blue
        let borderColor = '#3B82F6';

        if (idx === 0) {
            glowColor = 'rgba(16, 185, 129, 0.15)'; // Green
            borderColor = '#10B981';
        } else if (idx === 1) {
            glowColor = 'rgba(239, 68, 68, 0.15)'; // Red
            borderColor = '#EF4444';
        }

        selected.style.border = `2px solid ${borderColor}`;
        selected.style.background = glowColor.replace('0.15', '0.02');
        selected.style.boxShadow = `0 4px 15px ${glowColor}`;

        // Feedback
        const selectedObj = optionsData.find(a => a.id === ansId);
        const tipContainer = document.getElementById('tip-container');
        if (selectedObj.isCorrect) {
            tipContainer.style.background = '#ECFDF5';
            tipContainer.style.borderColor = '#10B981';
            document.getElementById('tip-text').innerHTML = `<strong>Tepat sekali!</strong> ${selectedObj.feedback}`;
        } else {
            tipContainer.style.background = idx === 1 ? '#FEF2F2' : '#F0F9FF';
            tipContainer.style.borderColor = idx === 1 ? '#EF4444' : '#3B82F6';
            document.getElementById('tip-text').innerHTML = `<strong>${idx === 1 ? 'Bahaya!' : 'Analisis Menarik!'}</strong> ${selectedObj.feedback}`;
        }
    }

    function submitAnswer() {
        if (selectedAnswerId === null) {
            alert("Harap pilih salah satu tindakan Anda terlebih dahulu untuk merespon kasus ini!");
            return;
        }

        const selectedChoice = optionsData.find(a => a.id === selectedAnswerId);

        if (selectedChoice.isCorrect) {
            alert("Jawaban Benar! Anda berhasil menyelesaikan simulasi kasus ini dengan sempurna.");
            finishLab(100);
        } else {
            alert("Jawaban Anda Salah/Berbahaya. Silakan pelajari ulang cyber-tip dan coba lagi.");
        }
    }

    function finishLab(score) {
        fetch("{{ route('save.result') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                type: "simulasi",
                reference_id: materiId,
                score: score,
                max_score: 100
            })
        }).then(() => {
            window.location.href = "{{ route('simulasi') }}";
        });
    }

    let totalSeconds = 0;
    let timerInterval = null;

    function startTimer(min, sec) {
        totalSeconds = (min * 60) + sec;
        timerInterval = setInterval(() => {
            if (totalSeconds <= 0) {
                clearInterval(timerInterval);
                alert("Waktu simulasi kasus habis!");
                finishLab(0);
                return;
            }
            totalSeconds--;
            const m = Math.floor(totalSeconds / 60).toString().padStart(2, '0');
            const s = (totalSeconds % 60).toString().padStart(2, '0');
            document.getElementById('sim-timer').innerText = `${m}:${s}`;
        }, 1000);
    }
</script>
@endsection
