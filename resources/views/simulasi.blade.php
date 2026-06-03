@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => 'simulasi'])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari simulasi, materi atau kuis...'])

        {{-- Simulation Wrapper --}}
        <div style="padding: 2rem; display: flex; flex-direction: column; gap: 1.5rem;">
            
            {{-- Top Header Block --}}
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="max-width: 65%;">
                    {{-- Category Badge --}}
                    <div style="width: fit-content; background: rgba(123,97,255,0.08); border: 1px solid rgba(123,97,255,0.15); padding: 4px 12px; border-radius: 9999px; display: flex; align-items: center; gap: 6px; margin-bottom: 0.85rem;">
                        <i data-lucide="shield" style="width: 13px; height: 13px; color: #7b61ff;"></i>
                        <span style="font-size: 0.65rem; font-weight: 800; color: #7b61ff; letter-spacing: 0.05em;">MODUL: SOCIAL ENGINEERING</span>
                    </div>
                    <h2 id="case-title" style="font-size: 2.15rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; letter-spacing: -0.01em;">
                        Simulasi Kasus: Serangan Phishing
                    </h2>
                    <p id="case-description" style="font-size: 0.95rem; color: #6B7280; line-height: 1.6;">
                        Menganalisis email mencurigakan yang masuk ke kotak pesan perusahaan imajiner "Nexyra Corp". Gunakan ketajaman matamu untuk menemukan tanda-tanda bahaya.
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
                <div class="card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    
                    {{-- Simulated Email Client Header --}}
                    <div style="border-bottom: 1px solid #E5E7EB; padding: 1.25rem 1.75rem; background: #FAFBFD; display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #EFF6FF; display: flex; align-items: center; justify-content: center; border: 1px solid #DBEAFE;">
                                <i data-lucide="mail" style="width: 18px; height: 18px; color: #3B82F6;"></i>
                            </div>
                            <div>
                                <h4 id="email-sender-name" style="font-size: 0.95rem; font-weight: 800; color: #1F2937;">Support Keamanan Akun</h4>
                                <p style="font-size: 0.75rem; color: #9CA3AF; display: flex; align-items: center; gap: 4px;">
                                    <span id="email-sender-address" class="phish-indicator" title="Perhatikan: Domain email publik seperti @gmail.com tidak logis untuk email keamanan formal!" style="font-weight: 600; color: #4B5563; border-bottom: 1px dashed transparent; transition: all 0.2s;">keamanan-nexyra-noreply@gmail.com</span>
                                </p>
                            </div>
                        </div>
                        <span style="font-size: 0.75rem; font-weight: 700; color: #9CA3AF;">Baru Saja</span>
                    </div>

                    {{-- Email Subject --}}
                    <div style="padding: 1.25rem 1.75rem; border-bottom: 1px solid #F3F4F6;">
                        <h3 id="email-subject" style="font-size: 1.25rem; font-weight: 800; color: #111827; letter-spacing: -0.01em;">
                            [PENTING] Percobaan Login Mencurigakan pada Akun Anda
                        </h3>
                    </div>

                    {{-- Email Body --}}
                    <div style="padding: 2rem 2.25rem; background: #fff; display: flex; flex-direction: column; gap: 1.5rem; color: #374151; font-size: 0.925rem; line-height: 1.7; position: relative;">
                        
                        {{-- Hover Info Info --}}
                        <div style="position: absolute; right: 2rem; top: 1.5rem; color: #9CA3AF; cursor: help;" title="Arahkan kursor Anda ke area email untuk menemukan tanda bahaya!">
                            <i data-lucide="info" style="width: 18px; height: 18px;"></i>
                        </div>

                        <div id="email-body-text" style="display: flex; flex-direction: column; gap: 1.25rem;">
                            <p>Halo Pengguna Nexyra,</p>
                            <p>
                                Sistem kami mendeteksi upaya login yang tidak sah dari alamat IP <strong class="phish-indicator" title="Alamat IP acak kerap dipakai untuk menakut-nakuti korban agar panik.">182.21.0.45</strong> (Jakarta, Indonesia) pada pukul 14:22 WIB hari ini.
                            </p>
                            <p>
                                Demi keamanan akun Anda, kami telah membatasi akses ke beberapa fitur penting. Silakan klik tombol di bawah ini untuk memverifikasi identitas Anda dan mengganti kata sandi Anda segera.
                            </p>
                        </div>

                        {{-- Action Button --}}
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1rem 0; gap: 10px;">
                            <a href="#" id="email-action-btn" class="phish-indicator" title="Peringatan: Tautan mengarah ke situs palsu! Periksa URL sebelum mengeklik."
                               style="display: inline-flex; align-items: center; justify-content: center; padding: 0.85rem 2.5rem; background: #7b61ff; color: white; border-radius: 0.75rem; font-weight: 700; font-size: 0.95rem; box-shadow: 0 4px 15px rgba(123,97,255,0.25); text-decoration: none; transition: all 0.2s;">
                                Verifikasi Sekarang
                            </a>
                            <span style="font-size: 0.75rem; color: #9CA3AF;" id="email-action-subtext">Tautan ini akan kedaluwarsa dalam 30 menit.</span>
                        </div>

                        {{-- Disclaimers & Sign-off --}}
                        <blockquote id="email-quote" style="border-left: 3px solid #E5E7EB; padding-left: 1.25rem; margin: 0.5rem 0; font-style: italic; color: #6B7280; font-size: 0.85rem;">
                            "Keamanan Anda adalah prioritas kami. Jika Anda tidak merasa melakukan tindakan ini, segera laporkan ke tim support kami."
                        </blockquote>

                        <div id="email-signoff" style="margin-top: 0.5rem; font-size: 0.9rem;">
                            <p>Salam Hangat,</p>
                            <p style="font-weight: 700; color: #111827; margin-top: 4px;">Tim Keamanan Nexyra Learn</p>
                        </div>
                    </div>
                </div>

                {{-- Right: Actions & Tips Panel --}}
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    {{-- Action Card --}}
                    <div class="card" style="padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                        <div>
                            <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin-bottom: 6px;">Apa tindakanmu?</h3>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">
                                Pilih salah satu tindakan di bawah ini untuk merespon skenario email di samping.
                            </p>
                        </div>

                        {{-- Interactive Options --}}
                        <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                            
                            {{-- Option 1 --}}
                            <div id="action-1" class="sim-action-card" onclick="selectAction(1)"
                                 style="display: flex; align-items: center; gap: 16px; padding: 1.1rem; border-radius: 1rem; border: 1px solid #E5E7EB; background: #fff; cursor: pointer; transition: all 0.25s ease;">
                                <div style="width: 42px; height: 42px; border-radius: 0.75rem; background: #D1FAE5; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i data-lucide="shield-check" style="width: 20px; height: 20px; color: #10B981;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="font-size: 0.9rem; font-weight: 800; color: #111827;">Laporkan sebagai Phishing</h4>
                                    <p style="font-size: 0.75rem; color: #6B7280; margin-top: 2px;">Kirim email ini ke tim IT Security pusat.</p>
                                </div>
                            </div>

                            {{-- Option 2 --}}
                            <div id="action-2" class="sim-action-card" onclick="selectAction(2)"
                                 style="display: flex; align-items: center; gap: 16px; padding: 1.1rem; border-radius: 1rem; border: 1px solid #E5E7EB; background: #fff; cursor: pointer; transition: all 0.25s ease;">
                                <div style="width: 42px; height: 42px; border-radius: 0.75rem; background: #FEE2E2; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i data-lucide="link-2" style="width: 20px; height: 20px; color: #EF4444;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="font-size: 0.9rem; font-weight: 800; color: #111827;">Klik Link Verifikasi</h4>
                                    <p style="font-size: 0.75rem; color: #6B7280; margin-top: 2px;">Segera amankan akun melalui tautan resmi.</p>
                                </div>
                            </div>

                            {{-- Option 3 --}}
                            <div id="action-3" class="sim-action-card" onclick="selectAction(3)"
                                 style="display: flex; align-items: center; gap: 16px; padding: 1.1rem; border-radius: 1rem; border: 1px solid #E5E7EB; background: #fff; cursor: pointer; transition: all 0.25s ease;">
                                <div style="width: 42px; height: 42px; border-radius: 0.75rem; background: #EFF6FF; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i data-lucide="at-sign" style="width: 20px; height: 20px; color: #3B82F6;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="font-size: 0.9rem; font-weight: 800; color: #111827;">Cek Alamat Pengirim</h4>
                                    <p style="font-size: 0.75rem; color: #6B7280; margin-top: 2px;">Analisis validitas domain pengirim email.</p>
                                </div>
                            </div>
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
                                Instansi resmi tidak pernah menggunakan domain email publik (seperti @gmail.com) untuk korespondensi keamanan formal.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Bottom Progress and Navigation Bar --}}
            <div style="border-top: 1px solid #E5E7EB; padding-top: 1.5rem; display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                
                {{-- Progress Area --}}
                <div style="display: flex; align-items: center; gap: 1.5rem; flex: 1; max-width: 60%;">
                    <span id="case-counter-text" style="font-size: 0.95rem; font-weight: 800; color: #111827; flex-shrink: 0; min-width: 80px;">03 <span style="font-size: 0.85rem; font-weight: 500; color: #9CA3AF;">/ 10 Kasus</span></span>
                    
                    {{-- Track --}}
                    <div style="flex: 1; height: 8px; background: #E5E7EB; border-radius: 9999px; overflow: hidden;">
                        <div id="sim-progress-bar" style="width: 30%; height: 100%; background: #7b61ff; transition: width 0.3s ease; border-radius: 9999px;"></div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div style="display: flex; align-items: center; gap: 1.5rem;">
                    <button class="btn" style="color: #9CA3AF; font-size: 0.9rem; font-weight: 800; background: transparent; padding: 0.75rem 1.25rem;" onclick="skipCase()" onmouseover="this.style.color='#6B7280'" onmouseout="this.style.color='#9CA3AF'">
                        LEWATI
                    </button>
                    <button id="btn-submit-action" class="btn btn-primary" style="border-radius: 0.75rem; padding: 0.75rem 2rem; display: flex; align-items: center; gap: 8px;" onclick="submitAnswer()">
                        KIRIM JAWABAN <i data-lucide="arrow-right" style="width: 18px; height: 18px;"></i>
                    </button>
                </div>
            </div>

        </div>

    </main>

</div>

<style>
    /* Glowing danger elements for premium labs */
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
    // Scenario data
    const scenarios = [
        {
            id: 1,
            title: "Simulasi Kasus: OTP via SMS Palsu",
            desc: "Menerima pesan SMS mendesak dari pengirim bertuliskan 'INFO-BANK' yang meminta kode otentikasi (OTP) darurat untuk membatalkan penarikan tunai Rp5.000.000.",
            emailSenderName: "Bank Pusat Keamanan",
            emailSenderAddress: "sms-gateway-4822@telco-spam.net",
            emailSubject: "[PERINGATAN] Penarikan Saldo Rp5.000.000 Berhasil Dideteksi",
            emailBody: `
                <p>Nasabah Terhormat,</p>
                <p>Kami mendeteksi aktivitas penarikan tunai mencurigakan sebesar <strong>Rp5.000.000</strong> di ATM Jakarta Utara pada pukul 10:11 WIB.</p>
                <p>Jika ini BUKAN tindakan Anda, segera kirimkan kode OTP 6-Digit yang baru saja masuk ke nomor seluler Anda ke nomor WA asisten support kami untuk pemblokiran instan.</p>
            `,
            emailActionText: "Kirim OTP via WhatsApp",
            emailActionSubtext: "OTP berlaku selama 60 detik.",
            emailQuote: '"Jagalah selalu kerahasiaan OTP Anda, petugas bank tidak pernah meminta OTP Anda."',
            emailSignoff: "<p>Hormat kami,</p><p style='font-weight:700; color:#111827;'>Layanan Pengaman Bank</p>",
            tip: "Petugas bank tidak pernah meminta Kode OTP (One-Time Password) untuk alasan apa pun. Membagikan OTP sama dengan menyerahkan kunci rumah Anda ke pencuri.",
            answers: [
                { id: 1, text: "Abaikan pesan dan hubungi bank.", desc: "Mencari kebenaran via jalur resmi.", isCorrect: true, feedback: "Langkah yang sangat tepat! Selalu verifikasi melalui Call Center resmi bank, bukan dari nomor pengirim SMS." },
                { id: 2, text: "Segera kirimkan OTP.", desc: "Mengikuti instruksi dari SMS mencurigakan.", isCorrect: false, feedback: "Sangat Berbahaya! Jika Anda mengirim OTP, pelaku bisa langsung membobol rekening Anda dalam hitungan detik." },
                { id: 3, text: "Balas SMS untuk marah-marah.", desc: "Memberi konfirmasi nomor aktif.", isCorrect: false, feedback: "Meskipun tidak mengirim OTP, membalas SMS justru mengkonfirmasi ke pelaku bahwa nomor HP Anda aktif." }
            ],
            progress: 10
        },
        {
            id: 2,
            title: "Simulasi Kasus: WhatsApp Tagihan Pajak (.APK)",
            desc: "Pesan masuk di WhatsApp dari nomor asing memakai foto profil logo kementerian keuangan, mengirimkan file berekstensi .APK bertuliskan 'Surat Tagihan Pajak Akhir Tahun'.",
            emailSenderName: "DJP Pajak Online",
            emailSenderAddress: "pajak-alert-92@kemenkeu-info.org",
            emailSubject: "PEMBERITAHUAN: Kurang Bayar Pajak Penghasilan Badan Pribadi",
            emailBody: `
                <p>Wajib Pajak yang terhormat,</p>
                <p>Berdasarkan data audit kami, Anda memiliki tunggakan pajak tahun berjalan sebesar Rp1.250.000 yang harus dilunasi sebelum akhir minggu ini.</p>
                <p>Detail surat rincian tunggakan dan denda keterlambatan telah kami lampirkan di file instalasi di bawah. Silakan unduh dan jalankan pada perangkat android Anda.</p>
            `,
            emailActionText: "Unduh Rincian_Tunggakan.apk",
            emailActionSubtext: "Ukuran file: 4.8 MB (Kompatibel Android)",
            emailQuote: '"Kepatuhan pajak Anda adalah cerminan bela negara."',
            emailSignoff: "<p>Salam Kepatuhan,</p><p style='font-weight:700; color:#111827;'>Divisi Pemeriksa Pajak Negara</p>",
            tip: "Pemerintah tidak pernah mendistribusikan surat panggilan atau pemberitahuan tagihan menggunakan aplikasi (.APK) mandiri via obrolan instan. Ini adalah Trojan Sniffer untuk mencuri SMS perbankan Anda.",
            answers: [
                { id: 1, text: "Laporkan nomor dan abaikan.", desc: "Tindakan paling aman dari file APK.", isCorrect: true, feedback: "Luar biasa! Instansi pemerintah tidak menyebarkan dokumen resmi dalam bentuk aplikasi Android (.APK) via WhatsApp." },
                { id: 2, text: "Instal aplikasi segera.", desc: "Membuka celah malware untuk mencuri data di HP.", isCorrect: false, feedback: "Sangat Berbahaya! Menginstal .APK dari sumber tak dikenal berisiko menyusupkan malware pencuri OTP dan password." },
                { id: 3, text: "Unduh dan buka di Laptop.", desc: "Mencoba aman dengan beda perangkat.", isCorrect: false, feedback: "Walaupun .APK tidak bisa jalan di Windows, tetap saja mengunduh file mencurigakan adalah praktik yang buruk." }
            ],
            progress: 20
        },
        {
            id: 3,
            title: "Simulasi Kasus: Serangan Phishing Email",
            desc: "Menganalisis email mencurigakan yang masuk ke kotak pesan perusahaan imajiner 'Nexyra Corp'. Gunakan ketajaman matamu untuk menemukan tanda-tanda bahaya.",
            emailSenderName: "Support Keamanan Akun",
            emailSenderAddress: "keamanan-nexyra-noreply@gmail.com",
            emailSubject: "[PENTING] Percobaan Login Mencurigakan pada Akun Anda",
            emailBody: `
                <p>Halo Pengguna Nexyra,</p>
                <p>Sistem kami mendeteksi upaya login yang tidak sah dari alamat IP <strong class="phish-indicator" title="Alamat IP acak kerap dipakai untuk menakut-nakuti korban agar panik.">182.21.0.45</strong> (Jakarta, Indonesia) pada pukul 14:22 WIB hari ini.</p>
                <p>Demi keamanan akun Anda, kami telah membatasi akses ke beberapa fitur penting. Silakan klik tombol di bawah ini untuk memverifikasi identitas Anda dan mengganti kata sandi Anda segera.</p>
            `,
            emailActionText: "Verifikasi Sekarang",
            emailActionSubtext: "Tautan ini akan kedaluwarsa dalam 30 menit.",
            emailQuote: '"Keamanan Anda adalah prioritas kami. Jika Anda tidak merasa melakukan tindakan ini, segera laporkan ke tim support kami."',
            emailSignoff: "<p>Salam Hangat,</p><p style='font-weight:700; color:#111827;'>Tim Keamanan Nexyra Learn</p>",
            tip: "Instansi resmi tidak pernah menggunakan domain email publik (seperti @gmail.com) untuk korespondensi keamanan formal.",
            answers: [
                { id: 1, text: "Laporkan sebagai Phishing", desc: "Kirim email ini ke tim IT Security pusat.", isCorrect: true, feedback: "Tepat sekali! Domain pengirim @gmail.com adalah bukti kuat bahwa email ini palsu. Melaporkannya adalah langkah terbaik." },
                { id: 2, text: "Klik Link Verifikasi", desc: "Segera amankan akun melalui tautan resmi.", isCorrect: false, feedback: "Bahaya! Mengeklik tautan tersebut akan mengarahkan Anda ke situs tiruan untuk mencuri password Anda." },
                { id: 3, text: "Cek Alamat Pengirim", desc: "Analisis validitas domain pengirim email.", isCorrect: false, feedback: "Langkah ini bagus untuk dianalisis, tapi pada akhirnya Anda harus melaporkan (Opsi 1) email tersebut, bukan hanya menganalisis." }
            ],
            progress: 30
        },
        {
            id: 4,
            title: "Simulasi Kasus: Ransomware Berkedok Invoice",
            desc: "Anda menerima email dari vendor fiktif berisi lampiran file ZIP yang diklaim sebagai tagihan (invoice) yang belum dibayar bulan ini.",
            emailSenderName: "Bagian Keuangan Vendor",
            emailSenderAddress: "finance@billing-services-info.com",
            emailSubject: "Tagihan Belum Dibayar - Invoice #INV-9284",
            emailBody: `
                <p>Yth. Bapak/Ibu,</p>
                <p>Terlampir invoice nomor INV-9284 untuk layanan bulan ini yang belum Anda lunasi.</p>
                <p>Mohon segera mengunduh file lampiran dan melakukan pembayaran untuk menghindari pemutusan layanan sementara. Rincian item dapat dilihat di dalam arsip ZIP tersebut.</p>
            `,
            emailActionText: "Unduh Invoice_09.zip",
            emailActionSubtext: "Ukuran: 1.2 MB (.ZIP Archive)",
            emailQuote: "Mohon segera diproses agar layanan tidak dihentikan.",
            emailSignoff: "<p>Salam,</p><p style='font-weight:700; color:#111827;'>Tim Keuangan</p>",
            tip: "Waspadai lampiran .ZIP tak terduga. Ransomware sering bersembunyi dalam file arsip untuk mengelabui filter antivirus email.",
            answers: [
                { id: 1, text: "Konfirmasi ke vendor via telepon.", desc: "Tanyakan langsung ke vendor asli.", isCorrect: true, feedback: "Benar! File .ZIP dari email tak terduga seringkali berisi Ransomware yang bisa mengenkripsi seluruh file komputer Anda." },
                { id: 2, text: "Unduh untuk melihat isinya.", desc: "Memastikan apakah tagihan ini valid.", isCorrect: false, feedback: "Sangat Berbahaya! Mengekstrak dan membuka isi file .ZIP tersebut bisa memicu eksekusi Ransomware." },
                { id: 3, text: "Teruskan ke rekan kerja.", desc: "Minta rekan memverifikasi invoice.", isCorrect: false, feedback: "Buruk! Meneruskan email ini berisiko membuat rekan kerja Anda secara tidak sengaja membuka file berbahaya tersebut." }
            ],
            progress: 40
        },
        {
            id: 5,
            title: "Simulasi Kasus: Pembaruan Software Palsu",
            desc: "Saat menjelajahi web, tiba-tiba muncul pop-up mendesak yang mengklaim browser Anda kedaluwarsa dan meminta Anda mengunduh update.",
            emailSenderName: "Sistem Keamanan Browser",
            emailSenderAddress: "alerts@system-update-center.net",
            emailSubject: "Peringatan Keamanan Kritis: Browser Anda Terlalu Kuno",
            emailBody: `
                <p>Peringatan Pengguna,</p>
                <p>Browser Anda terdeteksi menggunakan versi lama yang rentan terhadap serangan Zero-Day eksploit.</p>
                <p>Segera unduh patch perbaikan darurat agar Anda tetap terlindungi saat berselancar di internet.</p>
            `,
            emailActionText: "Update_Browser_Sekarang.exe",
            emailActionSubtext: "Pembaruan Kritis - 15MB",
            emailQuote: "Jangan ambil risiko diretas, selalu perbarui perangkat lunak Anda.",
            emailSignoff: "<p>Hormat Kami,</p><p style='font-weight:700; color:#111827;'>Pusat Peringatan Sistem</p>",
            tip: "Pembaruan browser resmi terjadi di latar belakang (background) secara otomatis atau melalui menu pengaturan internal browser, bukan lewat pop-up acak dari website.",
            answers: [
                { id: 1, text: "Tutup tab browser dan abaikan.", desc: "Abaikan pesan peringatan palsu tersebut.", isCorrect: true, feedback: "Bagus! Pop-up seperti ini dikenal sebagai 'Scareware' yang bertujuan menakuti Anda untuk menginstal malware." },
                { id: 2, text: "Klik dan instal pembaruan.", desc: "Mengamankan browser dari Zero-Day eksploit.", isCorrect: false, feedback: "Sangat Berbahaya! File .exe tersebut dipastikan adalah malware atau Trojan yang menyamar." },
                { id: 3, text: "Bagikan pop-up ke grup IT.", desc: "Peringatkan orang lain tentang masalah ini.", isCorrect: false, feedback: "Tidak perlu. Membuang waktu dan dapat memicu kepanikan. Cukup abaikan dan tutup." }
            ],
            progress: 50
        },
        {
            id: 6,
            title: "Simulasi Kasus: Pesan CEO Mendesak",
            desc: "Menerima pesan WhatsApp mendadak dari nomor tak dikenal yang menggunakan foto profil CEO perusahaan Anda, meminta transfer dana darurat.",
            emailSenderName: "Bapak CEO (via WhatsApp)",
            emailSenderAddress: "+62-899-0011-2233",
            emailSubject: "Transfer Dana Darurat Klien",
            emailBody: `
                <p>Halo,</p>
                <p>Saya sedang meeting tertutup dengan klien penting dan butuh dana cepat untuk DP proyek hari ini juga sebesar Rp25 Juta.</p>
                <p>Tolong segera transfer ke rekening ini, nanti siang saya ganti. Ini sangat mendesak dan rahasia.</p>
            `,
            emailActionText: "Transfer ke Rek. BCA 10293xxx",
            emailActionSubtext: "Atas Nama: Budi (Klien)",
            emailQuote: "Kerjakan secepatnya, saya tunggu laporannya dalam 10 menit.",
            emailSignoff: "<p>Salam,</p><p style='font-weight:700; color:#111827;'>CEO Anda</p>",
            tip: "Serangan ini disebut CEO Fraud / Whaling. Penyerang meniru eksekutif tinggi dengan alasan mendesak untuk memaksa karyawan bawahan mentransfer uang.",
            answers: [
                { id: 1, text: "Verifikasi via saluran resmi lain.", desc: "Hubungi telepon kantor atau sekretaris.", isCorrect: true, feedback: "Sangat Tepat! Ini adalah serangan BEC / CEO Fraud. Selalu verifikasi langsung ke pihak terkait." },
                { id: 2, text: "Segera transfer demi karier.", desc: "Mematuhi perintah atasan agar tidak dipecat.", isCorrect: false, feedback: "Berbahaya! Perusahaan tidak akan meminta transfer uang ke rekening pribadi asing secara mendadak via WhatsApp." },
                { id: 3, text: "Balas pesan meminta kepastian.", desc: "Tanyakan apakah ini benar CEO.", isCorrect: false, feedback: "Kurang tepat. Pelaku akan tetap bersikeras bahwa ia adalah CEO yang sedang dalam kondisi darurat." }
            ],
            progress: 60
        },
        {
            id: 7,
            title: "Simulasi Kasus: Undian Berhadiah",
            desc: "Mendapat pop-up di layar handphone dari platform e-commerce yang mengklaim Anda memenangkan undian Rp50 Juta.",
            emailSenderName: "Layanan E-Commerce Resmi",
            emailSenderAddress: "promo-gebyar@belanja-untung-info.com",
            emailSubject: "SELAMAT! Anda Pemenang Undian Gebyar 2024",
            emailBody: `
                <p>Pelanggan Setia,</p>
                <p>Selamat! Nomor handphone Anda terpilih sebagai pemenang pertama undian Gebyar sebesar <strong>Rp50 Juta</strong>!</p>
                <p>Untuk mengklaim hadiah Anda, silakan bayar biaya administrasi sebesar Rp250.000 saja ke rekening agen pengesahan kami.</p>
            `,
            emailActionText: "Klaim Hadiah Sekarang",
            emailActionSubtext: "Bayar Admin Rp250.000",
            emailQuote: "Promo ini terbatas, klaim sebelum pukul 23:59 malam ini.",
            emailSignoff: "<p>Selamat!</p><p style='font-weight:700; color:#111827;'>Panitia Gebyar 2024</p>",
            tip: "Taktik Advance-Fee Scam: Penipu meminta korban membayar sejumlah uang kecil di muka dengan janji imbalan besar yang sebenarnya tidak pernah ada.",
            answers: [
                { id: 1, text: "Abaikan dan hapus pesan.", desc: "Mengabaikan janji manis palsu.", isCorrect: true, feedback: "Tepat! Undian resmi tidak pernah memungut biaya administrasi di muka yang harus ditransfer ke rekening pribadi." },
                { id: 2, text: "Kirim Rp250.000 untuk klaim.", desc: "Kesempatan emas jangan dilewatkan.", isCorrect: false, feedback: "Sangat Berbahaya! Ini adalah bentuk Advance-Fee Scam klasik. Uang admin Anda akan hilang dan hadiahnya fiktif." },
                { id: 3, text: "Berikan data diri untuk klaim.", desc: "Cukup isi formulir tanpa transfer.", isCorrect: false, feedback: "Tetap Berbahaya! Data pribadi Anda bisa disalahgunakan untuk pinjaman online ilegal atau dijual di Dark Web." }
            ],
            progress: 70
        },
        {
            id: 8,
            title: "Simulasi Kasus: Wi-Fi Publik di Bandara",
            desc: "Sedang menunggu pesawat di bandara, Anda melihat sinyal Wi-Fi terbuka tanpa password bernama 'Free_Airport_WiFi_Fast'.",
            emailSenderName: "Sistem Jaringan Terbuka",
            emailSenderAddress: "Portal Hotspot Bandara",
            emailSubject: "Peringatan: Jaringan Tanpa Enkripsi",
            emailBody: `
                <p>Anda akan terhubung ke <strong>Free_Airport_WiFi_Fast</strong> yang tidak diamankan dengan kata sandi WPA/WPA2.</p>
                <p>Apakah Anda ingin melanjutkan sesi browsing untuk mengecek saldo di aplikasi m-Banking Anda sekarang?</p>
                <br>
            `,
            emailActionText: "Buka m-Banking Sekarang",
            emailActionSubtext: "Sinyal Kuat",
            emailQuote: "Internet gratis dan cepat seringkali datang dengan harga privasi Anda.",
            emailSignoff: "<p>Status,</p><p style='font-weight:700; color:#111827;'>Koneksi Tidak Aman</p>",
            tip: "Serangan Man-in-the-Middle (MitM) sering terjadi di Wi-Fi publik tanpa password. Hacker dapat menyadap lalu lintas data dan mencuri kredensial perbankan Anda.",
            answers: [
                { id: 1, text: "Gunakan Paket Data Seluler (4G).", desc: "Menghindari jaringan WiFi publik.", isCorrect: true, feedback: "Tepat! Untuk transaksi perbankan, selalu gunakan jaringan seluler pribadi atau gunakan koneksi VPN terpercaya." },
                { id: 2, text: "Connect Wi-Fi lalu buka m-Banking.", desc: "Mumpung sinyal gratis dan cepat.", isCorrect: false, feedback: "Bahaya! Data transaksi dan password m-Banking Anda dapat disadap (sniffing) oleh pembuat hotspot palsu tersebut." },
                { id: 3, text: "Connect tapi hanya buka WA.", desc: "Membatasi diri dari aplikasi sensitif.", isCorrect: false, feedback: "Masih berisiko. Walaupun WhatsApp dienkripsi, penyerang masih bisa memanen metadata perangkat Anda." }
            ],
            progress: 80
        },
        {
            id: 9,
            title: "Simulasi Kasus: Dukungan IT Palsu",
            desc: "Anda menerima telepon dari seseorang yang mengaku dari Tim IT (Helpdesk) kantor, meminta password untuk 'memperbaiki akun email Anda yang bermasalah'.",
            emailSenderName: "Staf Helpdesk IT",
            emailSenderAddress: "Panggilan Telepon (Vishing)",
            emailSubject: "Dimohon Kerjasamanya - Perbaikan Server Email",
            emailBody: `
                <p>Halo, saya dari IT Support Pusat.</p>
                <p>Server kami sedang mengalami gangguan dan kami melihat akun email Anda terancam terhapus dari database.</p>
                <p>Untuk menstabilkan akun Anda, mohon sebutkan Password Anda sekarang juga agar saya dapat memperbaikinya dari sistem backend.</p>
            `,
            emailActionText: "Sebutkan Password",
            emailActionSubtext: "Amankan akun sekarang",
            emailQuote: "Tim IT asli tidak pernah meminta kata sandi Anda dalam kondisi apa pun.",
            emailSignoff: "<p>Status,</p><p style='font-weight:700; color:#111827;'>Menunggu Konfirmasi</p>",
            tip: "Admin sistem, tim IT perusahaan, maupun customer service resmi memiliki akses backend yang TIDAK memerlukan kata sandi pengguna sama sekali.",
            answers: [
                { id: 1, text: "Tolak dan matikan telepon.", desc: "Lalu laporkan ke IT resmi.", isCorrect: true, feedback: "Langkah Sempurna! IT resmi tidak akan pernah meminta password Anda. Tolak, tutup telepon, dan laporkan." },
                { id: 2, text: "Sebutkan password Anda.", desc: "Mematuhi instruksi tim IT.", isCorrect: false, feedback: "Fatal! Ini adalah Social Engineering (Vishing). Anda baru saja memberikan akses akun ke penjahat." },
                { id: 3, text: "Ubah jadi 12345 lalu berikan.", desc: "Memberi password dummy yang mudah.", isCorrect: false, feedback: "Buruk! Password apapun yang Anda berikan tetap membuka akses mereka ke data sensitif dalam akun Anda." }
            ],
            progress: 90
        },
        {
            id: 10,
            title: "Simulasi Kasus: Pelanggaran Hak Cipta Sosmed",
            desc: "Anda menerima Direct Message (DM) di akun bisnis Instagram Anda yang mengatasnamakan 'Meta Support', menuduh Anda melanggar hak cipta.",
            emailSenderName: "Meta Copyright Infringement",
            emailSenderAddress: "DM Instagram (Verified Badge Palsu)",
            emailSubject: "Peringatan Penghapusan Akun Instagram Permanen",
            emailBody: `
                <p>Pengguna Terhormat,</p>
                <p>Kami telah menerima keluhan bahwa postingan terakhir Anda melanggar pedoman Hak Cipta kami.</p>
                <p>Jika Anda tidak mengajukan banding melalui tautan di bawah ini dalam waktu 24 jam, akun bisnis Anda akan dinonaktifkan secara permanen.</p>
            `,
            emailActionText: "Ajukan Banding (Appeal)",
            emailActionSubtext: "Tautan ke form eksternal",
            emailQuote: "Sistem banding resmi platform sosial media selalu berada di dalam pengaturan aplikasi, bukan lewat DM.",
            emailSignoff: "<p>Hormat kami,</p><p style='font-weight:700; color:#111827;'>Meta Copyright Team</p>",
            tip: "Platform sosial media (Instagram, Twitter, Tiktok) tidak mengirimkan peringatan pelanggaran akun melalui Direct Message biasa. Semua peringatan masuk via notifikasi sistem.",
            answers: [
                { id: 1, text: "Abaikan dan block pengirim.", desc: "Tidak merespon pesan ancaman palsu.", isCorrect: true, feedback: "Sangat Tepat! Ini adalah upaya pencurian akun (Account Hijacking). Meta tidak pernah menghubungi Anda melalui DM." },
                { id: 2, text: "Klik tautan dan login.", desc: "Menyelamatkan akun dari pemblokiran.", isCorrect: false, feedback: "Fatal! Halaman banding itu palsu. Setelah Anda login di sana, pelaku akan mengambil alih akun Instagram Anda sepenuhnya." },
                { id: 3, text: "Minta maaf via DM.", desc: "Berharap mereka tidak menghapus akun.", isCorrect: false, feedback: "Tidak Berguna. Mereka adalah bot penipu yang akan tetap mendesak Anda untuk mengeklik tautan phishing mereka." }
            ],
            progress: 100
        }
    ];

    let currentCaseIndex = 0; // Start from the first case
    let selectedAnswerId = null;
    let totalScore = 0;

    window.addEventListener('DOMContentLoaded', () => {
        loadScenario();
        startTimer(4, 12); // start timer with 04:12 as prototype
    });

    // Load dynamic case
    function loadScenario() {
        const sc = scenarios[currentCaseIndex];
        selectedAnswerId = null;

        // Header info
        document.getElementById('case-title').innerText = sc.title;
        document.getElementById('case-description').innerText = sc.desc;
        document.getElementById('case-counter-text').innerHTML = `${sc.id.toString().padStart(2, '0')} <span style="font-size: 0.85rem; font-weight: 500; color: #9CA3AF;">/ 10 Kasus</span>`;
        document.getElementById('sim-progress-bar').style.width = sc.progress + '%';

        // Mock Email Client info
        document.getElementById('email-sender-name').innerText = sc.emailSenderName;
        document.getElementById('email-sender-address').innerText = sc.emailSenderAddress;
        document.getElementById('email-subject').innerText = sc.emailSubject;
        
        // Email Body
        const textWrapper = document.getElementById('email-body-text');
        textWrapper.innerHTML = sc.emailBody;
        
        // Action Button inside email
        const btn = document.getElementById('email-action-btn');
        btn.innerText = sc.emailActionText;
        document.getElementById('email-action-subtext').innerText = sc.emailActionSubtext;

        // Quote and Sign-off
        document.getElementById('email-quote').innerText = sc.emailQuote;
        document.getElementById('email-signoff').innerHTML = sc.emailSignoff;

        // Cyber-Tip resetting
        document.getElementById('tip-text').innerText = sc.tip;

        // Render Action Choices (Right panel)
        const container = document.getElementById('action-1').parentElement;
        container.innerHTML = '';

        sc.answers.forEach((ans, idx) => {
            const cardId = `action-${idx + 1}`;
            
            // Icon customization per action type
            let iconName = 'shield-check';
            let iconColor = '#10B981';
            let bgIconColor = '#D1FAE5';

            if (idx === 1) {
                iconName = 'link-2';
                iconColor = '#EF4444';
                bgIconColor = '#FEE2E2';
            } else if (idx === 2) {
                iconName = 'at-sign';
                iconColor = '#3B82F6';
                bgIconColor = '#EFF6FF';
            }

            const item = document.createElement('div');
            item.id = cardId;
            item.className = 'sim-action-card';
            item.onclick = () => selectAction(idx + 1, ans.id);
            item.style.display = 'flex';
            item.style.alignItems = 'center';
            item.style.gap = '16px';
            item.style.padding = '1.1rem';
            item.style.borderRadius = '1rem';
            item.style.border = '1px solid #E5E7EB';
            item.style.background = '#fff';
            item.style.cursor = 'pointer';
            item.style.transition = 'all 0.25s ease';

            const iconDiv = document.createElement('div');
            iconDiv.style.width = '42px';
            iconDiv.style.height = '42px';
            iconDiv.style.borderRadius = '0.75rem';
            iconDiv.style.background = bgIconColor;
            iconDiv.style.display = 'flex';
            iconDiv.style.alignItems = 'center';
            iconDiv.style.justifyContent = 'center';
            iconDiv.style.flexShrink = '0';

            const icon = document.createElement('i');
            icon.setAttribute('data-lucide', iconName);
            icon.style.width = '20px';
            icon.style.height = '20px';
            icon.style.color = iconColor;
            iconDiv.appendChild(icon);

            const contentDiv = document.createElement('div');
            contentDiv.style.flex = '1';

            const title = document.createElement('h4');
            title.style.fontSize = '0.9rem';
            title.style.fontWeight = '800';
            title.style.color = '#111827';
            title.innerText = ans.text;

            contentDiv.appendChild(title);

            if (ans.desc) {
                const sub = document.createElement('p');
                sub.style.fontSize = '0.75rem';
                sub.style.color = '#6B7280';
                sub.style.marginTop = '2px';
                sub.innerText = ans.desc;
                contentDiv.appendChild(sub);
            }

            item.appendChild(iconDiv);
            item.appendChild(contentDiv);
            container.appendChild(item);
        });

        // Refresh icons
        lucide.createIcons();
    }

        // Interactive Action selection
    function selectAction(num, ansId) {
        selectedAnswerId = ansId;
        
        // Reset all borders
        const cards = document.querySelectorAll('.sim-action-card');
        cards.forEach(c => {
            c.style.border = '1px solid #E5E7EB';
            c.style.background = '#fff';
            c.style.boxShadow = 'none';
        });

        // Select the active card
        const selected = document.getElementById(`action-${num}`);
        let glowColor = 'rgba(59, 130, 246, 0.15)'; // Blue
        let borderColor = '#3B82F6';

        if (num === 1) {
            glowColor = 'rgba(16, 185, 129, 0.15)'; // Green
            borderColor = '#10B981';
        } else if (num === 2) {
            glowColor = 'rgba(239, 68, 68, 0.15)'; // Red
            borderColor = '#EF4444';
        }

        selected.style.border = `2px solid ${borderColor}`;
        selected.style.background = glowColor.replace('0.15', '0.02');
        selected.style.boxShadow = `0 4px 15px ${glowColor}`;

        // Feedback in Cyber-Tip area based on selected answer
        const sc = scenarios[currentCaseIndex];
        const selectedObj = sc.answers[num - 1];
        
        const tipContainer = document.getElementById('tip-container');
        if (selectedObj.isCorrect) {
            tipContainer.style.background = '#ECFDF5';
            tipContainer.style.borderColor = '#10B981';
            document.getElementById('tip-text').innerHTML = `<strong>Tepat sekali!</strong> ${selectedObj.feedback}`;
        } else {
            tipContainer.style.background = num === 2 ? '#FEF2F2' : '#F0F9FF';
            tipContainer.style.borderColor = num === 2 ? '#EF4444' : '#3B82F6';
            document.getElementById('tip-text').innerHTML = `<strong>${num === 2 ? 'Bahaya!' : 'Analisis Menarik!'}</strong> ${selectedObj.feedback}`;
        }
    }

    // Submit Answer & Move Forward
    function submitAnswer() {
        if (selectedAnswerId === null) {
            alert("Harap pilih salah satu tindakan Anda terlebih dahulu untuk merespon kasus ini!");
            return;
        }

        const sc = scenarios[currentCaseIndex];
        const selectedChoice = sc.answers.find(a => a.id === selectedAnswerId);

        if (selectedChoice.isCorrect) {
            alert("Jawaban Benar! Anda berhasil mendeteksi ancaman Phishing ini.");
            totalScore++;
        } else {
            alert("Jawaban Kurang Tepat. Hati-hati, rekayasa sosial memanfaatkan kepanikan korban!");
        }

        advanceCase();
    }

    // Skip
    function skipCase() {
        advanceCase();
    }

    function advanceCase() {
        currentCaseIndex++;
        if (currentCaseIndex >= scenarios.length) {
            let finalScore = Math.round((totalScore / scenarios.length) * 100);
            // Post result to API
            fetch("{{ route('save.result') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    type: "simulasi",
                    reference_id: "global-simulasi",
                    score: finalScore,
                    max_score: 100
                })
            }).then(() => {
                window.location.href = "{{ route('hasil') }}";
            }).catch(err => {
                console.error("Error saving result:", err);
                window.location.href = "{{ route('hasil') }}";
            });
        } else {
            // Show next case
            loadScenario();
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
                alert("Waktu simulasi kasus habis!");
                let finalScore = Math.round((totalScore / scenarios.length) * 100);
                // Post result to API
                fetch("{{ route('save.result') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        type: "simulasi",
                        reference_id: "global-simulasi",
                        score: finalScore,
                        max_score: 100
                    })
                }).finally(() => {
                    window.location.href = "{{ route('hasil') }}";
                });
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
