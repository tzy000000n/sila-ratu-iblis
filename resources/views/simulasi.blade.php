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
                { id: 1, text: "Segera kirimkan OTP karena dana terancam lenyap.", isCorrect: false },
                { id: 2, text: "Abaikan pesan, lalu segera hubungi Call Center resmi bank.", isCorrect: true },
                { id: 3, text: "Balas SMS tersebut dan maki-maki pengirim spam.", isCorrect: false }
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
                { id: 1, text: "Instal aplikasi untuk melihat kebenaran tunggakan.", isCorrect: false },
                { id: 2, text: "Laporkan nomor tersebut ke WhatsApp dan abaikan file-nya.", isCorrect: true },
                { id: 3, text: "Cek domain pengirim dan unduh di laptop saja.", isCorrect: false }
            ],
            progress: 20
        },
        {
            id: 3, // Active case as per prototype
            title: "Simulasi Kasus: Serangan Phishing",
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
                { id: 1, text: "Laporkan sebagai Phishing", desc: "Kirim email ini ke tim IT Security pusat.", isCorrect: true },
                { id: 2, text: "Klik Link Verifikasi", desc: "Segera amankan akun melalui tautan resmi.", isCorrect: false },
                { id: 3, text: "Cek Alamat Pengirim", desc: "Analisis validitas domain pengirim email.", isCorrect: false }
            ],
            progress: 30
        }
    ];

    let currentCaseIndex = 2; // Case 3 (index 2) is the Phishing Gmail Scenario from prototype
    let selectedAnswerId = null;

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
            document.getElementById('tip-text').innerHTML = `<strong>Tepat sekali!</strong> Memang benar, respons terbaik adalah melaporkan email berbahaya ke tim IT perusahaan agar segera diblokir secara massal di gateway surat.`;
        } else {
            if (num === 2) {
                tipContainer.style.background = '#FEF2F2';
                tipContainer.style.borderColor = '#EF4444';
                document.getElementById('tip-text').innerHTML = `<strong>Bahaya!</strong> Mengeklik tombol verifikasi pada email phishing di samping akan mengarahkan Anda ke situs tiruan pencuri sandi (credential harvesting website) yang merugikan keamanan akun Anda.`;
            } else {
                tipContainer.style.background = '#F0F9FF';
                tipContainer.style.borderColor = '#3B82F6';
                document.getElementById('tip-text').innerHTML = `<strong>Analisis Menarik!</strong> Mengecek alamat pengirim adalah langkah cerdas. Di sini, domain pengirim <strong>@gmail.com</strong> mempertegas email ini palsu, karena support resmi Nexyra pasti memakai nama domain <strong>@nexyra.com</strong>.`;
            }
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
        // Since it's a prototype loop, we rotate cases or redirect to results page
        if (currentCaseIndex === 0) {
            // End of cases loop, go to results page
            window.location.href = "{{ route('hasil') }}";
        } else {
            // Decrease index to show another case (rotating Cases 3 -> 2 -> 1)
            currentCaseIndex--;
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
                window.location.href = "{{ route('hasil') }}";
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
