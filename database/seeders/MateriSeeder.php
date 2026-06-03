<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        $materiList = [
            // ================== KEAMANAN DIGITAL ==================
            [
                'judul' => 'Dasar Keamanan Digital',
                'deskripsi' => 'Pahami prinsip dasar cara kerja internet dan ancaman cyber umum yang perlu kamu waspadai.',
                'level' => 'EASY',
                'kategori' => 'Keamanan Digital',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Bayangkan kamu menerima email dari platform media sosial favoritmu, yang mengatakan bahwa akunmu telah dikunci. Mereka memintamu untuk segera "klik di sini" untuk memverifikasi identitasmu. Email tersebut terlihat sangat meyakinkan, lengkap dengan logo dan gaya bahasa yang biasa mereka gunakan. Namun, di balik tampilan profesional itu, ada penjahat siber yang sedang menunggu kamu memasukkan data pribadimu.</p>
                    <p style="margin-bottom:1.5rem;">Serangan ini disebut <strong>Phishing</strong>. Namanya berasal dari kata bahasa Inggris "fishing" (memancing), karena penyerang menyebarkan "umpan" digital dengan harapan ada satu atau dua orang yang "terpancing" dan memberikan informasi sensitif mereka.</p>
                    <div style="background-color: #0F172A; border-radius: 1rem; overflow: hidden; margin: 2rem 0;">
                        <div style="height: 220px; display: flex; align-items: center; justify-content: center; position: relative;">
                            <div style="width: 100px; height: 100px; border-radius: 50%; border: 3px solid rgba(56,189,248,0.4); display: flex; align-items: center; justify-content: center; box-shadow: 0 0 40px rgba(56,189,248,0.2);">
                                <i data-lucide="shield" style="width: 52px; height: 52px; color: #38BDF8;"></i>
                            </div>
                            <div style="position: absolute; bottom: 0.75rem; left: 0; right: 0; text-align: center; font-size: 0.75rem; color: rgba(255,255,255,0.5);">Ilustrasi: Bagaimana umpan digital menjerat perangkat personalmu dalam skema phishing.</div>
                        </div>
                    </div>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Ciri-ciri Utama Serangan Phishing</h2>
                    <p style="margin-bottom:1rem;">Meskipun penyerang semakin canggih, mereka sering meninggalkan jejak yang bisa kita kenali jika kita teliti. Berikut adalah beberapa "bendera merah" yang harus kamu waspadai:</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Rasa Urgensi yang Berlebihan:</strong> Mengancam bahwa akunmu akan ditutup dalam 24 jam jika tidak segera bertindak.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Kesalahan Ketik & Tata Bahasa:</strong> Perusahaan besar jarang mengirimkan pesan dengan kesalahan ejaan yang mencolok.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Alamat Email Pengirim yang Aneh:</strong> Misalnya, "support@instagram-security.com" alih-alih "@instagram.com".</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Tautan yang Mencurigakan:</strong> Saat kamu mengarahkan kursor (hover) ke tautan, alamat yang muncul berbeda dengan teks yang tertulis.</span>
                        </li>
                    </ul>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Prinsip CIA dalam Keamanan Digital</h2>
                    <p style="margin-bottom:1.5rem;">Keamanan informasi dibangun di atas tiga pilar utama yang dikenal sebagai <strong>CIA Triad</strong>:</p>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 2rem;">
                        <div style="background: linear-gradient(135deg, #EDE9FE, #F5F3FF); border-radius: 0.75rem; padding: 1.25rem; text-align: center;">
                            <i data-lucide="eye-off" style="width: 28px; height: 28px; color: var(--primary); margin-bottom: 0.5rem;"></i>
                            <h4 style="font-weight: 800; margin-bottom: 0.25rem;">Confidentiality</h4>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">Informasi hanya bisa diakses oleh pihak yang berwenang.</p>
                        </div>
                        <div style="background: linear-gradient(135deg, #D1FAE5, #ECFDF5); border-radius: 0.75rem; padding: 1.25rem; text-align: center;">
                            <i data-lucide="shield-check" style="width: 28px; height: 28px; color: var(--success); margin-bottom: 0.5rem;"></i>
                            <h4 style="font-weight: 800; margin-bottom: 0.25rem;">Integrity</h4>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">Data tidak diubah atau dimanipulasi tanpa izin.</p>
                        </div>
                        <div style="background: linear-gradient(135deg, #FEF3C7, #FFFBEB); border-radius: 0.75rem; padding: 1.25rem; text-align: center;">
                            <i data-lucide="activity" style="width: 28px; height: 28px; color: var(--warning); margin-bottom: 0.5rem;"></i>
                            <h4 style="font-weight: 800; margin-bottom: 0.25rem;">Availability</h4>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">Sistem dan data selalu tersedia saat dibutuhkan.</p>
                        </div>
                    </div>
                '
            ],
            [
                'judul' => 'Waspada Social Engineering',
                'deskripsi' => 'Bukan hanya kode, manusia adalah titik lemah terbesar dalam keamanan siber.',
                'level' => 'EASY',
                'kategori' => 'Keamanan Digital',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Social engineering adalah seni memanipulasi orang agar mau memberikan informasi rahasia atau melakukan tindakan tertentu. Berbeda dengan serangan teknis yang menyerang sistem, social engineering menyerang manusia — elemen yang paling sulit "dipatch".</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Jenis-jenis Social Engineering</h2>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 2rem;">
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; border: 1px solid var(--border);">
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                                <i data-lucide="phone" style="width: 18px; height: 18px; color: var(--primary);"></i>
                                <h4 style="font-weight: 800; font-size: 0.9rem;">Vishing</h4>
                            </div>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.6;">Penipuan melalui telepon. Penyerang berpura-pura menjadi petugas bank atau instansi resmi.</p>
                        </div>
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; border: 1px solid var(--border);">
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                                <i data-lucide="message-square" style="width: 18px; height: 18px; color: var(--warning);"></i>
                                <h4 style="font-weight: 800; font-size: 0.9rem;">Smishing</h4>
                            </div>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.6;">Phishing melalui SMS. Biasanya berisi link palsu dengan iming-iming hadiah atau ancaman.</p>
                        </div>
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; border: 1px solid var(--border);">
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                                <i data-lucide="users" style="width: 18px; height: 18px; color: var(--success);"></i>
                                <h4 style="font-weight: 800; font-size: 0.9rem;">Pretexting</h4>
                            </div>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.6;">Penyerang menciptakan skenario palsu untuk mendapatkan kepercayaan korban.</p>
                        </div>
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; border: 1px solid var(--border);">
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                                <i data-lucide="gift" style="width: 18px; height: 18px; color: var(--danger);"></i>
                                <h4 style="font-weight: 800; font-size: 0.9rem;">Baiting</h4>
                            </div>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.6;">Menggunakan iming-iming (hadiah, konten gratis) untuk memancing korban mengklik link berbahaya.</p>
                        </div>
                    </div>
                    <div style="background: #F5F3FF; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid rgba(123,97,255,0.2);">
                        <p style="margin-bottom:0; font-weight:600; color: #1F1A3A;">Kunci pertahanan terbaik terhadap social engineering adalah <strong>skeptisisme yang sehat</strong>. Selalu verifikasi identitas pengirim melalui saluran resmi sebelum memberikan informasi apapun.</p>
                    </div>
                '
            ],
            [
                'judul' => 'Forensik Digital Lanjutan',
                'deskripsi' => 'Pelajari cara melacak jejak digital dan investigasi cyber crime menggunakan toolkit profesional.',
                'level' => 'HARD',
                'kategori' => 'Keamanan Digital',
                'is_premium' => true,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Forensik digital adalah cabang ilmu keamanan siber yang berfokus pada identifikasi, ekstraksi, dan analisis bukti-bukti digital dari perangkat keras maupun lunak. Para penegak hukum maupun auditor keamanan korporat sangat bergantung pada forensik digital untuk memecahkan kasus insiden siber.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Tahapan Utama Forensik</h2>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Akuisisi Data:</strong> Melakukan kloning *bit-by-bit* terhadap hard drive tersangka menggunakan write-blocker agar data asli tidak termodifikasi.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Eksaminasi & Ekstraksi:</strong> Membaca *file system* dan mencari artefak tersembunyi yang mungkin sudah dihapus (menggunakan alat seperti Autopsy).</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Analisis:</strong> Menarik garis waktu (timeline) dari kejadian, menghubungkan alamat IP, dan merangkai teka-teki peretasan.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Pelaporan:</strong> Menyajikan temuan dalam laporan berstandar hukum yang bisa dipertanggungjawabkan di pengadilan (Chain of Custody).</span>
                        </li>
                    </ul>
                    <p style="margin-bottom:1.5rem;">Setiap insiden pasti meninggalkan jejak (Logs). Menguasai tool analisis seperti Wireshark dan EnCase akan sangat membantu Anda dalam melacak arah gerak penyerang dalam sistem.</p>
                '
            ],
            [
                'judul' => 'Keamanan Perangkat Mobile',
                'deskripsi' => 'Tips mengamankan smartphone Anda dari malware dan penyadapan.',
                'level' => 'EASY',
                'kategori' => 'Keamanan Digital',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Smartphone Anda menyimpan jauh lebih banyak data privasi dibandingkan laptop Anda. Data lokasi GPS, akses perbankan, rekaman suara, hingga identitas biometrik semuanya tersimpan di saku Anda. Karenanya, smartphone menjadi target emas bagi penyerang.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Kerentanan Terbesar pada Mobile</h2>
                    <p style="margin-bottom:1.5rem;">Ancaman terbesar biasanya bukan datang dari peretasan canggih secara jarak jauh, melainkan dari kelalaian pengguna. Berikut adalah beberapa hal yang sangat rawan:</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Aplikasi Pihak Ketiga:</strong> Mengunduh aplikasi berekstensi .apk di luar Google Play Store sangat berisiko disusupi spyware.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Permintaan Izin Tidak Wajar:</strong> Aplikasi "Senter" yang meminta izin untuk mengakses Kontak dan Kamera Anda sangat mencurigakan.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>OS Usang:</strong> Sistem operasi Android atau iOS yang tidak diupdate selama berbulan-bulan memiliki eksploit keamanan publik yang belum tertutup.</span>
                        </li>
                    </ul>
                    <div style="background: #F9FAFB; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid var(--border);">
                        <p style="margin-bottom:0;">Pastikan untuk selalu memperbarui OS smartphone Anda, jangan pernah melakukan "root" atau "jailbreak" pada perangkat yang terhubung dengan akun bank, dan biasakan untuk mengatur izin aplikasi (App Permissions) secara ketat.</p>
                    </div>
                '
            ],
            [
                'judul' => 'Enkripsi Data untuk Pemula',
                'deskripsi' => 'Mengenal konsep kriptografi dasar dan cara mengamankan file penting.',
                'level' => 'MEDIUM',
                'kategori' => 'Keamanan Digital',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Enkripsi merupakan fondasi dari komunikasi digital yang aman. Tanpa enkripsi, setiap pesan WhatsApp yang Anda kirim dan setiap kata sandi internet banking yang Anda masukkan akan terlihat jelas oleh siapa saja yang meretas sinyal WiFi di kafe Anda.</p>
                    <p style="margin-bottom:1.5rem;">Singkatnya, enkripsi bekerja dengan menggunakan algoritma matematika canggih untuk mengacak "Plaintext" (teks biasa) menjadi "Ciphertext" (teks sandi) yang tidak dapat dibaca, kecuali Anda memiliki kunci dekripsinya.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Dua Jenis Kriptografi Utama</h2>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Symmetric Encryption (Simetris):</strong> Menggunakan satu kunci yang sama untuk mengunci (enkripsi) dan membuka (dekripsi) data. Contohnya adalah AES-256 yang sangat cepat dan umum digunakan untuk mengunci hard drive.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Asymmetric Encryption (Asimetris):</strong> Menggunakan sepasang kunci (Public Key dan Private Key). Sangat krusial untuk transaksi internet yang aman seperti SSL/TLS pada website HTTPS.</span>
                        </li>
                    </ul>
                    <p style="margin-bottom:1.5rem;">Sebagai end-user, pastikan Anda hanya bertransaksi di website yang memiliki ikon gembok "HTTPS", dan pertimbangkan untuk mengaktifkan fitur enkripsi bawaan sistem operasi (BitLocker pada Windows atau FileVault pada macOS).</p>
                '
            ],
            [
                'judul' => 'Mengenal Malware: Virus, Trojan, dan Worm',
                'deskripsi' => 'Pahami jenis-jenis perangkat lunak berbahaya dan cara mereka menyebar.',
                'level' => 'EASY',
                'kategori' => 'Keamanan Digital',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">"Malware" merupakan singkatan dari Malicious Software (perangkat lunak jahat). Orang awam sering menyebut semua malware sebagai "Virus", padahal di dunia keamanan siber, malware memiliki banyak taksonomi yang berbeda berdasarkan cara mereka bekerja dan mereplikasi diri.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Jenis-Jenis Malware</h2>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 2rem;">
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; text-align: center; border: 1px solid var(--border);">
                            <h4 style="font-weight: 800; margin-bottom: 0.5rem; color: var(--danger);">Virus</h4>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">Menyisipkan kodenya ke dalam file asli. Membutuhkan interaksi pengguna (mengklik file) untuk mulai menyebar.</p>
                        </div>
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; text-align: center; border: 1px solid var(--border);">
                            <h4 style="font-weight: 800; margin-bottom: 0.5rem; color: var(--warning);">Trojan</h4>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">Menyamar sebagai software berguna (seperti game gratis) tapi diam-diam membuka pintu belakang (backdoor) ke peretas.</p>
                        </div>
                        <div style="background: #F9FAFB; border-radius: 0.75rem; padding: 1.25rem; text-align: center; border: 1px solid var(--border);">
                            <h4 style="font-weight: 800; margin-bottom: 0.5rem; color: var(--primary);">Worm</h4>
                            <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.5;">Sangat berbahaya karena dapat bereplikasi sendiri melalui jaringan tanpa membutuhkan file perantara atau klik dari korban.</p>
                        </div>
                    </div>
                    <p style="margin-bottom:1.5rem;">Selain tiga jenis di atas, saat ini ancaman paling menakutkan adalah <strong>Ransomware</strong>, yaitu tipe malware yang mengunci seluruh file Anda menggunakan enkripsi militer dan menuntut tebusan uang kripto untuk memulihkannya. Jangan pernah mematikan perlindungan antivirus bawaan sistem operasi Anda!</p>
                '
            ],

            // ================== PASSWORD ==================
            [
                'judul' => 'Seni Mengelola Password',
                'deskripsi' => 'Belajar membuat password yang kuat dan menggunakan password manager untuk keamanan maksimal.',
                'level' => 'MEDIUM',
                'kategori' => 'Password',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Password adalah kunci pertama pertahanan digitalmu. Sayangnya, banyak orang masih menggunakan password yang mudah ditebak seperti "123456" atau nama hewan peliharaan mereka. Di era modern ini, hacker memiliki alat yang bisa mencoba jutaan kombinasi password dalam hitungan detik.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Anatomi Password yang Kuat</h2>
                    <p style="margin-bottom:1.5rem;">Password yang baik memiliki beberapa karakteristik penting:</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Minimal 12 karakter</strong> — semakin panjang, semakin sulit ditebak.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Kombinasi huruf besar, kecil, angka, dan simbol</strong> seperti @, #, $, !.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Tidak mengandung informasi pribadi</strong> seperti nama, tanggal lahir, atau nomor telepon.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Unik untuk setiap akun</strong> — jangan gunakan password yang sama di banyak tempat.</span>
                        </li>
                    </ul>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Teknik Membuat Password yang Mudah Diingat</h2>
                    <p style="margin-bottom:1.5rem;">Gunakan teknik <strong>passphrase</strong>: gabungkan 4-5 kata acak yang tidak berhubungan. Contoh: <code style="background: #F3F4F6; padding: 0.2rem 0.5rem; border-radius: 0.25rem; font-family: monospace;">Kucing-Biru-Terbang-2024!</code> — mudah diingat tapi sangat sulit ditebak.</p>
                    <div style="background: linear-gradient(135deg, #F5F3FF, #EDE9FE); border-radius: 0.75rem; padding: 1.5rem; margin: 2rem 0;">
                        <h4 style="font-weight: 800; margin-bottom: 0.75rem; color: var(--primary);">Contoh Perbandingan Kekuatan Password</h4>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <span style="font-family: monospace; background: white; padding: 0.35rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; min-width: 160px;">password123</span>
                                <div style="flex: 1; background: #FEE2E2; border-radius: 9999px; height: 8px;"><div style="background: var(--danger); height: 8px; border-radius: 9999px; width: 15%;"></div></div>
                                <span style="font-size: 0.75rem; font-weight: 700; color: var(--danger);">LEMAH</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <span style="font-family: monospace; background: white; padding: 0.35rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; min-width: 160px;">P@ssw0rd!</span>
                                <div style="flex: 1; background: #FEF3C7; border-radius: 9999px; height: 8px;"><div style="background: var(--warning); height: 8px; border-radius: 9999px; width: 50%;"></div></div>
                                <span style="font-size: 0.75rem; font-weight: 700; color: var(--warning);">SEDANG</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <span style="font-family: monospace; background: white; padding: 0.35rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; min-width: 160px;">Kucing-Biru-2024!</span>
                                <div style="flex: 1; background: #D1FAE5; border-radius: 9999px; height: 8px;"><div style="background: var(--success); height: 8px; border-radius: 9999px; width: 90%;"></div></div>
                                <span style="font-size: 0.75rem; font-weight: 700; color: var(--success);">KUAT</span>
                            </div>
                        </div>
                    </div>
                '
            ],
            [
                'judul' => 'Menerapkan Two-Factor Authentication (2FA)',
                'deskripsi' => 'Mengapa password saja tidak cukup? Pelajari lapisan keamanan tambahan.',
                'level' => 'EASY',
                'kategori' => 'Password',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Bahkan jika Anda memiliki password terkuat di dunia, password tersebut bisa saja bocor dari database pihak ketiga (seperti kebocoran data e-commerce besar). Oleh karena itu, kita tidak boleh hanya bergantung pada satu lapis kunci saja.</p>
                    <p style="margin-bottom:1.5rem;"><strong>Two-Factor Authentication (2FA)</strong> memaksa pengguna yang masuk untuk membuktikan identitas mereka menggunakan lebih dari satu metode otentikasi. Metode tersebut dibagi menjadi tiga kategori:</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Something you know (Sesuatu yang Anda ketahui):</strong> Kata sandi (password) atau PIN Anda.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Something you have (Sesuatu yang Anda miliki):</strong> Smartphone Anda (SMS OTP atau Aplikasi Authenticator) atau token perangkat keras.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Something you are (Diri Anda):</strong> Data biometrik seperti sidik jari atau pindai wajah.</span>
                        </li>
                    </ul>
                    <p style="margin-bottom:1.5rem;">Sangat disarankan untuk tidak menggunakan SMS OTP jika memungkinkan, dan beralihlah ke aplikasi seperti <strong>Google Authenticator</strong> atau <strong>Authy</strong>, karena SMS dapat disadap melalui teknik eksploitasi jaringan seluler.</p>
                '
            ],
            [
                'judul' => 'Bahaya Password Default',
                'deskripsi' => 'Risiko menggunakan kata sandi bawaan pabrik pada perangkat IoT dan router.',
                'level' => 'EASY',
                'kategori' => 'Password',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Pernahkah Anda membeli router WiFi baru, kamera CCTV pintar, atau TV Android, lalu membiarkan pengaturan login-nya tetap "admin" dan "admin" atau "1234"? Jika iya, Anda baru saja membukakan pintu rumah digital Anda untuk seluruh peretas di dunia.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Bagaimana Botnet Bekerja?</h2>
                    <p style="margin-bottom:1.5rem;">Ribuan skrip pemindai internet (bots) berpatroli tanpa henti untuk mencari perangkat baru yang terkoneksi. Begitu mereka menemukan perangkat (misalnya kamera CCTV) dengan koneksi publik, bot ini akan otomatis memasukkan daftar password default pabrikan dari berbagai merk (misalnya "admin/admin", "root/admin", "admin/12345").</p>
                    <div style="background: #FEF3C7; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid rgba(245, 158, 11, 0.4);">
                        <p style="margin-bottom:0; font-weight:600; color: #B45309;">Hanya butuh waktu kurang dari 5 menit bagi sebuah perangkat IoT ber-password default untuk diambil alih dan dijadikan bagian dari pasukan penyerangan DDoS (Botnet) global.</p>
                    </div>
                '
            ],
            [
                'judul' => 'Anatomi Serangan Brute Force',
                'deskripsi' => 'Bagaimana hacker menebak password Anda menggunakan komputasi tingkat tinggi.',
                'level' => 'MEDIUM',
                'kategori' => 'Password',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Brute force adalah teknik menebak-nebak (trial-and-error) kata sandi. Di masa lalu, ini diketik oleh manusia, namun saat ini penyerang menggunakan perangkat keras berdaya komputasi GPU yang tinggi yang mampu melakukan miliaran tebakan per detik.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Dua Metode Populer:</h2>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Dictionary Attack:</strong> Mesin mencoba satu per satu kata dari kamus peretasan (seperti file legendaris `rockyou.txt` yang berisi jutaan password bocor). Karenanya, sangat diharamkan menggunakan susunan kata yang umum dipakai.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Credential Stuffing:</strong> Penyerang mengambil bocoran database password dari website yang kurang aman (misal situs A), lalu bot akan menguji secara membabi-buta jutaan kombinasi email/password tersebut ke situs penting (seperti situs Bank atau PayPal). Ini yang membuat praktik daur ulang password sangat fatal.</span>
                        </li>
                    </ul>
                    <p style="margin-bottom:1.5rem;">Langkah preventif utama dari sisi developer adalah dengan menambahkan mekanisme pengunci akun sementara (Account Lockout) dan pemasangan CAPTCHA setiap 3 kali percobaan gagal.</p>
                '
            ],
            [
                'judul' => 'Mengamankan Akun Email Utama',
                'deskripsi' => 'Email adalah kunci dari semua akun Anda. Amankan sekarang.',
                'level' => 'EASY',
                'kategori' => 'Password',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Seberapa kuat pun password media sosial, e-banking, atau akun Netflix Anda, semuanya menjadi tidak berguna apabila akun email utama Anda (seperti Gmail atau Yahoo) berhasil diretas.</p>
                    <p style="margin-bottom:1.5rem;">Mengapa? Karena fitur "Lupa Kata Sandi" (Forgot Password) mengirimkan tautan penggantian sandi langsung ke email Anda. Jika peretas memegang email Anda, mereka secara teoritis memegang kunci ke SEMUA layanan web yang pernah Anda daftarkan.</p>
                    <div style="background: #F9FAFB; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid var(--border);">
                        <p style="margin-bottom:0; font-weight:700;">Selalu perlakukan akun email Anda layaknya brankas utama: Berikan password paling rumit yang hanya Anda simpan di Password Manager, dan JIBKAN penggunaan Autentikasi Dua Langkah (2FA) padanya!</p>
                    </div>
                '
            ],
            [
                'judul' => 'Mengenal Passwordless Authentication',
                'deskripsi' => 'Masa depan tanpa kata sandi: Biometrik dan Magic Links.',
                'level' => 'HARD',
                'kategori' => 'Password',
                'is_premium' => true,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Manusia memiliki keterbatasan untuk mengingat kombinasi teks rumit. Oleh sebab itu, industri keamanan digital (dipimpin oleh aliansi FIDO) sedang merintis transisi menuju masa depan "Passwordless".</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Metode Masa Depan (Passkeys)</h2>
                    <p style="margin-bottom:1.5rem;">Teknologi Passkeys (berbasis WebAuthn) memungkinkan perangkat Anda bertindak sebagai kunci itu sendiri. Alih-alih mengetik password yang bisa di-phishing, ponsel Anda melakukan otentikasi kriptografik publik-privat terenkripsi di latar belakang. Anda hanya perlu menyentuh sensor biometrik (sidik jari atau FaceID) pada perangkat untuk menyetujuinya.</p>
                    <p style="margin-bottom:1.5rem;">Keuntungan utamanya: Bahkan jika server database website itu berhasil dibobol peretas, para peretas hanya akan mendapatkan kunci publik yang sama sekali tidak berguna tanpa keberadaan fisik dari perangkat ponsel Anda.</p>
                '
            ],

            // ================== PHISHING ==================
            [
                'judul' => 'Memahami Serangan Phishing',
                'deskripsi' => 'Belajar mengenali tanda-tanda email dan pesan palsu.',
                'level' => 'EASY',
                'kategori' => 'Phishing',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Phishing berasal dari kata "fishing" (memancing), yang artinya penjahat siber menyebarkan umpan massal dengan harapan ada beberapa orang yang tidak awas dan memakan umpan tersebut.</p>
                    <div style="border-radius: 1rem; overflow: hidden; margin: 2rem 0; border: 1px solid var(--border); background-color: #0F172A;">
                        <div style="height: 220px; display: flex; align-items: center; justify-content: center; position: relative;">
                            <div style="width: 100px; height: 100px; border-radius: 50%; background: rgba(56,189,248,0.1); border: 2px solid rgba(56,189,248,0.4); display: flex; align-items: center; justify-content: center;">
                                <i data-lucide="mail-warning" style="width: 52px; height: 52px; color: #38BDF8;"></i>
                            </div>
                        </div>
                    </div>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Bentuk Paling Umum Phishing</h2>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Pemberitahuan Akun Ditutup:</strong> Email penipuan berdalih akun Anda akan diblokir dan Anda harus masuk untuk konfirmasi.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Tagihan Palsu:</strong> Melampirkan faktur pembayaran dengan nominal fantastis, memancing Anda membukanya (yang ternyata berisi malware pencuri sesi).</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Undian / Hadiah Palsu:</strong> Memberikan ilusi Anda memenangkan dana dan perlu melengkapi profil dengan nomor kartu kredit.</span>
                        </li>
                    </ul>
                '
            ],
            [
                'judul' => 'Spear Phishing: Serangan Bertarget',
                'deskripsi' => 'Bagaimana hacker menargetkan individu secara spesifik menggunakan data profil.',
                'level' => 'MEDIUM',
                'kategori' => 'Phishing',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Berbeda dengan phishing umum yang menebar jaring luas secara acak, Spear Phishing adalah serangan yang ditargetkan secara presisi tinggi pada satu individu spesifik.</p>
                    <p style="margin-bottom:1.5rem;">Pelaku akan melakukan riset (reconnaissance) berhari-hari melalui akun LinkedIn atau Instagram korbannya. Mereka akan menulis email yang sangat personal yang merujuk pada nama kolega korban, proyek terbaru yang sedang dikerjakan korban, atau hobi korban.</p>
                    <div style="background: #FEE2E2; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid rgba(239, 68, 68, 0.4);">
                        <p style="margin-bottom:0; font-weight:600; color: #991B1B;">Bahaya utama Spear Phishing adalah kualitas tulisannya yang nyaris tanpa cela (tanpa salah ketik) karena ditulis tangan secara khusus. Anda disarankan ekstra skeptis pada email mendadak yang menyertakan informasi privat Anda!</p>
                    </div>
                '
            ],
            [
                'judul' => 'Whaling: Menargetkan Eksekutif',
                'deskripsi' => 'Phishing level tinggi yang mengincar CEO dan direktur perusahaan.',
                'level' => 'HARD',
                'kategori' => 'Phishing',
                'is_premium' => true,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">"Whaling" (berburu paus) adalah sebutan untuk bentuk spear phishing yang menargetkan figur pejabat kelas atas perusahaan (CEO, CFO, atau direktur SDM).</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Modus Operandi Whaling</h2>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span>Penyerang seringkali mengambil alih (hack) email rekanan bisnis eksekutif tersebut terlebih dahulu agar kredibilitas pesan tidak dipertanyakan.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span>Email dirancang untuk mendesak transfer uang dalam jumlah besar (wire transfer) atas alasan tagihan mendesak.</span>
                        </li>
                    </ul>
                    <p style="margin-bottom:1.5rem;">Prosedur korporat modern menuntut bahwa setiap perintah transfer besar dari pimpinan wajib diotentikasi melalui panggilan suara dua arah, tidak peduli seberapa meyakinkannya isi email tersebut.</p>
                '
            ],
            [
                'judul' => 'Mendeteksi Domain Palsu (Typosquatting)',
                'deskripsi' => 'Teknik mengenali URL yang mirip tapi berbahaya.',
                'level' => 'MEDIUM',
                'kategori' => 'Phishing',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Mata manusia secara alamiah mengabaikan kesalahan kecil ketika melihat bentuk kata yang familiar. Fenomena psikologis ini dieksploitasi dalam bentuk serangan URL Typosquatting.</p>
                    <p style="margin-bottom:1.5rem;">Hacker akan membeli domain palsu yang hanya berbeda satu karakter dengan domain bank besar, contohnya <code style="font-weight:bold;">www.bca.co.id</code> dipalsukan menjadi <code style="font-weight:bold;">www.bca-id.com</code> atau <code style="font-weight:bold;">www.kIikbca.com</code> (huruf "l" diganti dengan "I" kapital).</p>
                    <div style="background: #D1FAE5; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid rgba(16, 185, 129, 0.4);">
                        <p style="margin-bottom:0; font-weight:600; color: #065F46;">Cyber-Tip: Gunakan fitur "Bookmarking" di browser Anda untuk menyimpan tautan asli internet banking Anda, agar Anda tidak perlu mengetikkan URL secara manual (yang memicu risiko salah ketik).</p>
                    </div>
                '
            ],
            [
                'judul' => 'Phishing di Era AI',
                'deskripsi' => 'Bagaimana AI dan Deepfake digunakan untuk membuat kampanye phishing yang sempurna.',
                'level' => 'HARD',
                'kategori' => 'Phishing',
                'is_premium' => true,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Dahulu, surel phishing dari luar negeri sangat mudah dideteksi karena grammar bahasa lokal yang diterjemahkan berantakan oleh mesin translasi kuno. Namun di era Generative AI (LLMs), penyerang dapat memerintahkan AI menulis surel penipuan yang sempurna, persuasif, dan tanpa cela tanda baca sedikitpun.</p>
                    <p style="margin-bottom:1.5rem;">Yang lebih mengerikan adalah ancaman Deepfake Audio (Voice Cloning). Hacker hanya membutuhkan cuplikan suara Anda berdurasi 3 detik dari sosial media untuk meniru suara Anda dengan tepat menggunakan AI. Mereka kemudian menelepon kerabat Anda dengan nomor palsu, memutar suara kloningan Anda yang meminta transfer darurat uang.</p>
                '
            ],
            [
                'judul' => 'Prosedur Tanggap Darurat Phishing',
                'deskripsi' => 'Langkah yang harus dilakukan jika Anda terlanjur mengklik tautan berbahaya.',
                'level' => 'EASY',
                'kategori' => 'Phishing',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Bagaimana jika dalam kelelahan, Anda tidak sengaja mengklik tautan phishing dari email asing dan sebuah layar login palsu muncul?</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Segera Lakukan:</h2>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span>Jangan mengisi formulir apapun. Tutup jendela browser secara langsung.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span>Jika Anda terlanjur mengisi kredensial, segera buka perangkat lain (seperti smartphone) dan ganti password akun tersebut dengan password acak yang baru.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span>Nyalakan koneksi internet perangkat utama Anda dalam status "Offline" / Airplane Mode sementara Anda menjalankan proses pemindaian antivirus total (Full Scan) untuk memastikan tidak ada backdoor (malware) yang terunduh di latar belakang.</span>
                        </li>
                    </ul>
                '
            ],

            // ================== NETWORKING ==================
            [
                'judul' => 'Dasar-dasar Jaringan Komputer',
                'deskripsi' => 'Pahami bagaimana perangkat saling terhubung dan berkomunikasi.',
                'level' => 'EASY',
                'kategori' => 'Networking',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Jaringan komputer pada dasarnya adalah jalan tol data yang menyambungkan perangkat miliaran di dunia. Sebelum mengamankannya, kita perlu memahaminya.</p>
                    <p style="margin-bottom:1.5rem;">Semua perangkat yang terhubung memiliki <strong>Alamat IP (IP Address)</strong> yang berfungsi layaknya koordinat alamat rumah di peta digital. Sementara itu, <strong>Alamat MAC</strong> adalah identifikasi permanen yang dibakar langsung pada chip mesin jaringan Anda dari pabrik.</p>
                    <div style="background: #F9FAFB; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid var(--border);">
                        <p style="margin-bottom:0; font-weight:500;">Berdasarkan skala luasnya, ada dua jaringan penting: LAN (Local Area Network - seperti WiFi rumah) dan WAN (Wide Area Network - yakni Internet global yang menjembatani banyak LAN).</p>
                    </div>
                '
            ],
            [
                'judul' => 'Memahami Protokol TCP/IP',
                'deskripsi' => 'Pondasi utama internet dan lapisan transmisinya.',
                'level' => 'MEDIUM',
                'kategori' => 'Networking',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Data internet tidak dikirimkan dalam sebuah bentuk file besar yang utuh. Data (misalnya file video 1 GB) dipotong-potong secara elektronik menjadi jutaan "paket" sangat kecil.</p>
                    <p style="margin-bottom:1.5rem;">Protokol TCP (Transmission Control Protocol) bertanggung jawab untuk memastikan setiap paket sampai ke tujuan secara urut, dan akan meminta pengiriman ulang jika ada paket yang hilang di jalan. Di sisi lain, protokol UDP mentransmisikan paket secara brutal tanpa peduli urutan (sangat berguna untuk Live Streaming atau Game Online yang tidak peduli pada akurasi mutlak).</p>
                '
            ],
            [
                'judul' => 'Keamanan Wi-Fi Publik',
                'deskripsi' => 'Risiko jaringan terbuka dan cara menggunakan VPN.',
                'level' => 'EASY',
                'kategori' => 'Networking',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">WiFi gratis di kedai kopi atau bandara memiliki lubang keamanan terbuka. Jaringan yang tidak di-password mengirimkan seluruh data transfer dalam bentuk polos (plaintext) melalui udara. Artinya, siapa pun di kedai kopi yang memakai software *packet sniffer* bisa membaca riwayat log dan kuki sesi browser Anda yang mengudara.</p>
                    <h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">Solusi Utama: VPN</h2>
                    <p style="margin-bottom:1.5rem;">VPN (Virtual Private Network) menutupi aktivitas Anda dengan membungkus aliran koneksi internet perangkat Anda ke dalam "terowongan enkripsi" sebelum melintasi jaringan WiFi publik tersebut, membuat hacker yang menyadap hanya melihat rentetan kode acak yang tidak berarti.</p>
                '
            ],
            [
                'judul' => 'Pengenalan Firewall dan IDS',
                'deskripsi' => 'Cara sistem keamanan jaringan memblokir lalu lintas berbahaya.',
                'level' => 'MEDIUM',
                'kategori' => 'Networking',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Bayangkan jaringan Anda adalah sebuah gedung. Firewall adalah petugas keamanan di gerbang yang secara ketat memeriksa dan menolak paket data mencurigakan berdasarkan aturan IP atau Port (Port Blocking).</p>
                    <p style="margin-bottom:1.5rem;">Sebaliknya, IDS (Intrusion Detection System) bertindak layaknya kamera CCTV di dalam gedung. Ia memonitor perilaku lalulintas data dan segera membunyikan alarm administrator jika terdapat anomali aneh, seperti ribuan permintaan ping yang menandakan serangan *Denial of Service* (DDoS).</p>
                '
            ],
            [
                'judul' => 'Mengamankan Router Rumah',
                'deskripsi' => 'Langkah praktis untuk mencegah hacker masuk ke jaringan WiFi Anda.',
                'level' => 'EASY',
                'kategori' => 'Networking',
                'is_premium' => false,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Router rumah adalah perisai paling luar antara perangkat IoT rumah Anda (Smart TV, kamera) dengan dunia luar. Sayangnya, router ini juga sering jadi titik rentan diretas.</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Ganti kredensial Admin:</strong> Kata sandi default "admin" merupakan target pertama malware. Ubah segera!</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Nonaktifkan WPS:</strong> Fitur PIN WPS terlalu rentan ditembus lewat Brute Force konstan.</span>
                        </li>
                        <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); margin-top: 6px; flex-shrink: 0;"></span>
                            <span><strong>Sembunyikan SSID (opsional):</strong> Meskipun tidak menangkal serangan serius, SSID tersembunyi menghindari atensi peretas kelas amatir.</span>
                        </li>
                    </ul>
                '
            ],
            [
                'judul' => 'Analisis Paket dengan Wireshark',
                'deskripsi' => 'Belajar menangkap dan membaca lalu lintas jaringan (Packet Sniffing).',
                'level' => 'HARD',
                'kategori' => 'Networking',
                'is_premium' => true,
                'konten' => '
                    <p style="margin-bottom:1.5rem;">Wireshark adalah perkakas analisis protokol (Packet Sniffer) standar di industri siber yang dapat membedah isi data dari kartu jaringan (Network Interface Card) pada waktu rill (real time).</p>
                    <p style="margin-bottom:1.5rem;">Ini adalah mata dan telinga dari administrator jaringan. Analis keamanan menggunakannya untuk meneliti kemana sebuah malware berbahaya berkomunikasi (C2 Servers) serta memverifikasi bahwa sambungan SSL di server bekerja dengan baik meredam pesan *plaintext*.</p>
                '
            ]
        ];

        foreach ($materiList as $materi) {
            $materi['slug'] = Str::slug($materi['judul']);
            Materi::create(array_merge($materi, ['status' => 'approved']));
        }
    }
}
