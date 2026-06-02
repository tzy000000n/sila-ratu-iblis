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
                    <h2 style="font-size: 1.85rem; font-weight: 800; color: #111827; margin-bottom: 4px;">Fundamen Keamanan Siber</h2>
                    <p style="font-size: 0.9rem; color: #6B7280; font-weight: 500;">Modul 1: Pengenalan Ancaman Digital</p>
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
    // Quiz pools mapped by material slug
    const quizPools = {
        'dasar-keamanan-digital': [
            {
                id: 1,
                question: "Di bawah ini, pilar manakah dari CIA Triad yang bertugas memastikan bahwa data tidak diubah, dimodifikasi, atau dimanipulasi oleh pihak yang tidak berwenang tanpa izin?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Confidentiality (Kerahasiaan)" },
                    { key: "B", text: "Integrity (Integritas)" },
                    { key: "C", text: "Availability (Ketersediaan)" },
                    { key: "D", text: "Authentication (Otentikasi)" }
                ],
                tipTitle: "Cyber-Tip: Pilar CIA Triad!",
                tipDesc: "Menurut modul 'Dasar Keamanan Digital', Integrity menjamin data tetap utuh tanpa modifikasi ilegal, Confidentiality menjaga kerahasiaan akses data, dan Availability memastikan kesiapan sistem.",
                userAnswer: null
            },
            {
                id: 2,
                question: "Berasal dari kata bahasa Inggris apakah istilah 'Phishing' siber itu, yang mencerminkan cara pelaku menebar umpan digital?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Fishing (Memancing)" },
                    { key: "B", text: "Pushing (Mendorong)" },
                    { key: "C", text: "Phoning (Menelepon)" },
                    { key: "D", text: "Finishing (Menyelesaikan)" }
                ],
                tipTitle: "Cyber-Tip: Memancing Umpan!",
                tipDesc: "Nama Phishing berasal dari kata 'fishing' (memancing), karena penyerang menyebarkan 'umpan' digital dengan harapan ada korban yang terpancing membocorkan informasi sensitif.",
                userAnswer: null
            },
            {
                id: 3,
                question: "Manakah pilar CIA Triad yang memastikan bahwa sistem, layanan, dan data selalu dapat diakses oleh pihak yang berwenang kapan saja dibutuhkan?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Confidentiality" },
                    { key: "B", text: "Integrity" },
                    { key: "C", text: "Availability" },
                    { key: "D", text: "Accessibility" }
                ],
                tipTitle: "Cyber-Tip: Pilar Ketersediaan!",
                tipDesc: "Availability memastikan sistem, server, dan data tetap online dan berfungsi dengan baik saat diakses oleh pihak yang memiliki hak resmi.",
                userAnswer: null
            },
            {
                id: 4,
                question: "Pernyataan surel 'akun kamu telah dikunci, klik di sini dalam 24 jam untuk verifikasi' adalah salah satu ciri phishing berupa...",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Kesalahan ejaan yang disengaja" },
                    { key: "B", text: "Pemberian rasa urgensi yang berlebihan" },
                    { key: "C", text: "Alamat email pengirim yang tepercaya" },
                    { key: "D", text: "Sistem enkripsi database lokal" }
                ],
                tipTitle: "Cyber-Tip: Tekanan Urgensi!",
                tipDesc: "Penyerang menyebarkan ancaman urgensi palsu agar korban merasa cemas, panik, dan segera mengeklik tombol tanpa melakukan pemeriksaan rasional.",
                userAnswer: null
            },
            {
                id: 5,
                question: "Di bawah ini yang merupakan salah satu dari tiga pilar utama CIA Triad adalah...",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Confidentiality (Kerahasiaan)" },
                    { key: "B", text: "Complexity (Kompleksitas)" },
                    { key: "C", text: "Connectivity (Konektivitas)" },
                    { key: "D", text: "Centralization (Sentralisasi)" }
                ],
                tipTitle: "Cyber-Tip: 3 Pilar Utama!",
                tipDesc: "Tiga pilar utama dalam keamanan informasi adalah CIA: Confidentiality (Kerahasiaan), Integrity (Integritas), dan Availability (Ketersediaan).",
                userAnswer: null
            }
        ],
        'seni-mengelola-password': [
            {
                id: 1,
                question: "Berdasarkan modul 'Seni Mengelola Password', teknik apakah yang menyarankan untuk menggabungkan 4-5 kata acak yang tidak saling berhubungan untuk membuat kata sandi?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Teknik Leet Speak (Angka & Huruf)" },
                    { key: "B", text: "Teknik Autentikasi Biometrik" },
                    { key: "C", text: "Teknik Passphrase (Kalimat Sandi)" },
                    { key: "D", text: "Teknik Brute Force" }
                ],
                tipTitle: "Cyber-Tip: Gunakan Passphrase!",
                tipDesc: "Teknik passphrase (seperti 'Kucing-Biru-Terbang-2024!') menggabungkan kata acak yang mudah Anda ingat secara visual, namun sangat sulit diretas oleh robot peretas.",
                userAnswer: null
            },
            {
                id: 2,
                question: "Berapa panjang minimal karakter pembuatan kata sandi (password) yang disarankan dalam modul agar aman dari serangan penebakan sandi?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Minimal 6 karakter" },
                    { key: "B", text: "Minimal 8 karakter" },
                    { key: "C", text: "Minimal 12 karakter" },
                    { key: "D", text: "Minimal 16 karakter" }
                ],
                tipTitle: "Cyber-Tip: Panjang Karakter!",
                tipDesc: "Semakin panjang sebuah password, semakin eksponensial kombinasi yang harus dicoba peretas. Modul menyarankan panjang kata sandi minimal 12 karakter.",
                userAnswer: null
            },
            {
                id: 3,
                question: "Manakah di antara pilihan kata sandi berikut yang menggambarkan jenis sandi berkategori 'Kuat' dalam modul?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "password123" },
                    { key: "B", text: "P@ssw0rd!" },
                    { key: "C", text: "Kucing-Biru-2024!" },
                    { key: "D", text: "12345678" }
                ],
                tipTitle: "Cyber-Tip: Sandi Kuat!",
                tipDesc: "Kata sandi yang menggunakan passphrase kombinasi kata acak dengan simbol dan angka ('Kucing-Biru-2024!') dinilai jauh lebih kuat dibanding leetspeak pendek biasa.",
                userAnswer: null
            },
            {
                id: 4,
                question: "Sesuai petunjuk anatomi kata sandi di modul, informasi personal manakah yang sebaiknya DIBUANG dari password Anda?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Kombinasi simbol acak" },
                    { key: "B", text: "Huruf kapital di tengah kata" },
                    { key: "C", text: "Kombinasi kata benda acak" },
                    { key: "D", text: "Tanggal lahir, nama hewan peliharaan, atau nama pribadi" }
                ],
                tipTitle: "Cyber-Tip: Hindari Info Pribadi!",
                tipDesc: "Hacker bisa melakukan serangan 'Dictionary Attack' dengan menyusun database nama, tanggal lahir, dan info personal Anda dari sosial mediamu untuk menebak password.",
                userAnswer: null
            },
            {
                id: 5,
                question: "Mengapa disarankan untuk menggunakan kata sandi (password) yang unik dan berbeda untuk setiap akun digital Anda?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Supaya peretas tidak bisa menguasai seluruh akun Anda jika salah satu akun mengalami kebocoran data (credential stuffing)." },
                    { key: "B", text: "Agar sistem operasi komputer berjalan lebih cepat." },
                    { key: "C", text: "Mencegah virus malware menginfeksi browser lokal." },
                    { key: "D", text: "Mempercepat proses pemuatan halaman web di internet." }
                ],
                tipTitle: "Cyber-Tip: Password Unik!",
                tipDesc: "Praktik daur ulang password sangat berisiko. Jika satu web database bocor, penyerang otomatis akan mencoba password bocor tersebut di akun-akun penting Anda lainnya.",
                userAnswer: null
            }
        ],
        'deteksi-serangan-phishing': [
            {
                id: 1,
                question: "Surel (email) yang mengancam bahwa 'akun Anda akan ditutup permanen dalam 24 jam jika tidak segera mengklik tombol verifikasi' memicu bendera merah phishing berupa...",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Kesalahan ejaan yang mencolok" },
                    { key: "B", text: "Rasa urgensi yang berlebihan" },
                    { key: "C", text: "Alamat email pengirim yang tepercaya" },
                    { key: "D", text: "Penggunaan subdomain resmi" }
                ],
                tipTitle: "Cyber-Tip: Rasa Urgensi!",
                tipDesc: "Urgensi yang berlebihan adalah bendera merah phishing utama. Pelaku memanfaatkan kepanikan korban agar bertindak terburu-buru tanpa berpikir logis.",
                userAnswer: null
            },
            {
                id: 2,
                question: "Ketika Anda menerima email dengan alamat pengirim 'support@instagram-security.com' alih-alih '@instagram.com', bendera merah phishing apa yang tampak?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Adanya kesalahan tata bahasa" },
                    { key: "B", text: "Rasa urgensi yang dipaksakan" },
                    { key: "C", text: "Alamat email pengirim yang aneh dan mencurigakan" },
                    { key: "D", text: "Tautan mengarah ke HTTPS" }
                ],
                tipTitle: "Cyber-Tip: Periksa Domain Pengirim!",
                tipDesc: "Penyerang sering membuat domain palsu yang menyerupai brand asli guna mengelabui mata Anda yang kurang teliti saat membaca alamat email pengirim.",
                userAnswer: null
            },
            {
                id: 3,
                question: "Menurut modul, mengapa kesalahan ketik (typo) dan tata bahasa yang mencolok pada email penting patut dicurigai sebagai phishing?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Karena perusahaan resmi jarang mengirim surel formal dengan kesalahan ejaan yang mencolok." },
                    { key: "B", text: "Karena server email otomatis memblokir kesalahan ejaan." },
                    { key: "C", text: "Agar email tersebut lebih mudah terbaca oleh komputer." },
                    { key: "D", text: "Menunjukkan tingginya enkripsi keamanan pesan." }
                ],
                tipTitle: "Cyber-Tip: Bendera Merah Ejaan!",
                tipDesc: "Surel resmi dari korporasi besar melewati berbagai tahap editing internal. Kesalahan tata bahasa mencolok kerap menjadi petunjuk kuat email dibuat oleh sindikat hacker luar negeri.",
                userAnswer: null
            },
            {
                id: 4,
                question: "Tindakan apa yang harus dilakukan sebelum mengeklik tautan dalam surel untuk mendeteksi apakah tautan tersebut mengarah ke situs palsu?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Menyalin tautan ke notepad untuk disimpan." },
                    { key: "B", text: "Mengarahkan kursor (hover) ke tautan untuk melihat alamat URL sebenarnya yang akan dituju." },
                    { key: "C", text: "Menutup browser lalu me-restart komputer." },
                    { key: "D", text: "Langsung mengeklik tombol tersebut secara cepat." }
                ],
                tipTitle: "Cyber-Tip: Hover Tautan!",
                tipDesc: "Fitur hover (mengarahkan kursor tanpa mengeklik) menyingkap tujuan URL asli. Jika teks tertulis 'www.bca.co.id' namun hover-nya mengarah ke 'bca-palsu.net', itu adalah phishing.",
                userAnswer: null
            },
            {
                id: 5,
                question: "Apakah tujuan utama penyerang siber menyebarkan email phishing kepada korbannya?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Membantu pengguna meningkatkan kecepatan komputer mereka." },
                    { key: "B", text: "Memancing dan mencuri informasi pribadi sensitif (seperti password dan data perbankan)." },
                    { key: "C", text: "Mengiklankan produk software terbaru secara resmi." },
                    { key: "D", text: "Mengurangi beban kerja jaringan siber kantor." }
                ],
                tipTitle: "Cyber-Tip: Tujuan Phishing!",
                tipDesc: "Phishing adalah taktik manipulatif visual yang menyamar sebagai pihak terpercaya guna memancing data kredensial login atau detail kartu kredit korban.",
                userAnswer: null
            }
        ],
        'waspada-social-engineering': [
            {
                id: 1,
                question: "Dalam modul 'Waspada Social Engineering', apa yang dimaksud dengan serangan rekayasa sosial (Social Engineering) itu sendiri?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Serangan teknis yang merusak server web secara fisik." },
                    { key: "B", text: "Seni memanipulasi orang agar mau memberikan informasi rahasia atau melakukan tindakan tertentu." },
                    { key: "C", text: "Pengamanan sistem komputer menggunakan firewall otomatis." },
                    { key: "D", text: "Proses pembersihan virus komputer menggunakan software khusus." }
                ],
                tipTitle: "Cyber-Tip: Manipulasi Psikologis!",
                tipDesc: "Social engineering menargetkan psikologi manusia (rasa panik, ingin tahu, sungkan) karena manusia dinilai sebagai titik terlemah dalam rantai keamanan siber.",
                userAnswer: null
            },
            {
                id: 2,
                question: "Jika seorang penyerang menipu Anda melalui panggilan telepon dengan berpura-pura menjadi petugas bank resmi, metode rekayasa sosial ini disebut...",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Smishing" },
                    { key: "B", text: "Vishing (Voice Phishing)" },
                    { key: "C", text: "Baiting" },
                    { key: "D", text: "Pretexting" }
                ],
                tipTitle: "Cyber-Tip: Kenali Vishing!",
                tipDesc: "Vishing (Voice Phishing) adalah taktik penipuan suara via telepon. Penyerang biasanya mendesak korban memberikan kode OTP atau nomor PIN dengan alasan keamanan darurat.",
                userAnswer: null
            },
            {
                id: 3,
                question: "Menerima pesan singkat (SMS) berisi tautan palsu dengan iming-iming hadiah ratusan juta rupiah atau ancaman pemblokiran akun adalah bentuk serangan...",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Smishing" },
                    { key: "B", text: "Vishing" },
                    { key: "C", text: "Baiting" },
                    { key: "D", text: "Cryptography" }
                ],
                tipTitle: "Cyber-Tip: Waspada Smishing!",
                tipDesc: "Smishing (SMS Phishing) merayu target mengeklik tautan berbahaya dengan memanipulasi perasaan korban lewat media SMS dari nomor acak tak dikenal.",
                userAnswer: null
            },
            {
                id: 4,
                question: "Metode rekayasa sosial yang menggunakan iming-iming menggiurkan seperti unduhan konten gratis atau hadiah gratis guna memancing korban disebut...",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Pretexting" },
                    { key: "B", text: "Baiting" },
                    { key: "C", text: "Vishing" },
                    { key: "D", text: "Social Media Spamming" }
                ],
                tipTitle: "Cyber-Tip: Kenali Umpan Baiting!",
                tipDesc: "Baiting memanfaatkan rasa penasaran atau keserakahan manusia. Jangan pernah mengeklik link tawaran gratisan ilegal atau mencurigakan.",
                userAnswer: null
            },
            {
                id: 5,
                question: "Menurut penutup modul 'Waspada Social Engineering', apa kunci pertahanan terbaik yang harus kita miliki untuk menghadapi ancaman rekayasa sosial?",
                type: "PILIHAN GANDA",
                options: [
                    { key: "A", text: "Membeli perangkat antivirus premium termahal." },
                    { key: "B", text: "Memiliki skeptisisme yang sehat dan selalu melakukan verifikasi melalui saluran komunikasi resmi." },
                    { key: "C", text: "Menolak menggunakan email dan media sosial selamanya." },
                    { key: "D", text: "Menyalin seluruh password ke dalam file teks di komputer." }
                ],
                tipTitle: "Cyber-Tip: Skeptisisme Sehat!",
                tipDesc: "Selalu cross-check setiap permintaan mendesak dengan menghubungi Call Center resmi instansi terkait, bukan nomor yang diberikan oleh pengirim tak dikenal.",
                userAnswer: null
            }
        ]
    };

    // Module info details to update breadcrumbs dynamically
    const moduleNames = {
        'dasar-keamanan-digital': { title: 'Dasar Keamanan Digital', subtitle: 'Modul 1: Pengenalan Ancaman Digital' },
        'seni-mengelola-password': { title: 'Seni Mengelola Password', subtitle: 'Modul 2: Anatomi Sandi Kuat & Password Manager' },
        'deteksi-serangan-phishing': { title: 'Deteksi Serangan Phishing', subtitle: 'Modul 3: Memahami Ciri & Menghindari Phishing' },
        'waspada-social-engineering': { title: 'Waspada Social Engineering', subtitle: 'Modul 4: Rekayasa Sosial & Eksploitasi Manusia' }
    };

    // Determine which pool to load based on URL query param
    const urlParams = new URLSearchParams(window.location.search);
    const materiSlug = urlParams.get('materi') || 'dasar-keamanan-digital';

    // Set quiz data & module breadcrumbs
    const quizData = quizPools[materiSlug] || quizPools['dasar-keamanan-digital'];
    const activeModule = moduleNames[materiSlug] || moduleNames['dasar-keamanan-digital'];

    let currentQuestionIndex = 0; // Starts from first question

    // Init page
    window.addEventListener('DOMContentLoaded', () => {
        // Dynamically update page titles
        document.querySelector('h2').innerText = activeModule.title;
        document.querySelector('h2 + p').innerText = activeModule.subtitle;
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
            // Redirect to results page
            window.location.href = "{{ route('hasil') }}";
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
