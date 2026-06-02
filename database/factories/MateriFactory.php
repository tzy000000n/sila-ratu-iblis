<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MateriFactory extends Factory
{
    private $titles = [
        'Mengenal Serangan Cyber', 'Panduan Keamanan Data Pribadi', 'Cara Menghindari Penipuan Online',
        'Dasar-dasar Kriptografi', 'Melindungi Jaringan WiFi Rumah', 'Keamanan Transaksi E-Commerce',
        'Mendeteksi Malware dan Virus', 'Pentingnya Backup Data Berkala', 'Konsep Firewall dalam Jaringan',
        'Manajemen Akses Pengguna', 'Mencegah Serangan Ransomware', 'Keamanan Perangkat Mobile',
        'Analisis Risiko Keamanan Siber', 'Edukasi Kesadaran Keamanan', 'Identifikasi Celah Keamanan Aplikasi',
        'Sistem Deteksi Intrusi (IDS)', 'Mengamankan Server Web', 'Penerapan VPN untuk Privasi',
        'Keamanan Komputasi Awan', 'Mencegah Kebocoran Data (DLP)', 'Anatomi Serangan DDoS',
        'Cara Kerja Enkripsi End-to-End', 'Keamanan Internet of Things (IoT)', 'Memahami Zero Trust Architecture',
        'Strategi Disaster Recovery', 'Bahaya Social Engineering Lanjutan', 'Audit Keamanan Sistem',
        'Praktik Secure Coding', 'Manajemen Kata Sandi Enterprise', 'Keamanan Email dan Anti-Spam',
        'Melindungi Data Rekam Medis', 'Kebijakan Bring Your Own Device', 'Keamanan Jaringan 5G',
        'Ancaman Deepfake dan Manipulasi', 'Mengenal Endpoint Security', 'Pentingnya Multi-Factor Authentication',
        'Strategi Pertahanan Siber Nasional', 'Keamanan Pembayaran Digital', 'Mencegah Serangan Man-in-the-Middle',
        'Prinsip Least Privilege', 'Mendeteksi Aktivitas Mencurigakan', 'Respon Insiden Keamanan Cepat',
        'Forensik Jaringan Komputer', 'Keamanan Sistem Kontrol Industri', 'Perlindungan Hak Kekayaan Intelektual',
        'Ancaman Insider Threat', 'Mengatasi Kerentanan Zero-Day', 'Evolusi Malware Modern',
        'Kepatuhan Standar ISO 27001', 'Keamanan API dan Integrasi'
    ];

    private $paragraphs = [
        'Dalam era digital saat ini, keamanan informasi menjadi salah satu aspek paling krusial yang harus diperhatikan oleh setiap individu dan organisasi. Semakin banyak data yang disimpan secara online, semakin tinggi pula risiko terjadinya kebocoran atau penyalahgunaan data tersebut oleh pihak yang tidak bertanggung jawab.',
        'Serangan siber tidak hanya menargetkan perusahaan besar, tetapi juga pengguna internet biasa. Mulai dari pencurian identitas, penipuan finansial, hingga penyebaran perangkat lunak berbahaya, semuanya dapat berdampak merugikan jika kita tidak membekali diri dengan pengetahuan yang cukup.',
        'Langkah pertama dalam melindungi diri adalah menyadari berbagai jenis ancaman yang ada. Pemahaman tentang bagaimana peretas mencoba mengeksploitasi celah keamanan dapat membantu kita menerapkan langkah-langkah pencegahan yang tepat dan efektif dalam rutinitas digital sehari-hari.',
        'Penting untuk selalu memperbarui perangkat lunak dan sistem operasi secara rutin. Pembaruan ini sering kali berisi tambalan keamanan (security patch) yang dirancang untuk menutup kerentanan yang baru saja ditemukan oleh para peneliti keamanan.',
        'Selain mengandalkan teknologi, faktor manusia juga memegang peranan penting. Kebiasaan buruk seperti menggunakan kata sandi yang sama untuk berbagai akun atau mengklik tautan yang mencurigakan dapat menjadi celah masuk yang sangat mudah dimanfaatkan oleh penyerang.',
        'Penerapan autentikasi dua faktor (2FA) adalah salah satu metode yang sangat disarankan. Dengan menambahkan lapisan keamanan ekstra ini, penyerang yang berhasil mendapatkan kata sandi Anda tetap tidak akan bisa mengakses akun tanpa verifikasi sekunder.',
        'Untuk organisasi, investasi dalam infrastruktur keamanan yang solid dan program pelatihan kesadaran keamanan bagi karyawan adalah kunci untuk meminimalkan risiko. Kebijakan keamanan yang jelas dan prosedur respons insiden yang terdefinisi dengan baik sangat diperlukan.',
        'Secara proaktif, melakukan audit keamanan dan pengujian penetrasi (penetration testing) dapat membantu mengidentifikasi kelemahan sistem sebelum dimanfaatkan oleh peretas. Ini adalah langkah antisipasi yang sangat berharga untuk menjaga integritas dan ketersediaan layanan.',
        'Di masa depan, ancaman siber diperkirakan akan semakin canggih seiring dengan perkembangan teknologi seperti kecerdasan buatan (AI) dan Internet of Things (IoT). Oleh karena itu, kita harus terus belajar dan beradaptasi dengan lanskap keamanan yang terus berubah.',
        'Pada akhirnya, keamanan siber adalah tanggung jawab bersama. Dengan berbagi informasi tentang ancaman terbaru dan praktik terbaik, kita dapat membangun ekosistem digital yang lebih aman dan tangguh bagi semua orang.'
    ];

    private $headings = [
        'Pentingnya Kesadaran Keamanan',
        'Langkah-langkah Pencegahan',
        'Mengidentifikasi Ancaman Sejak Dini',
        'Praktik Terbaik dalam Keamanan Siber',
        'Masa Depan Keamanan Informasi',
        'Studi Kasus Insiden Keamanan',
        'Teknologi Pelindung Utama',
        'Kebijakan dan Kepatuhan Keamanan'
    ];

    public function definition(): array
    {
        // Use unique() to avoid duplicate titles and slug collisions
        $judul = $this->faker->unique()->randomElement($this->titles);
        
        $kategori = $this->faker->randomElement(['Keamanan Digital', 'Password', 'Phishing', 'Networking']);
        $level = $this->faker->randomElement(['EASY', 'MEDIUM', 'HARD']);
        
        // Generate paragraphs
        shuffle($this->paragraphs);
        $p1 = $this->paragraphs[0];
        $p2 = $this->paragraphs[1];
        $p3 = $this->paragraphs[2];
        $p4 = $this->paragraphs[3];
        $p5 = $this->paragraphs[4];

        // Generate headings
        shuffle($this->headings);
        $h1 = $this->headings[0];

        $konten = '<p style="margin-bottom:1.5rem;">' . $p1 . '</p>';
        $konten .= '<p style="margin-bottom:1.5rem;">' . $p2 . '</p>';
        $konten .= '<p style="margin-bottom:1.5rem;">' . $p3 . '</p>';
        $konten .= '<h2 style="font-size: 1.35rem; font-weight: 800; margin: 2rem 0 1rem; color: #111;">' . $h1 . '</h2>';
        $konten .= '<p style="margin-bottom:1.5rem;">' . $p4 . '</p>';
        $konten .= '<p style="margin-bottom:1.5rem;">' . $p5 . '</p>';

        return [
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'deskripsi' => Str::limit($p1, 120),
            'level' => $level,
            'kategori' => $kategori,
            'konten' => $konten,
            'is_premium' => $this->faker->boolean(20), // 20% chance of being premium
        ];
    }
}
