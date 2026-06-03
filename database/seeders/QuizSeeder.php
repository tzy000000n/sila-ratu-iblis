<?php

namespace Database\Seeders;

use App\Models\Materi;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $materis = Materi::all();

        // 120 Unique Questions mapped by Exact Title
        $questionsData = [
            // ================= KEAMANAN DIGITAL =================
            'Dasar Keamanan Digital' => [
                [
                    'q' => "Di bawah ini, pilar manakah dari CIA Triad yang bertugas memastikan bahwa data tidak diubah, dimodifikasi, atau dimanipulasi oleh pihak yang tidak berwenang tanpa izin?",
                    'a' => "Confidentiality (Kerahasiaan)", 'b' => "Integrity (Integritas)", 'c' => "Availability (Ketersediaan)", 'd' => "Authentication (Otentikasi)",
                    'ans' => "B", 'tip' => "Menurut modul, Integrity menjamin data tetap utuh tanpa modifikasi ilegal."
                ],
                [
                    'q' => "Berasal dari kata bahasa Inggris apakah istilah 'Phishing' siber itu, yang mencerminkan cara pelaku menebar umpan digital?",
                    'a' => "Fishing (Memancing)", 'b' => "Pushing (Mendorong)", 'c' => "Phoning (Menelepon)", 'd' => "Finishing (Menyelesaikan)",
                    'ans' => "A", 'tip' => "Nama Phishing berasal dari kata 'fishing' (memancing) karena pelaku menyebar umpan."
                ],
                [
                    'q' => "Manakah pilar CIA Triad yang memastikan bahwa sistem, layanan, dan data selalu dapat diakses oleh pihak yang berwenang kapan saja dibutuhkan?",
                    'a' => "Confidentiality", 'b' => "Integrity", 'c' => "Availability", 'd' => "Accessibility",
                    'ans' => "C", 'tip' => "Availability memastikan sistem online dan dapat diakses saat dibutuhkan."
                ],
                [
                    'q' => "Pernyataan surel 'akun kamu telah dikunci, klik di sini dalam 24 jam untuk verifikasi' adalah salah satu ciri phishing berupa...",
                    'a' => "Kesalahan ejaan yang disengaja", 'b' => "Pemberian rasa urgensi yang berlebihan", 'c' => "Alamat email pengirim yang tepercaya", 'd' => "Sistem enkripsi database lokal",
                    'ans' => "B", 'tip' => "Tekanan urgensi adalah manipulasi agar korban bertindak ceroboh tanpa berpikir."
                ],
                [
                    'q' => "Di bawah ini yang merupakan salah satu dari tiga pilar utama CIA Triad adalah...",
                    'a' => "Confidentiality (Kerahasiaan)", 'b' => "Complexity (Kompleksitas)", 'c' => "Connectivity (Konektivitas)", 'd' => "Centralization (Sentralisasi)",
                    'ans' => "A", 'tip' => "Tiga pilar utama adalah Kerahasiaan (C), Integritas (I), Ketersediaan (A)."
                ]
            ],
            'Waspada Social Engineering' => [
                [
                    'q' => "Dalam konteks keamanan digital, mengapa manusia sering dianggap sebagai titik terlemah?",
                    'a' => "Karena manusia tidak bisa membaca kode biner.", 'b' => "Karena manusia dapat dimanipulasi secara psikologis untuk membocorkan rahasia.", 'c' => "Karena password manusia selalu mudah.", 'd' => "Karena manusia lambat mengetik.",
                    'ans' => "B", 'tip' => "Serangan rekayasa sosial menargetkan psikologi (kepanikan/rasa sungkan) manusia."
                ],
                [
                    'q' => "Jika penyerang menelepon Anda dengan berpura-pura menjadi agen layanan pelanggan bank dan meminta OTP, ini disebut...",
                    'a' => "Smishing", 'b' => "Baiting", 'c' => "Vishing (Voice Phishing)", 'd' => "Pretexting",
                    'ans' => "C", 'tip' => "Vishing (Voice Phishing) menggunakan panggilan telepon suara."
                ],
                [
                    'q' => "Serangan yang memanfaatkan iming-iming menggiurkan (seperti unduhan gratis) untuk memancing korban menginstal malware disebut...",
                    'a' => "Baiting", 'b' => "Tailgating", 'c' => "Quid Pro Quo", 'd' => "Dumpster Diving",
                    'ans' => "A", 'tip' => "Baiting (Mengumpan) memanfaatkan rasa keserakahan manusia."
                ],
                [
                    'q' => "Pesan SMS berbunyi: 'Paket Anda tertahan. Klik link ini untuk membayar pajak Rp5.000'. Ini adalah contoh dari...",
                    'a' => "Vishing", 'b' => "Smishing", 'c' => "Spear Phishing", 'd' => "Whaling",
                    'ans' => "B", 'tip' => "Smishing adalah phishing yang dilakukan melalui platform SMS/Teks."
                ],
                [
                    'q' => "Langkah pertahanan paling krusial terhadap Social Engineering adalah...",
                    'a' => "Membeli antivirus termahal.", 'b' => "Menumbuhkan sikap skeptis dan verifikasi independen.", 'c' => "Tidak mengangkat telepon dari siapapun.", 'd' => "Menyimpan data di kertas saja.",
                    'ans' => "B", 'tip' => "Skeptisisme rasional dan verifikasi langsung ke pihak resmi adalah pertahanan terbaik."
                ]
            ],
            'Forensik Digital Lanjutan' => [
                [
                    'q' => "Mengapa proses kloning disk ('bit-by-bit') dalam investigasi digital harus selalu menggunakan perangkat *write-blocker*?",
                    'a' => "Untuk mempercepat proses transfer data.", 'b' => "Agar penyidik tidak bisa tanpa sengaja mengubah/menulis data di disk asli (menjaga integritas barang bukti).", 'c' => "Agar virus di disk asli otomatis terhapus.", 'd' => "Untuk menekan biaya perangkat keras.",
                    'ans' => "B", 'tip' => "Barang bukti asli tidak boleh berubah sedikitpun; write-blocker mencegahnya."
                ],
                [
                    'q' => "Alat analisis paket *open-source* populer yang sering dipakai analis forensik untuk meneliti lalu lintas jaringan tersangka adalah...",
                    'a' => "Adobe Photoshop", 'b' => "Microsoft Excel", 'c' => "Wireshark", 'd' => "VLC Player",
                    'ans' => "C", 'tip' => "Wireshark adalah perkakas penganalisis paket standar untuk forensik jaringan."
                ],
                [
                    'q' => "Dokumen resmi yang melacak riwayat perpindahan barang bukti digital dari TKP hingga ruang sidang disebut...",
                    'a' => "Chain of Custody", 'b' => "Terms of Service", 'c' => "End User License Agreement", 'd' => "Digital Certificate",
                    'ans' => "A", 'tip' => "Chain of Custody memastikan bukti digital sah dan tidak dimanipulasi orang tak berhak."
                ],
                [
                    'q' => "Menarik kembali *file* yang baru saja dihapus (*deleted*) oleh tersangka dari *Recycle Bin* pada forensik OS Windows merupakan bagian dari tahap...",
                    'a' => "Eksaminasi & Ekstraksi", 'b' => "Pelaporan Kasus", 'c' => "Wawancara Tersangka", 'd' => "Akuisisi Bukti",
                    'ans' => "A", 'tip' => "Tahap ekstraksi melibatkan pencarian data tersembunyi menggunakan software forensik."
                ],
                [
                    'q' => "Salah satu tantangan paling besar (hambatan mutlak) bagi analis forensik saat mencoba mengekstrak data dari laptop tersangka adalah jika...",
                    'a' => "Layar laptopnya retak.", 'b' => "Keyboard laptop kehilangan tombol.", 'c' => "Seluruh *hard-drive* diamankan dengan enkripsi *Full-Disk Encryption* tingkat militer (tanpa kunci).", 'd' => "Kipas laptop berdengung keras.",
                    'ans' => "C", 'tip' => "Tanpa kunci dekripsi, data yang dienkripsi secara aman mustahil dibaca analis forensik."
                ]
            ],
            'Keamanan Perangkat Mobile' => [
                [
                    'q' => "Risiko terbesar dari mengunduh dan memasang aplikasi format *.apk* pihak ketiga dari luar toko resmi (seperti Play Store) adalah...",
                    'a' => "Baterai akan cepat habis karena aplikasi tidak optimal.", 'b' => "Peluang yang sangat besar aplikasi tersebut telah disusupi malware/spyware berbahaya.", 'c' => "Aplikasi akan otomatis terhapus dalam sehari.", 'd' => "Layar ponsel akan berkedip-kedip.",
                    'ans' => "B", 'tip' => "Aplikasi *sideloading* tidak melewati seleksi keamanan toko resmi dan rawan diinjeksi malware."
                ],
                [
                    'q' => "Tindakan apa yang menghilangkan lapisan keamanan bawaan (sandbox) sistem operasi ponsel yang membuatnya sangat rentan diretas?",
                    'a' => "Melakukan Root (Android) atau Jailbreak (iOS)", 'b' => "Menyalakan mode Airplane", 'c' => "Mengecas ponsel hingga 100%", 'd' => "Mengganti *wallpaper* layar utama",
                    'ans' => "A", 'tip' => "Rooting / Jailbreaking menjebol benteng keamanan dasar OS yang disematkan oleh pabrikan."
                ],
                [
                    'q' => "Ketika Anda baru saja menginstal aplikasi ringan 'Kalkulator Biasa' namun aplikasi tersebut meminta izin akses (permissions) ke SMS dan Kontak Anda, apa yang harus Anda lakukan?",
                    'a' => "Memberikan izin tersebut agar aplikasi bisa diakses penuh.", 'b' => "Membagikan aplikasi tersebut ke teman.", 'c' => "Mencurigainya sebagai spyware dan segera memblokir izin serta menghapusnya.", 'd' => "Mereset ponsel ke setelan pabrik seketika.",
                    'ans' => "C", 'tip' => "Izin aplikasi yang tidak wajar dengan fungsi aslinya merupakan bendera merah mutlak."
                ],
                [
                    'q' => "Mengapa memperbarui (Update) Sistem Operasi (OS) smartphone secara berkala sangat krusial?",
                    'a' => "Agar desain antarmuka terlihat lebih kekinian.", 'b' => "Untuk menutup celah *patch* keamanan (*vulnerabilities*) yang baru saja ditemukan.", 'c' => "Untuk menambah penyimpanan memori internal secara ajaib.", 'd' => "Agar kualitas kamera meningkat drastis.",
                    'ans' => "B", 'tip' => "Update OS sebagian besar adalah perbaikan kritis atas lubang keamanan yang baru diketahui."
                ],
                [
                    'q' => "Saat ponsel pintar Anda hilang secara fisik di tempat umum, fitur apa yang dapat menjadi penolong terakhir agar data bank tidak bisa diakses pencuri?",
                    'a' => "Pemutar musik otomatis.", 'b' => "Fitur hapus data jarak jauh (Remote Wipe) dan kunci biometrik / PIN yang kuat.", 'c' => "Lampu senter otomatis menyala.", 'd' => "Casing anti-air.",
                    'ans' => "B", 'tip' => "Remote Wipe / Kunci perangkat menghalangi eksploitasi data fisik."
                ]
            ],
            'Enkripsi Data untuk Pemula' => [
                [
                    'q' => "Proses matematika yang mengubah informasi biasa (Plaintext) menjadi teks rahasia yang tak terbaca (Ciphertext) dikenal dengan istilah...",
                    'a' => "Kompresi File", 'b' => "Enkripsi", 'c' => "Defregmentasi", 'd' => "Pemrograman",
                    'ans' => "B", 'tip' => "Enkripsi mengamankan data dengan mengacaknya secara matematis berdasarkan kunci tertentu."
                ],
                [
                    'q' => "Jenis enkripsi yang menggunakan SATU kunci rahasia yang sama untuk mengunci (enkripsi) dan membuka (dekripsi) data disebut...",
                    'a' => "Asymmetric Encryption", 'b' => "Symmetric Encryption", 'c' => "Quantum Cryptography", 'd' => "Steganography",
                    'ans' => "B", 'tip' => "Kriptografi Simetris (Symmetric) seperti AES menggunakan satu kunci (kunci rahasia bersama)."
                ],
                [
                    'q' => "Mengapa protokol enkripsi asimetris (Public-Key Cryptography) lebih cocok untuk transaksi aman di internet dibanding enkripsi simetris?",
                    'a' => "Karena ia membagikan satu kunci publik yang tidak perlu dirahasiakan, namun pesan hanya bisa dibuka oleh kunci privat sang penerima.", 'b' => "Karena ia memproses data jutaan kali lebih cepat daripada simetris.", 'c' => "Karena ia tidak memerlukan koneksi internet.", 'd' => "Karena ia menghasilkan warna situs yang lebih tajam.",
                    'ans' => "A", 'tip' => "Public/Private key pair memecahkan masalah pertukaran kunci rahasia lintas jaringan terbuka."
                ],
                [
                    'q' => "Ikon 'Gembok' kecil di sebelah kiri URL situs (dan awal protokol bertuliskan HTTPS) menandakan apa?",
                    'a' => "Situs tersebut dibuat oleh pemerintah.", 'b' => "Situs tersebut bebas dari segala jenis virus dan trojan.", 'c' => "Data yang berlalu-lalang antara peramban Anda dan peladen situs tersebut terlindungi dengan enkripsi (TLS/SSL).", 'd' => "Situs tersebut memiliki sistem *paywall* berbayar.",
                    'ans' => "C", 'tip' => "HTTPS (Hypertext Transfer Protocol Secure) memastikan komunikasi terenkripsi di *transport layer*."
                ],
                [
                    'q' => "Apakah efek dari menerapkan fitur Full-Disk Encryption (seperti BitLocker) di laptop Anda?",
                    'a' => "Layar laptop memancarkan sinar lebih sedikit.", 'b' => "Koneksi internet menjadi lebih stabil.", 'c' => "Jika laptop dicuri, pencuri tetap tidak bisa membaca/mengakses isi *hard drive* tanpa PIN dekripsi Anda.", 'd' => "Laptop menjadi tidak bisa dimatikan.",
                    'ans' => "C", 'tip' => "FDE mengunci seluruh isi *drive* secara mandiri, melindunginya dari eksploitasi pencabutan *hard-disk*."
                ]
            ],
            'Mengenal Malware: Virus, Trojan, dan Worm' => [
                [
                    'q' => "Karakteristik utama yang membedakan 'Worm' dari 'Virus' biasa adalah...",
                    'a' => "Worm tidak berbahaya, virus berbahaya.", 'b' => "Worm dapat menggandakan dan menyebarkan dirinya sendiri lewat celah jaringan TANPA butuh interaksi manusia atau file inang.", 'c' => "Worm hanya menyerang komputer Mac.", 'd' => "Virus dapat merusak komponen perangkat keras (processor) secara fisik.",
                    'ans' => "B", 'tip' => "Worm otonom menyebar antar mesin jaringan secara liar tanpa dipicu pengguna."
                ],
                [
                    'q' => "Malware yang menyamar sebagai aplikasi bajakan bermanfaat (seperti *crack software* gratis) untuk mengelabui pengguna agar mengunduhnya disebut...",
                    'a' => "Trojan Horse", 'b' => "Worm", 'c' => "Keylogger", 'd' => "Adware",
                    'ans' => "A", 'tip' => "Sesuai nama mitologi Yunani, Trojan menipu agar masuk secara sukarela lalu membuka pintu peretas."
                ],
                [
                    'q' => "Sebuah *malware* telah menyandera komputer kantor dan mengubah ekstensi seluruh dokumen Excel penting menjadi *.locked*. Layar menampilkan hitungan mundur 24 jam untuk transfer Bitcoin. Ini adalah ciri dari...",
                    'a' => "Spyware", 'b' => "Adware", 'c' => "Ransomware", 'd' => "Logic Bomb",
                    'ans' => "C", 'tip' => "Ransomware mengenkripsi file pengguna secara jahat dan menuntut tebusan uang untuk dekripsinya."
                ],
                [
                    'q' => "Aksi apa yang PALING mungkin menjadi sarana masuknya infeksi Virus klasik?",
                    'a' => "Membaca artikel web biasa tanpa login.", 'b' => "Mengeklik berkas lampiran berformat *.exe* yang tidak dikenal di *email spam*.", 'c' => "Menancapkan stop kontak listrik baru.", 'd' => "Mengetik dengan cepat di Microsoft Word.",
                    'ans' => "B", 'tip' => "Virus membutuhkan 'pemicu' atau interaksi dari korban, seperti menjalankan *executable file* nakal."
                ],
                [
                    'q' => "Pernyataan mana tentang Antivirus (Endpoint Protection) yang paling akurat?",
                    'a' => "Antivirus menjamin Anda 100% aman dari ransomware selamanya.", 'b' => "Mematikan Antivirus Windows Defender saat menginstal 'Game Bajakan' adalah hal wajar dan sangat aman.", 'c' => "Antivirus sangat bergantung pada basis data pembaruan tanda (*signature*) dan deteksi anomali (*heuristics*) harian.", 'd' => "Satu komputer wajib dipasangi tiga antivirus sekaligus agar performanya maksimal.",
                    'ans' => "C", 'tip' => "Deteksi malware butuh pembaruan rill waktu, tak satupun proteksi berani menjamin 100% aman."
                ]
            ],

            // ================== PASSWORD ==================
            'Seni Mengelola Password' => [
                [
                    'q' => "Berdasarkan modul, teknik apakah yang menyarankan untuk menggabungkan kata-kata acak tak saling berhubungan untuk sandi?",
                    'a' => "Teknik Leet Speak", 'b' => "Teknik Biometrik", 'c' => "Teknik Passphrase", 'd' => "Teknik Brute Force",
                    'ans' => "C", 'tip' => "Passphrase menggabungkan kata acak yang kuat (panjang) namun mudah divisualisasikan otak."
                ],
                [
                    'q' => "Berapa panjang minimal karakter pembuatan kata sandi (password) yang disarankan agar tahan serangan peretas modern?",
                    'a' => "Minimal 6 karakter", 'b' => "Minimal 8 karakter", 'c' => "Minimal 12 karakter", 'd' => "Minimal 16 karakter",
                    'ans' => "C", 'tip' => "Panjang di atas 12 karakter membuat waktu pemecahan kombinasi sandi melonjak tajam."
                ],
                [
                    'q' => "Manakah di antara pilihan berikut yang merupakan contoh sandi kategori 'Sangat Kuat'?",
                    'a' => "password123", 'b' => "P@ssw0rd!", 'c' => "Kucing-Biru-2024!", 'd' => "12345678",
                    'ans' => "C", 'tip' => "Kucing-Biru-2024! adalah passphrase yang panjang, memakai strip spasi, simbol dan angka."
                ],
                [
                    'q' => "Informasi personal manakah yang pantang / dilarang keras disertakan dalam password Anda?",
                    'a' => "Simbol matematika aneh", 'b' => "Kombinasi huruf kapital di tengah kata", 'c' => "Nama anak peliharaan dan tahun kelahiran Anda", 'd' => "Kata benda mati dari ruang tamu",
                    'ans' => "C", 'tip' => "Data pribadi mudah ditambang dari jejaring sosial untuk 'Dictionary Attack' sasaran."
                ],
                [
                    'q' => "Apa dampak buruk paling mematikan dari mendaur ulang (menggunakan ulang) satu password yang sama untuk 15 akun web berbeda?",
                    'a' => "Baterai perangkat boros.", 'b' => "Jika salah satu web kecil itu diretas databasenya (bocor), sang hacker otomatis akan berhasil mencoba masuk ke akun bank dan email besar Anda.", 'c' => "Kecepatan *loading* peramban menurun drastis.", 'd' => "Jari tangan menjadi lebih cepat lelah saat mengetik.",
                    'ans' => "B", 'tip' => "Ini adalah taktik populer 'Credential Stuffing' di mana 1 kunci yang bocor membuka seluruh rumah digital Anda."
                ]
            ],
            'Menerapkan Two-Factor Authentication (2FA)' => [
                [
                    'q' => "Apa kelemahan mendasar jika kita hanya mengandalkan kata sandi biasa (1 Lapis) tanpa 2FA?",
                    'a' => "Terlalu susah diketik.", 'b' => "Jika database server website disusupi peretas, password dapat terekspos massal meskipun pengguna sudah menjaganya baik-baik.", 'c' => "Memakan memori RAM terlalu banyak.", 'd' => "Password dapat berkarat jika lama tidak diganti.",
                    'ans' => "B", 'tip' => "Bocornya data pihak ketiga adalah kerentanan utama Single Factor Auth."
                ],
                [
                    'q' => "Dalam konsep 3 jenis faktor autentikasi, 'Sidik Jari' dan 'Pindai Wajah' (FaceID) termasuk dalam kategori apa?",
                    'a' => "Sesuatu yang Anda ketahui (Something you know)", 'b' => "Sesuatu yang Anda miliki (Something you have)", 'c' => "Sesuatu dalam diri Anda / Diri Anda (Something you are)", 'd' => "Sesuatu yang Anda bayangkan",
                    'ans' => "C", 'tip' => "Biometrik adalah ciri khas raga manusia yang mutlak melekat pada diri (Something you are)."
                ],
                [
                    'q' => "Kode PIN kartu ATM Bank termasuk ke dalam kategori lapisan otentikasi apa?",
                    'a' => "Something you know", 'b' => "Something you have", 'c' => "Something you are", 'd' => "Something you do",
                    'ans' => "A", 'tip' => "PIN adalah pengetahuan rahasia di kepala (Something you know)."
                ],
                [
                    'q' => "Mengapa menggunakan Aplikasi Authenticator (Google/Authy) dinilai lebih aman daripada 2FA via SMS OTP?",
                    'a' => "Karena aplikasi authenticator punya warna lebih bagus.", 'b' => "Karena SMS rentan dicegat melalui peretasan SIM-Swap atau kerentanan protokol seluler (SS7).", 'c' => "Karena sinyal SMS terlalu cepat sampainya.", 'd' => "Karena aplikasi menggunakan pulsa.",
                    'ans' => "B", 'tip' => "SIM-Swapping adalah momok mematikan bagi 2FA via SMS."
                ],
                [
                    'q' => "Ketika menyalakan fitur OTP 2FA untuk pertama kalinya, aplikasi biasanya memberikan secarik 'Recovery Codes' (Kode Pemulihan Cadangan). Apa tindakan paling tepat yang harus dilakukan pada kode ini?",
                    'a' => "Abaikan dan hapus segera.", 'b' => "Disimpan dengan aman, diprint atau dicatat di brankas fisik sebagai pintu darurat jika ponsel hilang.", 'c' => "Di-upload dan dipublikasikan di profil Instagram Anda.", 'd' => "Dikirimkan melalui pesan WhatsApp ke teman.",
                    'ans' => "B", 'tip' => "Recovery Codes adalah alat penyelamat pamungkas saat ponsel (Something you have) Anda hilang/rusak."
                ]
            ],
            'Bahaya Password Default' => [
                [
                    'q' => "Apa yang dimaksud dengan password bawaan ('default password')?",
                    'a' => "Kata sandi yang tidak ada harganya.", 'b' => "Kredensial akses awal yang ditetapkan oleh produsen pabrik (contoh: admin/admin) pada setiap unit produk barunya yang dijual.", 'c' => "Sandi rumit yang digenerasi oleh peretas.", 'd' => "Sandi yang terbuat dari sidik jari.",
                    'ans' => "B", 'tip' => "Pabrikan menggunakan sandi default ini (seperti admin, password, root) untuk memudahkan *setup* pembeli awam."
                ],
                [
                    'q' => "Perangkat mana yang secara historis paling sering menjadi sasaran peretasan masif murni akibat penggunaan password default pabrik?",
                    'a' => "Mesin ketik manual.", 'b' => "Ponsel Android mahal.", 'c' => "Router WiFi rumah pintar dan Kamera CCTV IP (Perangkat IoT).", 'd' => "Kalkulator solar digital.",
                    'ans' => "C", 'tip' => "Kamera IP IoT jarang diset ulang sandinya oleh pemilik rumah awam, memicu gelombang serangan peretasan 'botnet'."
                ],
                [
                    'q' => "Bagaimana cara penjahat siber (hacker) dapat menebak sandi CCTV default Anda padahal mereka tidak tahu merk yang Anda pakai?",
                    'a' => "Menelepon petugas PLN untuk menanyakannya.", 'b' => "Menggunakan perangkat lunak pemindai otomatis (*bot*) untuk menembak daftar kamus ratusan password default berbagai merk yang bertebaran di internet publik.", 'c' => "Menyadap suara dari luar rumah Anda.", 'd' => "Mereka menerobos masuk rumah Anda dan melihat kardusnya.",
                    'ans' => "B", 'tip' => "Bots internet tak kenal lelah, mencoba ribuan variasi default pabrikan dari Cisco hingga Xiaomi dalam sekedip mata."
                ],
                [
                    'q' => "Setelah perangkat router atau CCTV Anda diambil alih karena sandi default, biasanya perangkat Anda akan digabungkan ke pasukan 'Zombie Botnet'. Apa tujuan pasukan ini?",
                    'a' => "Untuk membajak televisi nasional.", 'b' => "Untuk mempromosikan barang diskon ke saudara Anda.", 'c' => "Diperintahkan secara serentak membanjiri satu website korban dengan trafik gila-gilaan (DDoS Attack).", 'd' => "Melakukan komputasi video render grafis 3D.",
                    'ans' => "C", 'tip' => "Botnet IoT menyalurkan puluhan juta serangan sampah untuk meruntuhkan infrastruktur web musuh (DDoS)."
                ],
                [
                    'q' => "Tindakan mitigasi utama apa yang PALING PERTAMA kali harus Anda lakukan setelah mencolokkan router cerdas baru di rumah?",
                    'a' => "Segera laporkan IP-nya ke RT setempat.", 'b' => "Segera masuk ke panel kontrol administrator, ubah 'Password Admin Default' dengan sandi yang kuat dan ubah nama profil jika bisa.", 'c' => "Cetak buku manual dan membuangnya.", 'd' => "Menambahkan antena besi raksasa.",
                    'ans' => "B", 'tip' => "Mengganti default credential mencegah 95% eksploitasi serangan pasif (skimming) acak internet."
                ]
            ],
            'Anatomi Serangan Brute Force' => [
                [
                    'q' => "Teknik peretasan dengan cara menebak sandi (trial-and-error) membabi-buta, mencoba segala kemungkinan acak huruf/angka disebut...",
                    'a' => "Brute Force Attack", 'b' => "SQL Injection", 'c' => "Cross Site Scripting", 'd' => "Phishing",
                    'ans' => "A", 'tip' => "Sesuai namanya, serangan ini mengandalkan 'kekuatan brutal' tanpa trik elegan."
                ],
                [
                    'q' => "Metode peretasan sandi di mana komputer menguji satu-per-satu daftar susunan kata bahasa sehari-hari dan nama-nama jalan yang diambil dari kamus disebut...",
                    'a' => "Hybrid Attack", 'b' => "Phishing Attack", 'c' => "Dictionary Attack", 'd' => "Smurf Attack",
                    'ans' => "C", 'tip' => "Kamus serangan ini bisa berisi ribuan entri nama manusia populer untuk mempercepat kerja tebakan mesin."
                ],
                [
                    'q' => "Komponen perangkat keras utama apakah yang secara tradisional disalahgunakan para peretas untuk melakukan komputasi penebakan sandi (Brute Force) dengan kecepatan fantastis?",
                    'a' => "Monitor LCD", 'b' => "Kartu Grafis / GPU (Graphics Processing Unit)", 'c' => "Mouse Optik", 'd' => "Webcam",
                    'ans' => "B", 'tip' => "Inti prosesor jamak pada GPU membuat komputasi paralel hash kriptografi milyaran kali lebih gahar dari CPU."
                ],
                [
                    'q' => "Mekanisme pengamanan sistem paling wajar dan ideal yang wajib diterapkan developer (seperti bank) untuk membunuh serangan Brute Force konstan adalah...",
                    'a' => "Membuat font website menjadi besar.", 'b' => "Menerapkan Account Lockout (Kunci Akun otomatis) atau CAPTCHA setelah 3-5 kali kegagalan berturut-turut.", 'c' => "Menampilkan pesan pop-up meminta hacker pergi.", 'd' => "Mematikan server setiap jam 8 malam.",
                    'ans' => "B", 'tip' => "Kunci akun sementara yang dijeda secara eksponensial mematikan efisiensi waktu penyerang Brute Force."
                ],
                [
                    'q' => "Mengapa memiliki panjang password (12 karakter) sangat dianjurkan untuk menangkis murni Brute Force?",
                    'a' => "Biar terlihat pintar.", 'b' => "Karena semakin bertambah 1 karakter saja (huruf atau simbol), total waktu komputasi yang dibutuhkan mesin penyerang meningkat secara eksponensial tak terhingga.", 'c' => "Agar muat di layar *smartphone* modern.", 'd' => "Membuat server lebih cepat memproses data pengguna.",
                    'ans' => "B", 'tip' => "Menebak 6 karakter butuh sekian detik, tapi 14 karakter acak bisa butuh ribuan tahun pada superkomputer."
                ]
            ],
            'Mengamankan Akun Email Utama' => [
                [
                    'q' => "Mengapa kotak masuk akun email primer Anda (misal: Gmail) dianggap sebagai 'Kunci Utama' dari seluruh kehidupan digital Anda?",
                    'a' => "Karena warnanya lebih mencolok.", 'b' => "Karena fitur 'Forgot Password' di hampir seluruh website (perbankan, sosial media) mengirim tautan pengganti akses langsung ke *inbox* email tersebut.", 'c' => "Karena dari email kita bisa mengirim surat cinta.", 'd' => "Karena tanpa email komputer tidak bisa menyala.",
                    'ans' => "B", 'tip' => "Menguasai Inbox utama berarti menguasai hak reset sandi atas akun sekunder apa pun milik korban."
                ],
                [
                    'q' => "Mengingat kepentingannya yang krusial, perlindungan apa yang ABSOLUT / WAJIB Anda aktifkan pada email utama Anda?",
                    'a' => "Tema gelap (Dark Mode).", 'b' => "Two-Factor Authentication (2FA) dengan aplikasi *authenticator*.", 'c' => "Sistem filter spam otomatis.", 'd' => "Balasan otomatis saat berlibur.",
                    'ans' => "B", 'tip' => "2FA mutlak mencegah eksploitasi jika sewaktu-waktu kunci primer (password surel) Anda berhasil dipanen peretas."
                ],
                [
                    'q' => "Pernyataan yang PALING BERBAHAYA di bawah ini adalah...",
                    'a' => "Mencadangkan file penting di USB flashdisk eksternal.", 'b' => "Menggunakan kata sandi email primer yang persis SAMA persis dengan yang Anda gunakan di forum game abal-abal 10 tahun lalu.", 'c' => "Rajin mengganti *wallpaper* layar.", 'd' => "Tidak membalas email orang tak dikenal.",
                    'ans' => "B", 'tip' => "Daur ulang kata sandi ke dalam pintu gerbang (email primer) adalah bunuh diri keamanan digital murni."
                ],
                [
                    'q' => "Jika penyerang menyadari email perbankan Anda telah dibobolnya, langkah apa yang kemungkinan besar akan dia lakukan pertama kali agar Anda terlambat menyadarinya?",
                    'a' => "Mengirim email pada teman untuk minta uang tebusan.", 'b' => "Membuat filter *inbox rules* secara senyap agar pesan notifikasi SMS-Banking/OTP Bank diteruskan (*forward*) langsung ke laci sampah.", 'c' => "Menambahkan kontak artis pada buku alamat.", 'd' => "Mengubah foto profil Anda menjadi hitam gelap.",
                    'ans' => "B", 'tip' => "Hacker andal bermain tenang; mereka menyembunyikan jejak (rules nakal) selagi mempreteli akun perbankan Anda tanpa bel."
                ],
                [
                    'q' => "Jika Anda kehilangan *smartphone* Anda secara fisik bersamaan dengan aplikasi Google Authenticator yang ada di dalamnya, Anda berisiko terkunci dari surel Anda sendiri (Locked out). Bagaimana cara mencegah kiamat digital ini?",
                    'a' => "Mendatangi kantor pusat Google.", 'b' => "Mencetak / Menyimpan 'Recovery Backup Codes 2FA' awal saat Anda mengatur pengamanannya, simpan baik-baik di brankas non-digital.", 'c' => "Selalu menelpon polisi.", 'd' => "Membeli kacamata hitam antipemantulan.",
                    'ans' => "B", 'tip' => "Kode pemulihan cadangan berfungsi krusial (terdapat 10 kode sakti sekali pakai) di saat perangkat utama tak dapat diakses."
                ]
            ],
            'Mengenal Passwordless Authentication' => [
                [
                    'q' => "Apa yang dijanjikan oleh inisiatif teknologi 'Passwordless' dari aliansi FIDO?",
                    'a' => "Pengguna tidak usah log-in lagi sama sekali seumur hidup.", 'b' => "Transisi autentikasi berbasis kriptografi *Passkeys* yang menggantikan beban memori pikiran teks pengguna sepenuhnya menggunakan perangkat fisik (sidik jari ponsel / token).", 'c' => "Penghapusan nomor KTP untuk identitas login.", 'd' => "Wajib memakai kabel USB.",
                    'ans' => "B", 'tip' => "Visi *Passwordless* merampingkan proteksi mutakhir (bebas tebakan sandi) ke sentuhan halus sidik jari."
                ],
                [
                    'q' => "Mengapa teknologi 'Passkeys' tahan mutlak / imun terhadap teknik 'Phishing' situs palsu?",
                    'a' => "Karena peretas jadi bingung.", 'b' => "Karena peretas tidak memiliki kunci privat fisik di ponsel yang tertanam bersama perangkat (Hardware Enclave), situs penipu tidak mendapat nilai kembalian kriptografis yang cocok.", 'c' => "Karena ada alarm peringatan di email.", 'd' => "Karena situsnya tidak bisa dimuat oleh peramban.",
                    'ans' => "B", 'tip' => "*Passkey* divalidasi terhadap URL asli website; Jika halaman itu palsu, *Passkey* akan langsung mogok kerja."
                ],
                [
                    'q' => "Otentikasi dengan metode 'Magic Link' masuk kategori passwordless karena...",
                    'a' => "Sistem mengirim tautan ajaib klik-sekali ke email pengguna tanpa meminta sandi apa pun.", 'b' => "Dibuat oleh perusahaan pesulap ternama.", 'c' => "Warnanya tidak terlihat mata biasa.", 'd' => "Selalu mengandalkan jaringan koneksi kuantum internet.",
                    'ans' => "A", 'tip' => "Magic Link mendelegasikan verifikasi kepercayaan sesi langsung bertumpu ke keamanan kotak masuk (email primer)."
                ],
                [
                    'q' => "Kriptografi apakah yang melatarbelakangi pengoperasian 'WebAuthn' (Passkeys)?",
                    'a' => "Symmetric Cryptography", 'b' => "Asymmetric Cryptography (Public-Private Key Pair)", 'c' => "Blockchain Ledger", 'd' => "Quantum Cryptography",
                    'ans' => "B", 'tip' => "Hanya perangkat Anda yang menyimpan kunci Privat yang sakral, sementara peladen (*server*) memegang kunci Publik pengecekannya."
                ],
                [
                    'q' => "Apabila peretas sukses membobol *database server* dan mencuri basis data 'Kunci Publik' pengguna Passkeys dari *server* itu, bisakah ia menyamar lalu meretas akun pengguna?",
                    'a' => "Ya, semua akun tamat secara massal.", 'b' => "Tidak, karena 'Kunci Publik' tak berguna tanpa interaksi pasangannya (Kunci Privat Biometrik) yang bersarang eksklusif di dalam *chip* ponsel sang korban.", 'c' => "Tergantung merk HP-nya.", 'd' => "Hanya pada hari minggu sore.",
                    'ans' => "B", 'tip' => "Kunci Publik aman dibagikan luas; takkan bisa difungsikan meniru identitas tanpa konfirmasi Kunci Privat orisinal."
                ]
            ],

            // ================== PHISHING ==================
            'Memahami Serangan Phishing' => [
                [
                    'q' => "Surel yang mengancam akun akan ditutup permanen memicu bendera merah phishing berupa...",
                    'a' => "Kesalahan ejaan", 'b' => "Rasa urgensi berlebihan", 'c' => "Alamat tepercaya", 'd' => "Subdomain resmi",
                    'ans' => "B", 'tip' => "Rasa urgensi memaksa korban segera mengeklik tombol tanpa berpikir rasional."
                ],
                [
                    'q' => "Tindakan apa yang paling tepat untuk memvalidasi tautan sebelum mengekliknya di dalam email mencurigakan?",
                    'a' => "Menutup layar", 'b' => "Mengarahkan kursor (hover) pada tautan untuk meninjau pratinjau URL tujuan", 'c' => "Mem-forward ke grup", 'd' => "Mengeklik double",
                    'ans' => "B", 'tip' => "Fitur hover memperlihatkan tujuan alamat URL aslinya sebelum browser membuka situs tujuannya."
                ],
                [
                    'q' => "Email dari alamat 'support@instagram-security.com' alih-alih '@instagram.com' merupakan ciri...",
                    'a' => "Kecanggihan AI", 'b' => "Domain palsu yang direkayasa", 'c' => "Peringatan sah", 'd' => "Validasi server lokal",
                    'ans' => "B", 'tip' => "Perusahaan resmi tidak menggunakan embel-embel aneh panjang pada akhiran utama domain mereka."
                ],
                [
                    'q' => "Mengapa perusahaan teknologi sangat menyarankan karyawan melaporkan tombol 'Junk/Phishing' daripada sekedar menghapus pesannya?",
                    'a' => "Untuk pamer tangkapan.", 'b' => "Agar mesin AI sistem (*spam filter* perusahaan) belajar memblokir skema serangan serupa di masa depan untuk seluruh kolega.", 'c' => "Agar mendapat bonus gaji bulan itu.", 'd' => "Supaya peretas merasa takut.",
                    'ans' => "B", 'tip' => "Fitur pelaporan berkontribusi pada kecerdasan algoritma deteksi massal mesin penyaring spam."
                ],
                [
                    'q' => "Apa aset utama yang selalu diincar dari manipulasi pengelabuan (*Phishing*) ini?",
                    'a' => "Waktu sisa jam kerja.", 'b' => "Identitas Kredensial (Username, Password, atau Detail Kartu Kredit finansial korban).", 'c' => "Kartu SIM ponsel korban secara fisik.", 'd' => "Foto profil terbaru korban.",
                    'ans' => "B", 'tip' => "Phishing selalu berkaitan dengan menambang harta digital: Data Sensitif."
                ]
            ],
            'Spear Phishing: Serangan Bertarget' => [
                [
                    'q' => "Apa perbedaan paling mendasar antara Phishing massal biasa dengan 'Spear Phishing'?",
                    'a' => "Spear Phishing tidak menggunakan internet.", 'b' => "Spear Phishing sangat tertarget dan dikustomisasi dengan riset profil spesifik satu korban, sedangkan Phishing menebar jaring acak.", 'c' => "Spear Phishing legal menurut hukum pidana.", 'd' => "Spear Phishing selalu menggunakan warna merah menyala.",
                    'ans' => "B", 'tip' => "Spear (Tombak) dianalogikan fokus membidik tepat sasaran individu tertentu, membuahkan keberhasilan super tinggi."
                ],
                [
                    'q' => "Informasi profil sosial yang dapat disalahgunakan pelaku Spear Phishing dari akun LinkedIn korban mencakup...",
                    'a' => "Cuaca di luar rumah.", 'b' => "Jabatan korban di perusahaan saat ini dan rekan kerja sejawatnya.", 'c' => "Struktur bangunan kantornya.", 'd' => "Resep kue tradisional.",
                    'ans' => "B", 'tip' => "Hacker mengambil nama direktur dari LinkedIn untuk dipalsukan menjadi pengirim email mendesak ke Anda."
                ],
                [
                    'q' => "Sebuah surel berbunyi: 'Hai [Nama Anda], lampiran rekap meeting tim [Nama Divisi Anda] hari Jumat, harap diunduh'. Ini merupakan taktik dari...",
                    'a' => "Pretexting", 'b' => "Watering Hole", 'c' => "Spear Phishing", 'd' => "Man in the Middle",
                    'ans' => "C", 'tip' => "Personalisasi data kontekstual yang spesifik dan akurat merupakan tulang punggung tipuan tombak phishing."
                ],
                [
                    'q' => "Apa alasan utama Spear Phishing seringkali mulus menembus penyaring Spam (Spam Filters) standar perusahaan?",
                    'a' => "Karena *hacker* menyuap penyedia internet.", 'b' => "Karena pesannya tidak mengandung ratusan pancingan *spam* masal berulang dan gaya bahasanya terasa sangat organik.", 'c' => "Karena emailnya dibubuhi kata sandi khusus.", 'd' => "Karena server emailnya sering kelelahan siang hari.",
                    'ans' => "B", 'tip' => "Pesan tunggal tanpa templat *mass-mail* sulit dideteksi ciri khas ancaman oleh radar otomatis algoritma."
                ],
                [
                    'q' => "Pertahanan utama melawan Spear Phishing paling mematikan bagi korporat modern adalah...",
                    'a' => "Tidak memasang router jaringan sama sekali.", 'b' => "Memverifikasi kembali setiap permintaan darurat terkait data sensitif melalui *channel* konfirmasi komunikasi berbeda (misal via Panggilan Video/Slack Internal).", 'c' => "Mengganti nama karyawan setiap 3 hari.", 'd' => "Tidak menggunakan email.",
                    'ans' => "B", 'tip' => "Verifikasi di luar pita (*Out-of-Band verification*) selalu menangkal manipulasi komunikasi satu arah."
                ]
            ],
            'Whaling: Menargetkan Eksekutif' => [
                [
                    'q' => "Serangan manipulatif 'Whaling' adalah sebutan spesifik yang diarahkan kepada target golongan...",
                    'a' => "Mahasiswa baru kampus negeri.", 'b' => "Administrator database server lokal.", 'c' => "Pejabat Eksekutif tertinggi korporat (C-Suite) seperti CEO dan CFO.", 'd' => "Pelanggan bank retail harian umum.",
                    'ans' => "C", 'tip' => "Sesuai nama taksonominya, Whaling memburu target bernilai fantastis (*Big Whales*)."
                ],
                [
                    'q' => "Mengapa seorang CEO menjadi target yang sangat menggiurkan untuk serangan Whaling ini?",
                    'a' => "Karena mereka mengetik lebih lambat.", 'b' => "Karena mereka memegang otorisasi absolut atas rekening bank korporat dan rahasia perusahaan terdalam.", 'c' => "Karena mereka selalu lupa password-nya.", 'd' => "Karena mereka selalu merespons semua pesan cepat-cepat.",
                    'ans' => "B", 'tip' => "Otorisasi tinggi (transfer uang skala miliaran) membuat peretasan satu target paus setara meretas 10.000 karyawan biasa."
                ],
                [
                    'q' => "Selain menargetkan penipuan uang kontan transfer (*Wire Fraud*), apa incaran krusial lain dari sindikat serangan *Whaling*?",
                    'a' => "Jadwal cuti satpam gedung kantor.", 'b' => "Mencuri hak cipta intelektual (IP) / rahasia merger korporasi yang belum publik untuk manipulasi nilai pasar saham.", 'c' => "Katalog kantin mingguan.", 'd' => "Data pribadi office boy.",
                    'ans' => "B", 'tip' => "Spionase industri merupakan motivasi finansial tingkat atas sindikat peretas *state-sponsored*."
                ],
                [
                    'q' => "Penyerangan peretasan email eksekutif ini populer disebut dengan terminologi BEC. Apa singkatan dari BEC?",
                    'a' => "Basic Email Configuration", 'b' => "Business Email Compromise", 'c' => "Biometric Encrypted Credential", 'd' => "Business Entertainment Capital",
                    'ans' => "B", 'tip' => "Kompromi Surel Bisnis (BEC) terjadi tatkala peretas membajak *inbox* petinggi demi penipuan keuangan."
                ],
                [
                    'q' => "Sebuah divisi perbendaharaan (Treasury) mendapat *email* mendesak yang seolah sah dari sang CEO untuk menyuntik dana ke vendor di Tiongkok. Apa prosedur terbaik yang seharusnya diterapkan staf itu?",
                    'a' => "Segera transfer demi tidak mengecewakan atasan langsungnya.", 'b' => "Mencetaknya dan melipat menjadi pesawat kertas.", 'c' => "Melakukan 'SOP Verifikasi Berlapis' berupa menelepon suara sang CEO atau bertemu *face-to-face* untuk validasi otentisitas.", 'd' => "Membalas dan meminta diskon vendor.",
                    'ans' => "C", 'tip' => "Dalam keamanan berstandar institusi (Zero Trust), mematuhi kebijakan validasi ganda tidak bisa dikompromi."
                ]
            ],
            'Mendeteksi Domain Palsu (Typosquatting)' => [
                [
                    'q' => "Meniru tampilan grafis *website* otentik persis 100% dan memajangnya di URL jebakan berhuruf meleset sedikit dinamakan serangan...",
                    'a' => "Typosquatting", 'b' => "Baiting", 'c' => "Malvertising", 'd' => "Eavesdropping",
                    'ans' => "A", 'tip' => "Typosquatting duduk (squat) bersarang di ranah URL dengan ejaan salah tik (typo) untuk menjebak korban."
                ],
                [
                    'q' => "Contoh klasik eksploitasi visual homograf dari serangan Typo-squatting di mana mata manusia akan terkecoh secara psikologis adalah merubah URL dari...",
                    'a' => "facebook.com menjadi facemook.com", 'b' => "paypal.com menjadi paypai.com (huruf i dan l kapital di manipulasi)", 'c' => "youtube.com menjadi me-tube.net", 'd' => "google.com menjadi bingham.org",
                    'ans' => "B", 'tip' => "Penggantian huruf I besar dengan l kecil (Homograph) di bilah alamat browser nyaris tak kentara."
                ],
                [
                    'q' => "Cara preventif cerdas yang aman dan efektif agar pengguna awam selalu terhindar dari *Typosquatting* jebakan saat ingin ber-internet banking adalah...",
                    'a' => "Tidak pernah login sama sekali.", 'b' => "Gunakan marka buku (Bookmarks) di *browser* yang sudah disetel ke URL aslinya demi menghindari pengetikan ulang rentan bahaya.", 'c' => "Mengetik perlahan sembari menahan tombol Shift.", 'd' => "Memilih opsi *Remember Password* selalu di komputer warnet.",
                    'ans' => "B", 'tip' => "Marka buku mengeliminasi resiko salah ketik alamat *website*."
                ],
                [
                    'q' => "Sebuah email dikirim dengan URL yang mengandung ekstensi domain level atas yang menyesatkan, misal 'www.bca.co-id.net'. Mengapa ini berbahaya?",
                    'a' => "Itu merupakan subdomain dari jaringan telkom.", 'b' => "Ini adalah domain aslinya yang ditambahkan keamanan lapis tinggi .net di belakangnya.", 'c' => "Peretas memanfaatkan penipuan ekstensi di mana domain utama sebenarnya di belakang adalah '*.net*', bukan 'bca'.", 'd' => "Itu mempercepat kinerja muatan halaman web.",
                    'ans' => "C", 'tip' => "Sistem registrasi TLD (Top Level Domain) bisa membingungkan karena .net merupakan otoritas mutlak URL tersebut, bukan BCA."
                ],
                [
                    'q' => "Mengklik URL palsu (Typosquatting) yang berujung pada laman web dengan embel gembok HTTPS, membuktikan bahwa web tersebut...",
                    'a' => "Benar-benar asli dan sah dari perbankan negara.", 'b' => "Kebal dari virus trojan.", 'c' => "Koneksinya terenkripsi, tetapi ITU TIDAK menjamin bahwa identitas pemilik *website* adalah benar-benar yang asli (Hacker juga mampu membuat HTTPS).", 'd' => "Adalah web terburuk secara performa.",
                    'ans' => "C", 'tip' => "Banyak awam keliru menganggap Gembok Hijau (TLS) sebagai tanda kepastian keaslian situs. Ini hanya jaminan *enkripsi transmisi*, bukan sertifikasi moral admin."
                ]
            ],
            'Phishing di Era AI' => [
                [
                    'q' => "Mengapa peretas kini lebih menggemari platform *Generative Artificial Intelligence* (seperti ChatGPT versi modifikasi) untuk meramu email *phishing* masa depan?",
                    'a' => "Karena mengirim email dari AI lebih hemat kuota listrik.", 'b' => "AI mampu merangkai struktur bahasa yang sangat fasih, persuasif, nihil dari ciri-ciri khas gramatikal janggal yang mudah dicurigai.", 'c' => "Agar AI-nya bisa menggambar kartun lucu di sisipan pesan.", 'd' => "Karena peretas merasa kelelahan mengetik di keyboard manual.",
                    'ans' => "B", 'tip' => "Phishing AI tanpa celah tata bahasa melenyapkan perlindungan deteksi akal sehat konvensional manusia."
                ],
                [
                    'q' => "Eksploitasi di mana teknologi AI dipakai menyulap rekaman suara siber palsu guna menipu kerabat korban via panggilan telpon (Vishing) disebut...",
                    'a' => "Deepfake Audio / Voice Cloning", 'b' => "Cryptojacking", 'c' => "Video Editing Dasar", 'd' => "Photoshop Manipulation",
                    'ans' => "A", 'tip' => "Voice cloning *deepfake* mereplikasi timbre suara seidentik aslinya bermodalkan sampel audio durasi tipis (3 detik)."
                ],
                [
                    'q' => "Apa taktik pertahanan krusial dalam lingkup keluarga inti saat diserang telepon modus darurat (kecelakaan palsu / pinjam dana) dari suara kerabat (Deepfake)?",
                    'a' => "Menuruti permintaan demi empati murni.", 'b' => "Memiliki 'Safe Word' (Kata Kunci Aman Keluarga) yang telah disepakati dari jauh-jauh hari di meja makan untuk memverifikasi siapa yang bicara.", 'c' => "Merebahkan ponsel.", 'd' => "Merekam percakapan dan menjualnya ke stasiun televisi.",
                    'ans' => "B", 'tip' => "Menciptakan *Safe Word* rahasia keluarga mencegah trik skema penculikan virtual AI."
                ],
                [
                    'q' => "Mekanisme *deepfake phishing* (kriminal manipulasi wajah video real-time di Zoom meeting) paling mudah dijebol kedok penipuannya jika kita meminta orang itu untuk...",
                    'a' => "Terdiam saja selama 10 detik tanpa bicara.", 'b' => "Menoleh ke samping kiri kanan wajah dan meletakkan tangan silang melintasi area dagu untuk melihat artefak batas manipulasi model grafis AI-nya.", 'c' => "Tersenyum ramah dan mengedipkan mata.", 'd' => "Mengetik dengan cepat di chat box.",
                    'ans' => "B", 'tip' => "AI saat ini masih lemah merender *occlusion* silang (objek benda fisik yang menutupi wajah model 3D dinamis)."
                ],
                [
                    'q' => "Bahaya laten penggunaan alat LLM (AI) tak terbatas tanpa batasan (*uncensored models*) pada pasar gelap (*dark web*) adalah kemampuannya men-generate massal untuk...",
                    'a' => "Membuat resep dapur rahasia perusahaan.", 'b' => "Merumuskan kode dasar kerangka (*skeleton code*) dari perangkat jahat (malware) varian mutasi unik super cepat.", 'c' => "Memanaskan komponen GPU korban dan meledakkannya.", 'd' => "Mengontrol penuh lampu jalanan kota.",
                    'ans' => "B", 'tip' => "Model AI Dark-Web sangat ditakuti analis karena membantu menelurkan serbuan mutasi virus malware tak terhitung."
                ]
            ],
            'Prosedur Tanggap Darurat Phishing' => [
                [
                    'q' => "Skenario: Anda terlanjur lengah menekan tautan klik email Phishing, layar tiba-tiba diarahkan pada situs aneh asing. Apa yang PALING PERTAMA WAJIB Anda perbuat?",
                    'a' => "Penasaran mencoba mengetik kata sandi sekali saja.", 'b' => "Membiarkannya terbuka di latar belakang (*background*).", 'c' => "Secara instan menutup/mematikan jendela (*tab*) penjelajah (*browser*) itu seketika, TANPA memencet elemen, pop-up, maupun mengisi input formulir secuil apa pun.", 'd' => "Menekan *Refresh / F5* berkali-kali.",
                    'ans' => "C", 'tip' => "Setiap injeksi JavaScript nakal (Drive-by-Download) akan terhenti mutlak jika siklus hidup aplikasi tertutup mendadak."
                ],
                [
                    'q' => "Skenario B: Ternyata dalam keadaan sangat mengantuk, Anda telah MENGISIKAN password media sosial di situs palsu. Hal kritis berikutnya adalah...",
                    'a' => "Menangis menyesali nasib karena uang melayang.", 'b' => "Dengan menggunakan komputer perangkat LAIN, segeralah meluncur ke halaman resmi sosial media asli, dan lakukan pergantian/penggantian ulang *password* baru.", 'c' => "Segera mematikan lampu seluruh ruangan tidur.", 'd' => "Balas memaki-maki melalui alamat surel penipu yang tadi.",
                    'ans' => "B", 'tip' => "Kecepatan bereaksi adalah kunci balapan dengan bot peretas di sisi lainnya; mereset akses via kanal bersih wajib prioritas utama."
                ],
                [
                    'q' => "Selain menahan panik lalu mengganti password penting dari terminal perangkat steril, pastikan juga untuk mengamankan akun tersebut dengan menyalakan...",
                    'a' => "Layanan *Customer Service* prioritas.", 'b' => "Pengaturan Otentikasi Lapis Ganda (*2FA/MFA*) lalu mencabut (*Revoke/Sign out*) izin login yang mencurigakan di setelan Sesi Perangkat Aktif.", 'c' => "Layar Screen-saver berformat ikan akuarium 3 dimensi.", 'd' => "Pergantian profil foto dengan gambar gembok agar *hacker* takut.",
                    'ans' => "B", 'tip' => "Mencabut sesi paksa di dalam pengaturan *account center* akan memutuskan koneksi gelap (cookies) peretas secara rill waktu."
                ],
                [
                    'q' => "Mengapa disarankan Anda mencabut / menonaktifkan sambungan seluler (Wi-Fi/LAN/Data) secara kilat, pasca membuka lampiran file terlampir curiga format makro?",
                    'a' => "Untuk menghukum penyedia kartu internet.", 'b' => "Memutuskan sambungan radio ke *Server Komando & Kendali* (C2) milik kriminal agar mencegahnya merampungkan proses ekstraksi unggahan paksa/pencurian data berkas lokal Anda.", 'c' => "Mendinginkan mesin pemrosesan data (CPU) yang *overheating*.", 'd' => "Membuat laptop menjadi ringan kembali.",
                    'ans' => "B", 'tip' => "Menekan 'Kill-switch' internet secepatnya dapat menggagalkan komunikasi balikan (*callback*) infeksi ransomware/spyware tahap *payload* akhir."
                ],
                [
                    'q' => "Seandainya data perbankan yang terjaring ke dalam formulir Phishing adalah berupa 16-digit nomor lengkap *Credit Card* beserta angka di balik punggung kartunya (CVV), protokol darurat spesifik di ranah finansial adalah...",
                    'a' => "Pergi ke ATM dan mengecek struk sisa saldo harian.", 'b' => "Menelepon jalur Hotline Bank sentral dengan seketika untuk membekukan (Kunci Darurat Blokir Permanen) aktivitas mutasi kartu kredit bermasalah ini.", 'c' => "Menceritakannya di *story* sosial media.", 'd' => "Menutup kartu kredit pakai stiker isolasi tebal hitam.",
                    'ans' => "B", 'tip' => "Informasi pemrosesan traksaksi CC bisa dikuras *hacker* untuk belanja digital di benua lain dalam durasi 5 menit."
                ]
            ],

            // ================== NETWORKING ==================
            'Dasar-dasar Jaringan Komputer' => [
                [
                    'q' => "Alamat IP (IP Address) dalam lanskap komunikasi jaringan logis komputer bertindak laksana fungsinya...",
                    'a' => "Sebagai merk prosesor dari mesin tersebut.", 'b' => "Koordinat titik alamat numerik unik rute persinggahan layaknya alamat kotak pos rumah (Postal Address).", 'c' => "Identitas warna rangka pelindung komputernya.", 'd' => "Kapasitas kelajuan kencangnya perangkat RAM memori.",
                    'ans' => "B", 'tip' => "IP (Internet Protocol) address bertanggung jawab menyajikan lokalisasi titik ujung jaringan."
                ],
                [
                    'q' => "Sementara IP Address dapat diubah secara dinamis dari satu kafe ke kafe lain, alamat identifikasi permanen fisik perangkat yang tercetak (terpatri/dibakar) pada kepingan *Network Interface Card* dari pabrikan adalah...",
                    'a' => "Serial Number Baterai.", 'b' => "MAC Address (Media Access Control).", 'c' => "IPv6 Address Lokal.", 'd' => "Barcode Belakang Layar Monitor.",
                    'ans' => "B", 'tip' => "MAC Address dikodekan oleh pabrik vendor (contoh: Intel/Realtek) untuk eksklusivitas *interface* lapis tautan data fisik."
                ],
                [
                    'q' => "Topologi Jaringan komunikasi privat yang tertutup dan berada pada cakupan satu lokasi lingkup ruang kecil terisolasi (seperti WiFi rumah/kantor cabang terpusat) disebut singkatan...",
                    'a' => "WAN (Wide Area Network)", 'b' => "LAN (Local Area Network)", 'c' => "CAN (Controller Area Network)", 'd' => "PAN (Personal Area Network)",
                    'ans' => "B", 'tip' => "LAN sangat mengedepankan kelajuan komunikasi kabel kecepatan sangat tinggi dalam jangkauan jarak radius fisik rapat pendek."
                ],
                [
                    'q' => "Apa fungsi esensial primer dari peladen (Server) pengonversi Sistem Nama Domain (DNS / Domain Name System) di jagat global internet raya?",
                    'a' => "Memancarkan transmisi gelombang Radio AM.", 'b' => "Menyinkronisasi detak waktu dunia GMT (NTP).", 'c' => "Sebagai buku telepon raksasa yang menerjemahkan bahasa domain manusia (google.com) merujuk kepada deret penomoran mesin IP sesungguhnya (142.250.xx.xx).", 'd' => "Mengelola pengarsipan riwayat pajak pengembang piranti lunak.",
                    'ans' => "C", 'tip' => "Manusia takkan sanggup menghapal jutaan kombinasi susunan deret angka numerik (IP); karenanya DNS memetakan teks yang ramah hapalan otak."
                ],
                [
                    'q' => "Komponen piranti utama manakah yang mendedikasikan kinerjanya semata-mata untuk mengarahkan laju navigasi lalu-lintas antar kumpulan LAN menuju ke sambungan luas jaringan internet raya pelbagai titik?",
                    'a' => "Kartu Suara (Sound Card)", 'b' => "Monitor Sentuh Dinamis", 'c' => "Modem / Router Jaringan", 'd' => "Alat Cetak Dokumen (Printer)",
                    'ans' => "C", 'tip' => "Router mengatur logika perutean laju paket menembus sub-jaringan menuju rute tujuannya di luar (Eksternal Eksekusi)."
                ]
            ],
            'Memahami Protokol TCP/IP' => [
                [
                    'q' => "Pada transmisi model TCP/IP, sepotong bongkahan data jumbo digital (misal file 2 GB) tidak akan dikirim secara gelondongan penuh, melainkan harus dipecah berkeping-keping menjadi format mungil bernamakan...",
                    'a' => "Pixel grafis kotak kecil.", 'b' => "Paket (Network Packets / Datagrams).", 'c' => "Partisi Sistem Disk Volume C.", 'd' => "Sektor Cylinder Head Magnetik.",
                    'ans' => "B", 'tip' => "Protokol transmisi memecah muatan agar kemacetan terdistribusi rasional & bisa dikelola secara paralel gesit."
                ],
                [
                    'q' => "Sifat istimewa keandalan (Reliability) tinggi dari lapisan protokol *Transmission Control Protocol* (TCP) dijamin oleh fitur utamanya yaitu mekanisme...",
                    'a' => "Pengiriman buta secara membabi-buta acak tumpuk.", 'b' => "Adanya konfirmasi pengesahan terima balik (*Acknowledgment/ACK*) tiga tahap (*3-way handshake*) dan garansi re-transmisi atas paket yang bolong (gagal mendarat tujuan).", 'c' => "Pengecatan ulang data warna-warni secara acak simetris.", 'd' => "Fitur penyandian otomatis sandi Vigenere Cipher.",
                    'ans' => "B", 'tip' => "Handshake tiga arah SYN, SYN-ACK, ACK memastikan saluran telah matang tervalidasi siap transfer tanpa *loss* sesedikit pun."
                ],
                [
                    'q' => "Manakala TCP menomorsatukan aspek keandalan mendarat di tujuan, saudara tirinya, *User Datagram Protocol* (UDP) memiliki keistimewaan pada aspek rasio kelajuan tembak (Speed) absolut karena sifatnya yang...",
                    'a' => "Connectionless; ia mengirim membabi buta ke IP sasaran tanpa repot memastikan kepastian paket mendarat mulus (Fire-and-forget).", 'b' => "Hanya boleh dioperasikan pada siang bolong.", 'c' => "Kabel transmisi khusus dibungkus balutan berlapis emas (Gold Plated).", 'd' => "Dikendalikan secara eksklusif oleh pengolahan satelit ruang orbit satelit.",
                    'ans' => "A", 'tip' => "Kecepatan *overhead* dari absennya penantian validasi *handshake* membuat UDP juara mutlak pada transmisi layanan panggilan *Live Video*/*Voice* & Game."
                ],
                [
                    'q' => "Model konseptual teoritis (OSI) pemilahan standardisasi lapis kompartemen transmisi jejaring global ditata menumpuk vertikal menjadi berapa jumlah lapisan (*Layers*) spesifik?",
                    'a' => "7 Lapis", 'b' => "3 Lapis", 'c' => "11 Lapis", 'd' => "5 Lapis",
                    'ans' => "A", 'tip' => "OSI Reference Model terekam abadi memuat 7 lapisan, di mana Lapisan Pertama adalah *Physical* dan Ketujuh puncaknya adalah *Application* (HTTP/SMTP)."
                ],
                [
                    'q' => "Pada lapis Aplikasi manakah (*Application layer*) fungsi komunikasi pertukaran pemuatan elemen data situs *web* aman bersertifikasi HTTPS dikelola secara *default* penomorannya pada lalu lintas soket internet?",
                    'a' => "Port 21 FTP", 'b' => "Port 80 HTTP Klasik", 'c' => "Port 443 HTTPS Terenkripsi", 'd' => "Port 53 DNS",
                    'ans' => "C", 'tip' => "Sebagian besar soket peramban web memancarkan *request* amannya (HTTPS) mutlak diarahkan untuk membidik *Port* 443 TCP pada *server* target tujuan akhir."
                ]
            ],
            'Keamanan Wi-Fi Publik' => [
                [
                    'q' => "Risiko terbesar yang murni selalu menyelimuti jaringan titik sebar *Free Wi-Fi* pelataran bandara/kafe tanpa gembok pelindung kata sandi (SSID Terbuka/Open Network) adalah...",
                    'a' => "Kuotanya selalu cepat terkuras habis tak berbekas dalam hitungan detik di perangkat kita saja.", 'b' => "Kecenderungan perangkat kita terpotong radiasi baterainya.", 'c' => "Transmisi transfer gelombang di udara (paket) dapat ditangkap, dihidu, dibaca (*Eavesdropping/Sniffing*) seluruhnya secara polos telanjang telak oleh pihak usil sekitarnya.", 'd' => "Antena *smartphone* akan memendek seketika.",
                    'ans' => "C", 'tip' => "Sistem radio (Wi-Fi 802.11) menyemburkan pancaran frekuensinya secara sentrifugal omnidireksional untuk diterima penangkap sinyal radius sekitar."
                ],
                [
                    'q' => "Serangan populer berbahaya tingkat tinggi saat mengakses *Free Wi-Fi*, di mana penyerang peretas jahat berdiri diam-diam secara teknis menempatkan perangkat radionya menengahi persis aliran komunikasi pertukaran antara laptop korban dan *Router Internet Kafe*, dinamakan ancaman...",
                    'a' => "Distributed Denial of Service (DDoS)", 'b' => "Man in the Middle (MitM)", 'c' => "Phishing Typo-Squatting", 'd' => "SQL Database Injection",
                    'ans' => "B", 'tip' => "Serangan Si Manusia Penengah (MitM) memperdaya aliran data untuk menipu korban yang mengira ia tersambung langsung dengan *router* bank orisinal."
                ],
                [
                    'q' => "Apa piranti solusi paling cerdas nan ringkas untuk memastikan bahwa biarpun Anda tersambung ke jaringan busuk penuh sadapan di kafe asri, lajur *traffic* seluruh paket Anda terbungkus aman dalam enkripsi berlapis perisai solid?",
                    'a' => "Aplikasi pengelola kalender pengingat (*Calendar app*).", 'b' => "Koneksi terowongan eksklusif Virtual Private Network (VPN).", 'c' => "Kapasitas media simpan Solid State Drive memori jumbo (SSD).", 'd' => "Alat Anti-Gores plastik tebal penangkal retak kaca (*Screen Protector*).",
                    'ans' => "B", 'tip' => "Terowongan VPN menjejalkan proteksi kapsulisasi enkripsi ke lalu-lintas data (Tunneling Encyption Protocol), mustahil terbaca di terminal penyadap pertengahan (Sniffer)."
                ],
                [
                    'q' => "Sebuah *Fake Access Point* (AP Palsu Mengintai) yang didirikan diam-diam oleh peretas dari meja pojok dengan menyiarkan paksa nama SSID identik tiruan (Misal: SSID 'Starbucks_Free_Super') khusus untuk menjerat gawai mangsa awam secara otomatis menyambungkannya, diistilahkan sebagai teknik...",
                    'a' => "Ransomware Encryptor", 'b' => "Evil Twin Attack", 'c' => "Worm Self-Replication", 'd' => "Social Engineering Pretexting",
                    'ans' => "B", 'tip' => "Metode Serangan Si Kembar Jahat (Evil Twin) mengkamuflasekan pemancar radio jahat guna mendominasi koneksi korban melalui kekuatan jangkauan sinyal terkuat dari sisi AP *Hacker*."
                ],
                [
                    'q' => "Mengapa melakukan aktivitas cek saldo Mutasi Rekening Bank (E-Banking) di *hotspot* tempat perbelanjaan publik tanpa terowongan VPN proteksi adalah kesalahan yang sangat dilarang keras, meskipun Anda melihat ada logo hijau HTTPS?",
                    'a' => "Itu dapat mengurangi poin berbelanja harian kartu kredit Anda.", 'b' => "Hacker tetap dapat merekayasa Sertifikat keamanan (SSL Stripping/Spoofing) pada *router* publik modifikasi untuk mengelabui gembok enkripsi dari peramban korban secara parsial/utuh telak.", 'c' => "Karena pihak mall akan menagihkan tagihan internet di pintu kasir kelak keluarnya.", 'd' => "Karena kecepatan aplikasi kasir mall akan menjadi lambat dan mengganggu orang.",
                    'ans' => "B", 'tip' => "SSL Stripping merendahkan secara paksa (Downgrade) protokol negosiasi ke tingkat tak aman HTTP, sehingga celah bocor autentikasi kata sandi terbuka lebar saat Anda menekan tombol *Enter*."
                ]
            ],
            'Pengenalan Firewall dan IDS' => [
                [
                    'q' => "Komponen kritis penjaga benteng perimeter luar keamanan siber yang mengevaluasi, memilah ketat menyortir, lalu memutus/meloloskan masuknya laju aliran bongkahan paket berdasar kepatuhan aturan tabel protokol yang dikonfigurasi teguh (Rule-Sets) administrator dinamakan...",
                    'a' => "Motherboard Bus System", 'b' => "Sistem Tembok Api (Firewall)", 'c' => "Random Access Memory", 'd' => "Virtual Box Emulator",
                    'ans' => "B", 'tip' => "Konsep Firewall membentengi zona rentan (LAN Internal Korporat Intranet) dari belantara liar interkoneksi luas eksternal (Internet Global Luar)."
                ],
                [
                    'q' => "Berbeda dari *Firewall* yang berfungsi selaku perisai tangkis depan, mekanisme perangkat *Intrusion Detection System* (IDS) mengadopsi fungsionalitas murni yang memosisikan peranannya dominan dalam kapabilitas analogi layaknya seonggok...",
                    'a' => "Penyedot debu otomatis pembersihan disk berkas sampah lokal.", 'b' => "Sistem Radar CCTV pendeteksi anomali (alarm peringatan bahaya dini) bilamana terdapat ancaman yang lolos masuk menembus garis keamanan masuk pekarangan *server*.", 'c' => "Senjata meriam pembalik serangan (Offensive Weapon) penghancur pusat markas komando penyerang.", 'd' => "Penyegar sirkulasi temperatur radiator cair pendingin perangkat.",
                    'ans' => "B", 'tip' => "Sistem Deteksi (IDS/Intrusion Detection) bertugas mengamati (Monitoring System) pola *signature* anomali ganas dan memberitahukan administrator dengan notifikasi merah."
                ],
                [
                    'q' => "Sebuah varian sistem modern yang tidak hanya memberikan letupan sirine deteksi dini (alarm bahaya), namun dibekali juga dengan kapabilitas tanggap otonomi (*Autonomous Reaction*) memblokir IP peretas secara sekejap proaktif merespons ancaman tersebut disebut tingkatan...",
                    'a' => "Intrusion Prevention System (IPS)", 'b' => "Content Delivery Network (CDN)", 'c' => "Domain Name Resolution (DNR)", 'd' => "System Recovery Partitioning",
                    'ans' => "A", 'tip' => "Intrusion Prevention System (IPS) satu tingkat lebih mahir secara teknis operasional dibanding mitranya IDS, di mana fungsinya aktif 'mencegah' secara taktis (Block), bukan sekedar pasif mendeteksi (Detect)."
                ],
                [
                    'q' => "Proses mekanisme pada perangkat *Firewall* ketika administrator jaringan mengatur peraturan ketat: 'Tolak mentah (Drop/Deny) segala permintaan paket masuk dari koneksi telnet asing (Port 23 TCP) menuju seluruh IP staf di jaringan perusahaan ini' adalah contoh murni dari skema penerapan fitur kontrol...",
                    'a' => "Load Balancing", 'b' => "Port Filtering / Paket-Filtering (Penyaringan Akses)", 'c' => "Network Address Translation (NAT)", 'd' => "Bandwidth Traffic Shaping",
                    'ans' => "B", 'tip' => "Dasar fondasi mekanisme tembok api (Packet Filtering) menyaring persis berdasarkan parameter spesifik (IP Asal, IP Tujuan, beserta Port Protokol spesifik TCP/UDP nya)."
                ],
                [
                    'q' => "Dalam perbandingan pemantauan pendeteksian jaringan, apa beda fundamental antara metode 'Signature-based' dan 'Anomaly-based' dalam kapabilitas alat sensor mutakhir (IDS)?",
                    'a' => "Metode 'Signature' hanya bisa dipakai oleh admin yang mempunya tanda tangan digital asli. 'Anomaly' untuk karyawan biasa.", 'b' => "Metode 'Signature' bekerja lambat. Metode 'Anomaly' bekerja instan sangat kencang.", 'c' => "Metode 'Signature' mengidentifikasi jejak virus dari pola kodenya yang telah dikenal luas (*database file lama*); sementara metode 'Anomaly' menggunakan algoritma perilaku (*behavioral baseline*) untuk mendeteksi keanehan aktivitas asing mutasi yang belum masuk radar katalog ancaman (Zero-Day Exploits).", 'd' => "Tidak ada bedanya, hanya trik promosi penjualan nama varian produk (*Marketing term*).",
                    'ans' => "C", 'tip' => "Algoritma Sensor Anomali (Heuristic Behavior) jauh lebih mutakhir ketimbang *Signature Base* karena mumpuni mendeteksi ancaman 0-day (Belum ada tambalan perbaikannya dari vendor)."
                ]
            ],
            'Mengamankan Router Rumah' => [
                [
                    'q' => "Mengapa Router ISP rumah (seperti Indihome/Biznet) menjadi palang pintu terdepan yang paling menentukan tingkat kebersihan proteksi pertahanan siber ranah residensial (perangkat ponsel anak dan Smart TV Anda)?",
                    'a' => "Karena router ukurannya fisik berat menopang barang di ruang tamu.", 'b' => "Router mengatur besaran kelistrikan alat rumah (saklar AC).", 'c' => "Karena seluruh sirkulasi lalu lintas data komunikasi internal masuk & keluar (Gateway) perabot IoT terhubung Internet harus secara absolut mutlak divalidasi dan singgah melewati gerbang jembatan *router* itu terlebih dulu.", 'd' => "Karena router mencetak tagihan bulanan.",
                    'ans' => "C", 'tip' => "Router merangkap fungsionalitas layaknya Petugas Bea Cukai Lalu Lintas data tunggal *Gateway* perangkat internal Anda dengan jagat dunia maya di ujung luarnya."
                ],
                [
                    'q' => "Fasilitas fungsi tombol fisik WPS (Wi-Fi Protected Setup) yang mempermudah koneksi mesin *printer* nirkabel ke dalam jaringan rumah tanpa usah mengetikkan kepanjangan kata sandi rentan diserang secara eksploitasi oleh...",
                    'a' => "Radiasi gelombang oven *microwave* dapur.", 'b' => "Pemutar lagu kaset di ruang televisi.", 'c' => "Serangan eksploitasi peretasan *Brute Force PIN WPS* yang sangat primitif sehingga mesin sandi Wi-Fi (WPA-2) terbongkar dengan telanjang bulat dalam kurun waktu kurang dari empat jam peretasan konstan alat (*misal menggunakan program Reaver*).", 'd' => "Sistem pembeku kulkas lemari pendingin (Freezer).",
                    'ans' => "C", 'tip' => "Kerentanan kriptografik algoritma pengecekan di dalam kode implementasi PIN numerik spesifik protokol desain WPS menjadi biang kerok lubang pintu masuk gerbang tanpa sela (Backdoor PIN brute force)."
                ],
                [
                    'q' => "Mematikan (*Disable*) fitur penyebaran nama Wi-Fi otomatis Anda (*SSID Broadcasting*), adalah strategi...",
                    'a' => "Paling absolut kuat di jagat teknologi untuk meredam serangan hacker militer canggih (100% Proteksi Siluman mutlak kebal tak terdeteksi radar).", 'b' => "Strategi dasar penangkalan minimal ('Security by Obscurity') guna memangkas peluang diintai tetangga acak amatiran yang melintas mencari sinyal santai semata.", 'c' => "Akan menambah kecepatan akses unduhan Torrent dua kali kelipatan ganda gigabit.", 'd' => "Menurunkan harga bayar kuota bulanan berlangganan paket.",
                    'ans' => "B", 'tip' => "SSID tersembunyi (*Hidden Wi-Fi*) tidak bisa mengecoh radar peretas handal memakai sniffer aktif (karena pancaran perangkat pengguna ke AP tetap mengudara transparan)."
                ],
                [
                    'q' => "Jika Anda dipaksa harus memberikan akses ke perangkat kerabat/tamu di rumah untuk menyetel tayangan Netflix yang numpang sementara lewat jaringan fasilitas Wi-Fi sentral, protokol kehati-hatian teknis jaringan yang direkomendasikan sistem adalah...",
                    'a' => "Mencabut langsung kabel fiber optik utamanya (Disable total).", 'b' => "Menuliskan sandi panel kendali Administrator Pusat di secarik kertas karton putih dinding.", 'c' => "Membuat zona pemisahan rute VLAN jaringan *Guest Network* (Jaringan Tamu terisolasi) dari jangkauan komunikasi utama akses perangkat PC sensitif privat rumah.", 'd' => "Mewajibkan mereka menekan PIN WPS serentak 10 kali ketukan bersama.",
                    'ans' => "C", 'tip' => "Jaringan Wi-Fi Tamu (Guest Network Isolation Layer) menjamin pengunjung bisa lancar mengakses muatan rute internet luar, tanpa memilik privilege menelusuri penjelajahan sirkulasi dokumen File-Sharing internal milik tuan rumah yang rentan disadap secara *lateral movement*."
                ],
                [
                    'q' => "Bentuk enkripsi keamanan pertahanan konektivitas pancaran frekuensi paling modern, solid, tangguh yang diwajibkan menjadi standar mutlak pada kapabilitas pengaturan sistem ruter Wi-Fi masa kini ialah protokol...",
                    'a' => "WEP (Wired Equivalent Privacy).", 'b' => "Protokol HTTP port 80 Polosan.", 'c' => "WPA3 (Wi-Fi Protected Access Iterasi Generasi ke-3) atau setidak-tidaknya protokol standar lama WPA2.", 'd' => "Enkripsi *Caesar Cipher* murni abjad kuno.",
                    'ans' => "C", 'tip' => "WEP klasik bisa dibobol utuh hanya dalam kisaran di bawah sepuluh menit saja; selalu migrasi paksa jaringan di standar proteksi kokoh WPA2 AES/WPA3 terkini."
                ]
            ],
            'Analisis Paket dengan Wireshark' => [
                [
                    'q' => "Dalam konteks ruang lingkup peretasan jaringan komputer (Network Hacking), alat legendaris bernama 'Wireshark' yang berlambangkan sirip hiu diklasifikasikan secara fungsional ke dalam kategori perangkat perkakas alat utama spesialis dalam hal fungsional...",
                    'a' => "Software pengedit foto resolusi HDR grafis (Image Compositing).", 'b' => "Sistem Penjebolan paksa Sandi Enkripsi Acak Brutal (Password Cracking Terminal Tool).", 'c' => "Alat Penganalisis *Network Protocol Analyzer / Packet Sniffing* lalu lintas paket rute komunikasi secara murni tangkapan langsung intersep waktu-nyata rill (Real-time Wire Tapping Capture).", 'd' => "Simulator penerbangan kendali jet darat komersial.",
                    'ans' => "C", 'tip' => "Penganalisis paket (*Packet Sniffer Tool*) menduplikasi jepretan detail teknikal pertukaran *bits/bytes* di tingkat terbawah antarmuka komunikasi interkoneksi sirkuit tanpa batas privasi."
                ],
                [
                    'q' => "Apa kelemahan yang sangat fundamental bagi pihak analis spesialis jaringan yang mencoba membedah investigasi tumpukan (*stack*) *Network Capture* tangkapan dari aplikasi alat Wireshark jika target sistem komunikasi telah dipersenjatai proteksi enkripsi (HTTPS/SSL)?",
                    'a' => "Layar Wireshark otomatis langsung meledak (Hardware Failure).", 'b' => "Ukuran tulisan (font) huruf dalam aplikasi mendadak buram/rusak piksel kotak.", 'c' => "Analis murni hanya bisa memantau dan mengklasifikasikan arah IP Asal, IP Tujuan, beserta ukuran paket (Metadata saja); namun buta total dari melihat secuil pun konten *Payload/Plaintext/Password* yang sesungguhnya dikomunikasikan di dalam gerbong data gerbong komunikasi gerbong kereta enkripsi rute tersebut.", 'd' => "Data yang tertangkap justru akan diterjemahkan menjadi gambar grafis pelangi secara acak.",
                    'ans' => "C", 'tip' => "Enkripsi modern memastikan *confidentiality* transmisi; Wireshark tangguh tak berkutik jika tidak memegang persediaan salinan *Private Key RSA* target tujuan dekripsi secara konkret."
                ],
                [
                    'q' => "Fungsi operasional kartu antarmuka jaringan (NIC/Network Interface Card) pada *hardware* mesin peretas (*hacker/attacker*) yang sedang mengendus paket di udara (*Wireless Sniffing*) wajib digeser dari setelan bawaan normal *defaultnya*, agar menjadi setelan mode spesifik bernama...",
                    'a' => "Mode Hemat Daya (*Power-Saving Mode*).", 'b' => "Mode Pesawat Terbang Ekstrem (*Airplane Extreme*).", 'c' => "Mode Siluman *Promiscuous Mode* (Atau Mode *Monitor* di kartu antena WiFi spesifik) agar NIC tersebut merangkum dengan membabi buta rakus mencaplok MEREKAM semua *frames* radio paket apa pun di udara yang berseliweran radius jaraknya, kendati alamat tujuan destinasinya sama sekali bukan murni ditujukan spesifik untuk *hardware* milik si *hacker*.", 'd' => "Mode Siaga Malam Redup Kelam.",
                    'ans' => "C", 'tip' => "Kartu jaringan pada setelan biasa hanya memproses sirkulasi data bila dikhususkan rute (addressed) untuk dirinya sendiri; mode Promiscuous melibas segala tangkapan tak bertuan di radar tanpa pandang bulu batas privasinya."
                ],
                [
                    'q' => "Fitur utama yang menjadi primadona kunci bagi analis profesional Wireshark dalam mencari jarum di tumpukan jerami data jutaan transmisi paket (*gigabytes*) adalah pengaplikasian fungsionalitas sintaks (Syntax) bernama...",
                    'a' => "Aplikasi pewarna Filter Tampilan (*Display Filters Expression Box*) yang memangkas seleksi tangkapan menjadi sangat terisolasi berdasarkan kriteria presisi akurat sintaks logika *boolean* (seperti tcp.port == 80 and ip.src == 192.168.1.1).", 'b' => "Penggunaan asisten suara AI hologram yang muncul mendadak dari balik monitor.", 'c' => "Algoritma pewarnaan merah biru hijau gelap semata tanpa makna fungsionalitas logika logaritma.", 'd' => "Tombak *Mouse* pelacakan koordinat GPS berbasis pancaran konstelasi zodiak langit.",
                    'ans' => "A", 'tip' => "Kekuatan mutlak dominasi analitik dari mesin raksasa Wireshark bertumpu pada konstruksi kemampuan baris bahasa perintah isolasi penapis/filter mesin pembedah lalu-lintas lintas tumpukan paket kompartemen giga-skala di dalamnya."
                ],
                [
                    'q' => "Bila mana jejak rekaman (*Capture*) di dalam terminal alat penyadap memvisulisasikan rentetan interaksi paket pengintaian awal bertajuk *SYN*, lalu ditimpali respon *SYN-ACK*, yang kemudian dikukuhkan kembali dengan sambaran pamungkas balasan penegas *ACK* secara runtut rapi teratur antara dua buah peladen beda benua yang mengisyaratkan suatu proses komunikasi formal yang spesifik terstandardisasi, maka urutan pola kejadian sekuensial yang tertangkap layar tersebut secara konseptual teknis dijuluki sebagai ritual...",
                    'a' => "Ping of Death Echo Request DoS", 'b' => "Protokol Penyingkapan Kunci Sertifikat Digital RSA Asimetris Publik Privasi", 'c' => "TCP Three-Way Handshake Connection Establishment", 'd' => "Konstelasi Sinyal Kode Sandi Morse Darurat Kapal",
                    'ans' => "C", 'tip' => "Three-way Handshake adalah ritual jabat tangan pengenalan konvensional mutlak esensial TCP di mula awal mula rute perjalanan agar sambungan kanal jalur pipa komunikasi interkoneksi matang tepercaya terjamin tak patah."
                ]
            ],
        ];

        foreach ($materis as $materi) {
            $title = $materi->judul;
            $questions = $questionsData[$title] ?? $questionsData['Dasar Keamanan Digital'];

            // We iterate exactly 5 questions
            for ($i = 0; $i < 5; $i++) {
                $q = $questions[$i];
                QuizQuestion::create([
                    'materi_id' => $materi->id,
                    'question' => $q['q'],
                    'option_a' => $q['a'],
                    'option_b' => $q['b'],
                    'option_c' => $q['c'],
                    'option_d' => $q['d'],
                    'correct_answer' => $q['ans'],
                    'tip_title' => "Insight Edukatif Nexyra",
                    'tip_desc' => $q['tip']
                ]);
            }
        }
    }
}
