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
            [
                'slug'      => 'dasar-keamanan-digital',
                'judul'     => 'Dasar Keamanan Digital',
                'deskripsi' => 'Pahami prinsip dasar cara kerja internet dan ancaman cyber umum yang perlu kamu waspadai.',
                'level'     => 'EASY',
                'kategori'  => 'Keamanan Digital',
                'is_premium'=> false,
                'konten'    => '
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
                ',
            ],
            [
                'slug'      => 'seni-mengelola-password',
                'judul'     => 'Seni Mengelola Password',
                'deskripsi' => 'Belajar membuat password yang kuat dan menggunakan password manager untuk keamanan maksimal.',
                'level'     => 'MEDIUM',
                'kategori'  => 'Password',
                'is_premium'=> false,
                'konten'    => '
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
                ',
            ],
            [
                'slug'      => 'deteksi-serangan-phishing',
                'judul'     => 'Memahami Serangan Phishing: Bagaimana Cara Menghindarinya?',
                'deskripsi' => 'Belajar mengenali tanda-tanda email dan pesan palsu yang dirancang untuk mencuri data pribadimu.',
                'level'     => 'HARD',
                'kategori'  => 'Phishing',
                'is_premium'=> false,
                'konten'    => '
                    <p style="margin-bottom:1.5rem;">Bayangkan kamu menerima email dari platform media sosial favoritmu, yang mengatakan bahwa akunmu telah dikunci. Mereka memintamu untuk segera "klik di sini" untuk memverifikasi identitasmu. Email tersebut terlihat sangat meyakinkan, lengkap dengan logo dan gaya bahasa yang biasa mereka gunakan. Namun, di balik tampilan profesional itu, ada penjahat siber yang sedang menunggu kamu memasukkan data pribadimu.</p>

                    <p style="margin-bottom:1.5rem;">Serangan ini disebut <strong>Phishing</strong>. Namanya berasal dari kata bahasa Inggris "fishing" (memancing), karena penyerang menyebarkan "umpan" digital dengan harapan ada satu atau dua orang yang "terpancing" dan memberikan informasi sensitif mereka.</p>

                    <div style="border-radius: 1rem; overflow: hidden; margin: 2rem 0; border: 1px solid var(--border);">
                        <img src="/images/cyber_illustration.png" alt="Phishing Illustration" style="width: 100%; height: auto; display: block;">
                        <div style="padding: 0.75rem; font-size: 0.75rem; font-weight: 600; color: #6B7280; text-align: center; background-color: #F8FAFC; border-top: 1px solid var(--border);">Ilustrasi: Bagaimana umpan digital menargetkan perangkat personalmu dalam skema phishing.</div>
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
                ',
            ],
            [
                'slug'      => 'waspada-social-engineering',
                'judul'     => 'Waspada Social Engineering',
                'deskripsi' => 'Bukan hanya kode, manusia adalah titik lemah terbesar dalam keamanan siber.',
                'level'     => 'EASY',
                'kategori'  => 'Keamanan Digital',
                'is_premium'=> false,
                'konten'    => '
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

                    <p style="margin-bottom:1.5rem;">Kunci pertahanan terbaik terhadap social engineering adalah <strong>skeptisisme yang sehat</strong>. Selalu verifikasi identitas pengirim melalui saluran resmi sebelum memberikan informasi apapun.</p>
                ',
            ],
            [
                'slug'      => 'forensik-digital-lanjutan',
                'judul'     => 'Forensik Digital Lanjutan',
                'deskripsi' => 'Pelajari cara melacak jejak digital dan investigasi cyber crime menggunakan toolkit profesional.',
                'level'     => 'HARD',
                'kategori'  => 'Keamanan Digital',
                'is_premium'=> true,
                'konten'    => '<p>Premium content.</p>',
            ]
        ];

        foreach ($materiList as $materi) {
            Materi::create($materi);
        }

        // Generate the remaining items to make exactly 6 per kategori
        Materi::factory()->count(3)->create(['kategori' => 'Keamanan Digital']);
        Materi::factory()->count(5)->create(['kategori' => 'Password']);
        Materi::factory()->count(5)->create(['kategori' => 'Phishing']);
        Materi::factory()->count(6)->create(['kategori' => 'Networking']);
    }
}
