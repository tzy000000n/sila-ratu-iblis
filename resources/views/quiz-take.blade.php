@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => 'quiz'])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari materi, quiz atau simulasi...'])

        {{-- Quiz Wrapper --}}
        <div style="padding: 2rem; display: flex; flex-direction: column; gap: 1.5rem;">
            
            {{-- Breadcrumb and Module Title --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #E5E7EB; padding-bottom: 1rem;">
                <div>
                    <h2 style="font-size: 1.85rem; font-weight: 800; color: #111827; margin-bottom: 4px;">{{ isset($materi) ? $materi->judul : 'Fundamen Keamanan Siber' }}</h2>
                    <p style="font-size: 0.9rem; color: #6B7280; font-weight: 500;">{{ isset($materi) ? 'Kategori: ' . $materi->kategori : 'Modul 1: Pengenalan Ancaman Digital' }}</p>
                </div>
                <div style="text-align: right; display: flex; flex-direction: column; align-items: flex-end; gap: 8px;">
                    <span style="font-size: 0.75rem; font-weight: 800; color: #7b61ff; background: rgba(123,97,255,0.1); padding: 4px 12px; border-radius: 9999px; letter-spacing: 0.05em;">SEDANG BERLANGSUNG</span>
                    <p style="font-size: 1.15rem; font-weight: 800; color: #111827;">Pertanyaan <span id="current-question-num" style="color: #7b61ff;">1</span> / <span id="total-questions-num">5</span></p>
                </div>
            </div>

            {{-- Progress Bar --}}
            <div style="width: 100%; height: 6px; background: #E5E7EB; border-radius: 9999px; overflow: hidden; margin-top: -0.5rem;">
                <div id="quiz-progress" style="width: 30%; height: 100%; background: #7b61ff; transition: width 0.3s ease; border-radius: 9999px;"></div>
            </div>

            {{-- Grid Columns --}}
            <div style="display: grid; grid-template-columns: 1fr 340px; gap: 2rem; margin-top: 0.5rem; align-items: flex-start;">
                
                {{-- Left Side: Question and Options --}}
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    {{-- Question Card --}}
                    <div class="card" style="padding: 2.25rem; display: flex; flex-direction: column; gap: 1.5rem; position: relative;">
                        
                        {{-- Question Type Badge --}}
                        <div style="width: fit-content; background: rgba(123,97,255,0.08); border: 1px solid rgba(123,97,255,0.15); padding: 4px 12px; border-radius: 6px; display: flex; align-items: center; gap: 6px;">
                            <span id="question-index-badge" style="font-size: 0.75rem; font-weight: 800; color: #7b61ff;">3</span>
                            <span style="font-size: 0.7rem; font-weight: 700; color: #7b61ff; letter-spacing: 0.08em;">PILIHAN GANDA</span>
                        </div>

                        {{-- Question Text --}}
                        <h3 id="question-text" style="font-size: 1.25rem; font-weight: 800; color: #111827; line-height: 1.5;">
                            Manakah dari pilihan berikut yang merupakan contoh serangan 'Social Engineering' yang paling umum terjadi di media sosial?
                        </h3>

                        {{-- Options List --}}
                        <div id="options-container" style="display: flex; flex-direction: column; gap: 0.85rem;">
                            <!-- Will be rendered dynamically via JavaScript -->
                        </div>
                    </div>

                    {{-- Cyber Tip Card --}}
                    <div id="cyber-tip-card" style="background: #F5F3FF; border: 1px solid rgba(123,97,255,0.15); border-radius: 1rem; padding: 1.5rem; display: flex; align-items: flex-start; gap: 1rem; transition: all 0.3s ease;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(123,97,255,0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px;">
                            <i data-lucide="lightbulb" style="width: 18px; height: 18px; color: #7b61ff;"></i>
                        </div>
                        <div>
                            <p style="font-size: 0.9rem; font-weight: 800; color: #1F1A3A; margin-bottom: 4px;" id="cyber-tip-title">Cyber-Tip: Waspada Emosi!</p>
                            <p style="font-size: 0.82rem; color: #6B7280; line-height: 1.6;" id="cyber-tip-desc">
                                Penyerang social engineering sering memanfaatkan emosi kita seperti rasa kasihan, takut, atau terburu-buru. Selalu verifikasi identitas orang tersebut melalui jalur komunikasi lain sebelum bertindak.
                            </p>
                        </div>
                    </div>

                    {{-- Navigation Buttons --}}
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.5rem;">
                        <button id="btn-prev" class="btn btn-outline" style="gap: 8px; border-radius: 0.75rem; padding: 0.8rem 1.5rem;" onclick="prevQuestion()">
                            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i> Kembali
                        </button>
                        <button id="btn-next" class="btn btn-primary animate-btn" style="gap: 8px; border-radius: 0.75rem; padding: 0.8rem 1.75rem;" onclick="nextQuestion()">
                            Lanjut <i data-lucide="arrow-right" style="width: 18px; height: 18px;"></i>
                        </button>
                    </div>

                </div>

                {{-- Right Side: Navigation & Timer --}}
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    {{-- Navigasi Soal Card --}}
                    <div class="card" style="padding: 1.5rem; display: flex; flex-direction: column; gap: 1.25rem;">
                        <h4 style="font-size: 1rem; font-weight: 800; color: #111827;">Navigasi Soal</h4>
                        
                        {{-- Questions Grid --}}
                        <div id="nav-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 0.65rem;">
                            <!-- Question cells rendered via JS -->
                        </div>

                        {{-- Legend --}}
                        <div style="display: flex; flex-direction: column; gap: 8px; border-top: 1px solid #E5E7EB; padding-top: 1rem; margin-top: 0.5rem;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="width: 14px; height: 14px; background: #10B981; border-radius: 4px;"></div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: #6B7280;">Terjawab</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="width: 14px; height: 14px; background: #7b61ff; border-radius: 4px;"></div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: #6B7280;">Aktif</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="width: 14px; height: 14px; background: #F3F4F6; border: 1px solid #E5E7EB; border-radius: 4px;"></div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: #6B7280;">Belum Dijawab</span>
                            </div>
                        </div>
                    </div>

                    {{-- Timer Card --}}
                    <div style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); border-radius: 1.25rem; padding: 1.75rem; color: #fff; position: relative; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.3);">
                        {{-- Shield Watermark --}}
                        <div style="position: absolute; right: -12px; bottom: 8px; opacity: 0.08; pointer-events: none; color: #fff;">
                            <i data-lucide="shield" style="width: 130px; height: 130px;"></i>
                        </div>
                        
                        <div style="position: relative; z-index: 2; display: flex; flex-direction: column; gap: 1.25rem;">
                            <div>
                                <p style="font-size: 0.65rem; font-weight: 700; color: #94A3B8; letter-spacing: 0.1em; display: flex; align-items: center; gap: 6px;">
                                    <i data-lucide="clock" style="width: 12px; height: 12px; color: #F59E0B;"></i> WAKTU TERSISA
                                </p>
                                <p id="timer-text" style="font-size: 2.25rem; font-weight: 800; color: #fff; margin-top: 6px; letter-spacing: -0.01em;">24:15</p>
                                <p style="font-size: 0.75rem; color: #94A3B8; margin-top: 4px;">Quiz otomatis terkirim saat waktu habis.</p>
                            </div>
                            
                            <button class="btn btn-outline" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.15); color: #fff; width: 100%; border-radius: 0.75rem; padding: 0.75rem;" onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'" onclick="finishQuiz()">
                                Selesaikan Quiz
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

{{-- Notification Toast (Optional for premiums feel) --}}
<div id="toast-notif" style="position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%) translateY(150%); background: #111827; color: white; padding: 0.85rem 1.75rem; border-radius: 9999px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); font-weight: 600; font-size: 0.9rem; z-index: 100; transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); display: flex; align-items: center; gap: 10px;">
    <i data-lucide="check-circle" style="color: #10B981; width: 18px; height: 18px;"></i>
    <span id="toast-text">Jawaban disimpan!</span>
</div>

<style>
    /* Styling adjustments */
    .animate-btn {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .animate-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(123, 97, 255, 0.4);
    }
    .animate-btn:active {
        transform: translateY(0);
    }
</style>

<script>
    // Fetch questions from database relationship
    const dbQuestions = {!! json_encode($materi->questions ?? []) !!};
    
    const quizData = dbQuestions.map((q, index) => {
        return {
            id: index + 1,
            question: q.question,
            type: "PILIHAN GANDA",
            options: [
                { key: "A", text: q.option_a },
                { key: "B", text: q.option_b },
                { key: "C", text: q.option_c },
                { key: "D", text: q.option_d }
            ],
            tipTitle: q.tip_title,
            tipDesc: q.tip_desc,
            userAnswer: null,
            correct: q.correct_answer
        };
    });

    // Fallback if no questions found (for empty seeds)
    if (quizData.length === 0) {
        quizData.push({
            id: 1,
            question: "Belum ada pertanyaan kuis untuk modul ini.",
            type: "PILIHAN GANDA",
            options: [
                { key: "A", text: "-" },
                { key: "B", text: "-" },
                { key: "C", text: "-" },
                { key: "D", text: "-" }
            ],
            tipTitle: "Info",
            tipDesc: "Admin belum mengunggah soal untuk modul ini.",
            userAnswer: null,
            correct: "A"
        });
    }

    let currentQuestionIndex = 0; // Starts from first question

    // Init page
    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById('total-questions-num').innerText = quizData.length;

        renderQuestion();
        renderNavGrid();
        startTimer(24, 15); // Start timer with 24 min 15 sec
    });

    // Render current question
    function renderQuestion() {
        const question = quizData[currentQuestionIndex];
        
        // Progress Bar
        const progressPercent = ((currentQuestionIndex + 1) / quizData.length) * 100;
        document.getElementById('quiz-progress').style.width = progressPercent + '%';

        // Title and question counter
        document.getElementById('current-question-num').innerText = question.id;
        document.getElementById('question-index-badge').innerText = question.id;
        document.getElementById('question-text').innerText = question.question;

        // Tip Card
        document.getElementById('cyber-tip-title').innerText = question.tipTitle;
        document.getElementById('cyber-tip-desc').innerText = question.tipDesc;

        // Render Options
        const container = document.getElementById('options-container');
        container.innerHTML = '';

        question.options.forEach(opt => {
            const isSelected = question.userAnswer === opt.key;
            
            // Outer wrapper div for premium styling
            const optionDiv = document.createElement('div');
            optionDiv.style.display = 'flex';
            optionDiv.style.alignItems = 'center';
            optionDiv.style.gap = '16px';
            optionDiv.style.padding = '1.15rem 1.4rem';
            optionDiv.style.borderRadius = '1rem';
            optionDiv.style.border = isSelected ? '2px solid #7b61ff' : '1px solid #E5E7EB';
            optionDiv.style.background = isSelected ? 'rgba(123,97,255,0.02)' : '#fff';
            optionDiv.style.cursor = 'pointer';
            optionDiv.style.transition = 'all 0.2s ease-in-out';
            
            // Hover effect set dynamically
            optionDiv.onmouseover = () => {
                if (!isSelected) {
                    optionDiv.style.border = '1px solid #7b61ff';
                    optionDiv.style.background = 'rgba(123,97,255,0.01)';
                }
            };
            optionDiv.onmouseout = () => {
                if (!isSelected) {
                    optionDiv.style.border = '1px solid #E5E7EB';
                    optionDiv.style.background = '#fff';
                }
            };

            optionDiv.onclick = () => selectOption(opt.key);

            // Circle badge for letter
            const badge = document.createElement('div');
            badge.style.width = '36px';
            badge.style.height = '36px';
            badge.style.borderRadius = '50%';
            badge.style.background = isSelected ? '#7b61ff' : '#F9FAFB';
            badge.style.border = isSelected ? '1px solid #7b61ff' : '1px solid #E5E7EB';
            badge.style.color = isSelected ? '#fff' : '#6B7280';
            badge.style.fontWeight = '800';
            badge.style.fontSize = '0.9rem';
            badge.style.display = 'flex';
            badge.style.alignItems = 'center';
            badge.style.justifyContent = 'center';
            badge.style.flexShrink = '0';
            badge.innerText = opt.key;

            // Option text
            const textEl = document.createElement('span');
            textEl.style.fontSize = '0.925rem';
            textEl.style.fontWeight = isSelected ? '700' : '500';
            textEl.style.color = isSelected ? '#1F1A3A' : '#374151';
            textEl.style.lineHeight = '1.5';
            textEl.innerText = opt.text;

            optionDiv.appendChild(badge);
            optionDiv.appendChild(textEl);
            container.appendChild(optionDiv);
        });

        // Prev/Next buttons state
        document.getElementById('btn-prev').disabled = currentQuestionIndex === 0;
        document.getElementById('btn-prev').style.opacity = currentQuestionIndex === 0 ? '0.5' : '1';
        document.getElementById('btn-prev').style.cursor = currentQuestionIndex === 0 ? 'not-allowed' : 'pointer';

        if (currentQuestionIndex === quizData.length - 1) {
            document.getElementById('btn-next').innerHTML = 'Selesai <i data-lucide="check" style="width:18px;height:18px;"></i>';
            document.getElementById('btn-next').onclick = finishQuiz;
        } else {
            document.getElementById('btn-next').innerHTML = 'Lanjut <i data-lucide="arrow-right" style="width:18px;height:18px;"></i>';
            document.getElementById('btn-next').onclick = nextQuestion;
        }
        
        // Refresh icons
        lucide.createIcons();
    }

    // Render Navigation Grid
    function renderNavGrid() {
        const grid = document.getElementById('nav-grid');
        grid.innerHTML = '';

        quizData.forEach((q, idx) => {
            const isActive = currentQuestionIndex === idx;
            const isAnswered = q.userAnswer !== null;

            const cell = document.createElement('button');
            cell.style.width = '100%';
            cell.style.aspectRatio = '1';
            cell.style.borderRadius = '0.75rem';
            cell.style.fontFamily = 'inherit';
            cell.style.fontSize = '0.95rem';
            cell.style.fontWeight = '800';
            cell.style.display = 'flex';
            cell.style.alignItems = 'center';
            cell.style.justifyContent = 'center';
            cell.style.cursor = 'pointer';
            cell.style.transition = 'all 0.15s ease';
            
            // Color states
            if (isActive) {
                cell.style.background = '#7b61ff';
                cell.style.color = '#fff';
                cell.style.border = 'none';
                cell.style.boxShadow = '0 4px 10px rgba(123, 97, 255, 0.3)';
            } else if (isAnswered) {
                cell.style.background = '#10B981';
                cell.style.color = '#fff';
                cell.style.border = 'none';
            } else {
                cell.style.background = '#F3F4F6';
                cell.style.color = '#6B7280';
                cell.style.border = '1px solid #E5E7EB';
            }

            cell.onclick = () => jumpToQuestion(idx);
            cell.innerText = q.id;

            grid.appendChild(cell);
        });
    }

    // Actions
    function selectOption(key) {
        quizData[currentQuestionIndex].userAnswer = key;
        
        // Show saved toast notification
        showToast("Jawaban disimpan!");

        // Re-render
        renderQuestion();
        renderNavGrid();
    }

    function jumpToQuestion(idx) {
        currentQuestionIndex = idx;
        renderQuestion();
        renderNavGrid();
    }

    function nextQuestion() {
        if (currentQuestionIndex < quizData.length - 1) {
            currentQuestionIndex++;
            renderQuestion();
            renderNavGrid();
        }
    }

    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            renderQuestion();
            renderNavGrid();
        }
    }

    // Timer logic
    let totalSeconds = 0;
    let timerInterval = null;

    function startTimer(min, sec) {
        totalSeconds = (min * 60) + sec;
        timerInterval = setInterval(() => {
            if (totalSeconds <= 0) {
                clearInterval(timerInterval);
                finishQuiz(true); // Auto submit on 0
                return;
            }
            totalSeconds--;
            const m = Math.floor(totalSeconds / 60).toString().padStart(2, '0');
            const s = (totalSeconds % 60).toString().padStart(2, '0');
            document.getElementById('timer-text').innerText = `${m}:${s}`;
        }, 1000);
    }

    // Finish Quiz
    function finishQuiz(auto = false) {
        clearInterval(timerInterval);
        
        // Count total answers
        const answersCount = quizData.filter(q => q.userAnswer !== null).length;
        
        const confirmMsg = auto 
            ? "Waktu pengerjaan telah habis! Jawaban Anda akan otomatis dikirimkan."
            : `Apakah Anda yakin ingin menyelesaikan kuis ini? Anda telah menjawab ${answersCount} dari ${quizData.length} pertanyaan.`;

        if (auto || confirm(confirmMsg)) {
            // Calculate Score based on 100 scale
            let rawScore = 0;
            quizData.forEach(q => {
                if (q.userAnswer === q.correct) {
                    rawScore++;
                }
            });
            let score = Math.round((rawScore / quizData.length) * 100);

            // Post result to API
            fetch("{{ route('save.result') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    type: "quiz",
                    reference_id: "{{ $materi->slug }}",
                    score: score,
                    max_score: 100
                })
            }).then(() => {
                // Redirect to results page
                window.location.href = "{{ route('hasil') }}";
            }).catch(err => {
                console.error("Error saving result:", err);
                window.location.href = "{{ route('hasil') }}";
            });
        } else {
            // Restart timer
            const curTime = document.getElementById('timer-text').innerText.split(':');
            startTimer(parseInt(curTime[0]), parseInt(curTime[1]));
        }
    }

    // Toast Notification helper
    function showToast(message) {
        const toast = document.getElementById('toast-notif');
        document.getElementById('toast-text').innerText = message;
        toast.style.transform = 'translateX(-50%) translateY(0)';
        
        setTimeout(() => {
            toast.style.transform = 'translateX(-50%) translateY(150%)';
        }, 2200);
    }
</script>
@endsection
