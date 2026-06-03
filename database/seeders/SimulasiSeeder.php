<?php

namespace Database\Seeders;

use App\Models\Materi;
use App\Models\SimulasiKasus;
use Illuminate\Database\Seeder;

class SimulasiSeeder extends Seeder
{
    public function run(): void
    {
        $materis = Materi::all();

        // Template generator helper based on category
        foreach ($materis as $materi) {
            $cat = $materi->kategori;
            $title = $materi->judul;

            $data = [
                'materi_id' => $materi->id,
                'title' => 'Simulasi: ' . $title,
                'description' => 'Menganalisis serangan siber terkait ' . $title . ' dan menentukan tindakan pencegahan yang tepat.',
            ];

            if ($cat === 'Keamanan Digital') {
                $data['sender_name'] = 'Sistem Keamanan OS';
                $data['sender_address'] = 'Peringatan Pop-up (System Tray)';
                $data['subject'] = 'Ancaman Malware Terdeteksi di Drive C:';
                $data['body'] = '<p>Peringatan Sistem Kritis,</p><p>Antivirus Anda baru saja mendeteksi perilaku aneh pada file <strong>explorer.exe</strong> yang mencoba mengubah registri utama tanpa izin.</p><p>Jika Anda tidak segera melakukan pembersihan, seluruh file dokumen Anda dapat dienkripsi secara permanen.</p>';
                $data['action_text'] = 'Bersihkan Malware Sekarang';
                $data['action_subtext'] = 'Proses memakan waktu 2 menit';
                $data['quote'] = '"Malware dapat bersembunyi dalam aplikasi yang tampak sah sekalipun."';
                $data['signoff'] = '<p>Hormat kami,</p><p style="font-weight:700; color:#111827;">Pusat Perlindungan Endpoint</p>';
                $data['tip'] = 'Peringatan pop-up browser palsu sering meniru antarmuka OS asli untuk memicu kepanikan pengguna.';
                
                $data['options'] = json_encode([
                    ['id' => 1, 'text' => 'Buka Antivirus Resmi dari Start Menu', 'desc' => 'Jangan klik pop-up, cek manual.', 'isCorrect' => true, 'feedback' => 'Tepat! Pop-up di web seringkali adalah Scareware. Selalu jalankan pemindaian dari aplikasi resmi.'],
                    ['id' => 2, 'text' => 'Klik tombol Bersihkan di Pop-up', 'desc' => 'Agar cepat tertangani.', 'isCorrect' => false, 'feedback' => 'Bahaya! Tombol itu justru akan mengunduh malware sesungguhnya ke dalam komputer Anda.'],
                    ['id' => 3, 'text' => 'Cabut kabel listrik komputer', 'desc' => 'Mencegah virus menyebar.', 'isCorrect' => false, 'feedback' => 'Berlebihan dan berisiko merusak hard disk. Cukup tutup peramban dan jalankan Full Scan resmi.']
                ]);
            } elseif ($cat === 'Password') {
                $data['sender_name'] = 'Tim Administrator IT';
                $data['sender_address'] = 'admin-it-desk@company-internal.net';
                $data['subject'] = 'Wajib: Pembaruan Kata Sandi Portal Karyawan';
                $data['body'] = '<p>Halo Karyawan,</p><p>Sesuai dengan kebijakan baru, kami mensyaratkan semua karyawan untuk mengganti sandi portal internal hari ini juga.</p><p>Silakan balas email ini dengan menyertakan kata sandi LAMA Anda dan kata sandi BARU Anda untuk kami proses sinkronisasi database.</p>';
                $data['action_text'] = 'Balas Email Ini';
                $data['action_subtext'] = 'Batas waktu: 17:00 WIB';
                $data['quote'] = '"Keamanan sandi adalah tanggung jawab bersama."';
                $data['signoff'] = '<p>Salam,</p><p style="font-weight:700; color:#111827;">IT Helpdesk Pusat</p>';
                $data['tip'] = 'Tim IT yang sah memiliki akses ke sistem backend dan TIDAK PERNAH meminta kata sandi plaintext Anda via email.';
                
                $data['options'] = json_encode([
                    ['id' => 1, 'text' => 'Laporkan sebagai Phishing Internal', 'desc' => 'Teruskan ke divisi Security.', 'isCorrect' => true, 'feedback' => 'Luar biasa! Tidak ada admin IT asli yang pernah menanyakan kata sandi secara tertulis.'],
                    ['id' => 2, 'text' => 'Balas dengan sandi lama dan baru', 'desc' => 'Mematuhi instruksi IT.', 'isCorrect' => false, 'feedback' => 'Fatal! Ini adalah serangan spear-phishing. Anda baru saja menyerahkan kunci perusahaan.'],
                    ['id' => 3, 'text' => 'Balas dan berikan sandi palsu', 'desc' => 'Mengerjai sang peretas.', 'isCorrect' => false, 'feedback' => 'Tidak disarankan. Membalas email phishing mengonfirmasi bahwa email Anda aktif dan berisiko memancing serangan lanjutan.']
                ]);
            } elseif ($cat === 'Phishing') {
                $data['sender_name'] = 'Bank Nasional Cabang Utama';
                $data['sender_address'] = 'security@bca-id-secure.com';
                $data['subject'] = 'PEMBERITAHUAN: Pemblokiran Rekening Sementara';
                $data['body'] = '<p>Nasabah Yth,</p><p>Kami melihat ada 3 kali percobaan PIN yang gagal di mesin ATM luar negeri pada rekening Anda.</p><p>Untuk melindungi dana Anda, kami telah membekukan rekening Anda sementara waktu. Silakan klik tautan darurat di bawah ini untuk mengonfirmasi data diri (Nomor Kartu dan CVV) guna membuka blokir.</p>';
                $data['action_text'] = 'Buka Blokir Rekening';
                $data['action_subtext'] = 'Tautan Enkripsi 256-bit';
                $data['quote'] = '"Jangan pernah membagikan PIN Anda kepada siapa pun."';
                $data['signoff'] = '<p>Hormat kami,</p><p style="font-weight:700; color:#111827;">Layanan Pelanggan Perbankan</p>';
                $data['tip'] = 'Domain @bca-id-secure.com adalah contoh typosquatting palsu. Domain perbankan asli tidak menggunakan tanda hubung panjang yang aneh.';
                
                $data['options'] = json_encode([
                    ['id' => 1, 'text' => 'Abaikan dan hubungi Call Center Asli', 'desc' => 'Mengecek kebenaran lewat jalur aman.', 'isCorrect' => true, 'feedback' => 'Tepat sekali. Kepanikan adalah senjata utama phisher. Konfirmasi hanya via Call Center di belakang kartu ATM Anda.'],
                    ['id' => 2, 'text' => 'Klik tautan untuk berjaga-jaga', 'desc' => 'Mengisi data agar tidak diblokir sungguhan.', 'isCorrect' => false, 'feedback' => 'Sangat Berbahaya! Situs tujuan adalah web tiruan yang didesain untuk merekam data kartu kredit Anda (Skimming online).'],
                    ['id' => 3, 'text' => 'Teruskan email ini ke keluarga', 'desc' => 'Agar mereka ikut berhati-hati.', 'isCorrect' => false, 'feedback' => 'Meneruskan tautan phishing justru berisiko membuat anggota keluarga Anda tidak sengaja mengekliknya.']
                ]);
            } else { // Networking
                $data['sender_name'] = 'Notifikasi Router Cerdas';
                $data['sender_address'] = '192.168.1.1 (Gateway)';
                $data['subject'] = 'Peringatan: Perangkat Baru Terhubung (MAC Unknown)';
                $data['body'] = '<p>Admin Jaringan,</p><p>Router WiFi mendeteksi perangkat baru dengan MAC Address asing (0A:1B:3C:4D:5E) terhubung ke jaringan internal Anda pada pukul 02:15 AM.</p><p>Perangkat ini melakukan pemindaian massal ke seluruh port IP kamera CCTV rumah Anda secara terus-menerus.</p>';
                $data['action_text'] = 'Blokir Alamat MAC Ini';
                $data['action_subtext'] = 'Terapkan via Firewall Router';
                $data['quote'] = '"Eksploitasi CCTV rumah seringkali berawal dari password Wi-Fi yang lemah."';
                $data['signoff'] = '<p>Status Sistem,</p><p style="font-weight:700; color:#111827;">Log Keamanan Otomatis</p>';
                $data['tip'] = 'Penyusup yang masuk ke jaringan lokal (LAN) dapat melakukan lateral movement untuk meretas perangkat IoT yang rentan.';
                
                $data['options'] = json_encode([
                    ['id' => 1, 'text' => 'Ganti Sandi WPA2 Wi-Fi & Blokir MAC', 'desc' => 'Tindakan mitigasi paling kuat.', 'isCorrect' => true, 'feedback' => 'Sempurna. Jika ada penyusup asing di jaringan tertutup Anda, berarti sandi Wi-Fi Anda telah jebol atau bocor.'],
                    ['id' => 2, 'text' => 'Biarkan saja, mungkin tetangga numpang', 'desc' => 'Berprasangka baik.', 'isCorrect' => false, 'feedback' => 'Fatal. Pemindaian port (Port Scanning) ke CCTV mengindikasikan upaya peretasan aktif, bukan sekadar numpang internet.'],
                    ['id' => 3, 'text' => 'Matikan CCTV dari saklar listrik', 'desc' => 'Agar tidak bisa diretas.', 'isCorrect' => false, 'feedback' => 'Ini mematikan fungsi keamanan rumah Anda. Solusi yang benar adalah memutus akses peretas di tingkat Router, bukan mematikan aset Anda.']
                ]);
            }

            SimulasiKasus::create($data);
        }
    }
}
