@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background-color:#F9FAFB;">

    {{-- ===================== SIDEBAR ===================== --}}
    <aside style="width:260px; flex-shrink:0; position:fixed; top:0; left:0; height:100vh;
                  background:rgba(255,255,255,0.85); backdrop-filter:blur(12px);
                  border-right:1px solid #E5E7EB; display:flex; flex-direction:column;
                  justify-content:space-between; z-index:30;">

        {{-- Logo --}}
        <div>
            <div style="padding:1.5rem 1.5rem 1rem;">
                <p style="font-size:1.35rem; font-weight:800; color:#7b61ff; line-height:1;">Nexyra Learn</p>
                <p style="font-size:0.65rem; font-weight:700; color:#9CA3AF; letter-spacing:0.1em; margin-top:3px;">CYBERSECURITY LAB</p>
            </div>

            {{-- Nav --}}
            <nav style="padding:0.5rem 0.75rem; display:flex; flex-direction:column; gap:4px;">
                <a href="#beranda" style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                   border-radius:0.75rem; font-size:0.9rem; font-weight:600;
                   background-color:rgba(123,97,255,0.1); color:#7b61ff;">
                    <i data-lucide="home" style="width:18px;height:18px;flex-shrink:0;"></i> Beranda
                </a>
                <a href="#fitur" style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                   border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280;
                   transition:background 0.15s;" onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
                    <i data-lucide="book-open" style="width:18px;height:18px;flex-shrink:0;"></i> Fitur
                </a>
                <a href="#tentang" style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                   border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280;
                   transition:background 0.15s;" onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
                    <i data-lucide="info" style="width:18px;height:18px;flex-shrink:0;"></i> Tentang
                </a>
                <a href="#tip" style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                   border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280;
                   transition:background 0.15s;" onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
                    <i data-lucide="lightbulb" style="width:18px;height:18px;flex-shrink:0;"></i> Cyber Tips
                </a>
            </nav>
        </div>

        {{-- Bottom: Masuk + Daftar --}}
        <div style="padding:1rem 0.75rem; border-top:1px solid #E5E7EB; display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('login') }}"
               style="display:flex; align-items:center; gap:12px; padding:0.65rem 0.85rem;
                      border-radius:0.75rem; font-size:0.9rem; font-weight:500; color:#6B7280;
                      transition:background 0.15s;"
               onmouseover="this.style.background='#F3F4F6'" onmouseout="this.style.background='transparent'">
                <i data-lucide="log-in" style="width:18px;height:18px;flex-shrink:0;"></i> Masuk
            </a>
            <a href="{{ route('register') }}"
               style="display:inline-flex; align-items:center; gap:10px; padding:0.65rem 1.1rem;
                      border-radius:0.75rem; font-size:0.9rem; font-weight:600;
                      background-color:#7b61ff; color:#ffffff; width:fit-content;
                      transition:opacity 0.15s;"
               onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                <i data-lucide="user-plus" style="width:18px;height:18px;flex-shrink:0; color:#fff;"></i>
                Daftar Gratis
            </a>
        </div>
    </aside>

    {{-- ===================== MAIN ===================== --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">

        {{-- Header --}}
        <header style="position:sticky; top:0; z-index:20; background:#fff;
                       border-bottom:1px solid #E5E7EB; padding:1rem 1.75rem;
                       display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:8px; background:#F9FAFB;
                        border:1px solid #E5E7EB; border-radius:0.75rem; padding:0.5rem 0.85rem; width:380px;">
                <i data-lucide="search" style="width:16px;height:16px;color:#9CA3AF;flex-shrink:0;"></i>
                <input type="text" placeholder="Cari materi atau simulasi..."
                       style="border:none; background:transparent; outline:none; width:100%;
                              font-family:inherit; font-size:0.875rem; color:#374151;">
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
                <a href="{{ route('login') }}"
                   style="display:inline-flex; align-items:center; padding:0.55rem 1.25rem;
                          border-radius:0.5rem; font-size:0.875rem; font-weight:600;
                          border:1px solid #E5E7EB; color:#374151; background:#fff;
                          transition:background 0.15s;"
                   onmouseover="this.style.background='#F9FAFB'" onmouseout="this.style.background='#fff'">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   style="display:inline-flex; align-items:center; padding:0.55rem 1.25rem;
                          border-radius:0.5rem; font-size:0.875rem; font-weight:600;
                          background:#7b61ff; color:#fff;
                          box-shadow:0 4px 14px rgba(123,97,255,0.35);
                          transition:opacity 0.15s;"
                   onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                    Daftar Gratis
                </a>
            </div>
        </header>

        {{-- Page Body --}}
        <div style="padding:2rem 2rem 3rem; display:flex; flex-direction:column; gap:2rem;" id="beranda">

            {{-- Hero Banner --}}
            <div style="border-radius:1.25rem; padding:2.5rem 2.5rem;
                        background:linear-gradient(135deg,#7C3AED 0%,#4F46E5 100%);
                        color:#fff; position:relative; overflow:hidden; min-height:200px;">
                <div style="position:absolute;right:-8%;top:-60%;width:55%;height:220%;
                            background:rgba(255,255,255,0.06);transform:rotate(15deg);"></div>
                <div style="position:absolute;right:4%;top:50%;transform:translateY(-50%);opacity:0.12;">
                    <i data-lucide="shield-check" style="width:200px;height:200px;"></i>
                </div>
                <div style="position:relative;z-index:1;max-width:580px;">
                    <div style="display:inline-flex;align-items:center;gap:6px;
                                background:rgba(255,255,255,0.18);border-radius:9999px;
                                padding:0.3rem 0.9rem;font-size:0.7rem;font-weight:700;
                                letter-spacing:0.08em;margin-bottom:1rem;">
                        <i data-lucide="zap" style="width:13px;height:13px;"></i> PLATFORM KEAMANAN SIBER #1
                    </div>
                    <h1 style="font-size:2.4rem;font-weight:800;line-height:1.2;margin-bottom:0.85rem;letter-spacing:-0.02em;">
                        Kuasai Keamanan Siber<br>Bersama Nexyra Learn
                    </h1>
                    <p style="font-size:0.975rem;opacity:0.88;margin-bottom:1.75rem;line-height:1.65;max-width:480px;">
                        Platform interaktif untuk belajar dan simulasi Cybersecurity. Mulai petualanganmu sekarang juga!
                    </p>
                    <div style="display:flex;gap:0.75rem;">
                        <a href="{{ route('register') }}"
                           style="display:inline-flex;align-items:center;gap:8px;
                                  background:#fff;color:#7b61ff;border-radius:9999px;
                                  padding:0.75rem 1.75rem;font-weight:700;font-size:0.9rem;
                                  box-shadow:0 4px 16px rgba(0,0,0,0.18);">
                            Mulai Gratis
                            <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
                        </a>
                        <a href="{{ route('login') }}"
                           style="display:inline-flex;align-items:center;
                                  background:rgba(255,255,255,0.15);color:#fff;border-radius:9999px;
                                  padding:0.75rem 1.75rem;font-weight:600;font-size:0.9rem;
                                  border:1px solid rgba(255,255,255,0.3);">
                            Sudah Punya Akun
                        </a>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;">
                @foreach([['5,000+','PELAJAR AKTIF'],['48','MODUL MATERI'],['500+','SEKOLAH TERDAFTAR'],['98%','TINGKAT KEPUASAN']] as $s)
                <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;
                            padding:1.25rem;text-align:center;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                    <p style="font-size:1.75rem;font-weight:800;color:#7b61ff;">{{ $s[0] }}</p>
                    <p style="font-size:0.65rem;font-weight:700;color:#9CA3AF;letter-spacing:0.08em;margin-top:4px;">{{ $s[1] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Two Column --}}
            <div style="display:flex;gap:1.75rem;align-items:flex-start;" id="fitur">

                {{-- Left --}}
                <div style="flex:1;display:flex;flex-direction:column;gap:1.5rem;">

                    {{-- Section title --}}
                    <div>
                        <h2 style="font-size:1.4rem;font-weight:800;color:#111827;margin-bottom:4px;">Kenapa Nexyra Learn?</h2>
                        <p style="font-size:0.875rem;color:#6B7280;">Semua yang kamu butuhkan untuk menjadi ahli keamanan siber ada di sini.</p>
                    </div>

                    {{-- Feature cards --}}
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;">
                        <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;padding:1.25rem;
                                    display:flex;flex-direction:column;gap:0.6rem;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                            <div style="width:42px;height:42px;border-radius:0.75rem;
                                        background:rgba(123,97,255,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="book-open" style="width:20px;height:20px;color:#7b61ff;"></i>
                            </div>
                            <p style="font-size:0.9rem;font-weight:700;color:#111827;">Materi Terstruktur</p>
                            <p style="font-size:0.78rem;color:#6B7280;line-height:1.6;">Akses 48+ modul keamanan siber dari dasar hingga lanjutan, dirancang oleh para ahli.</p>
                        </div>
                        <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;padding:1.25rem;
                                    display:flex;flex-direction:column;gap:0.6rem;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                            <div style="width:42px;height:42px;border-radius:0.75rem;
                                        background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="play-square" style="width:20px;height:20px;color:#10B981;"></i>
                            </div>
                            <p style="font-size:0.9rem;font-weight:700;color:#111827;">Virtual Lab</p>
                            <p style="font-size:0.78rem;color:#6B7280;line-height:1.6;">Praktek langsung teknik hacking dan defense di lingkungan yang aman dan terisolasi.</p>
                        </div>
                        <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;padding:1.25rem;
                                    display:flex;flex-direction:column;gap:0.6rem;box-shadow:0 2px 12px rgba(0,0,0,0.03);">
                            <div style="width:42px;height:42px;border-radius:0.75rem;
                                        background:rgba(245,158,11,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="award" style="width:20px;height:20px;color:#F59E0B;"></i>
                            </div>
                            <p style="font-size:0.9rem;font-weight:700;color:#111827;">Sertifikasi</p>
                            <p style="font-size:0.78rem;color:#6B7280;line-height:1.6;">Dapatkan sertifikat keahlian setiap kali berhasil menyelesaikan tantangan dan modul.</p>
                        </div>
                    </div>

                    {{-- CTA card --}}
                    <div id="tentang" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);
                                border:1px solid rgba(123,97,255,0.15);border-radius:1rem;
                                padding:1.5rem;display:flex;align-items:center;gap:1.5rem;">
                        <div style="flex:1;">
                            <p style="font-size:1.1rem;font-weight:800;color:#111827;margin-bottom:0.4rem;">Siap Menjadi Ahli Keamanan Siber?</p>
                            <p style="font-size:0.85rem;color:#6B7280;line-height:1.65;margin-bottom:1.1rem;">
                                Bergabung dengan komunitas Nexyra Learn. Ikuti simulasi dunia nyata, kumpulkan poin, dan buktikan kemampuanmu di leaderboard.
                            </p>
                            <div style="display:flex;gap:0.6rem;">
                                <a href="{{ route('register') }}"
                                   style="display:inline-flex;align-items:center;padding:0.6rem 1.25rem;
                                          border-radius:0.5rem;font-size:0.85rem;font-weight:700;
                                          background:#7b61ff;color:#fff;box-shadow:0 4px 14px rgba(123,97,255,0.3);">
                                    Daftar Sekarang
                                </a>
                                <a href="{{ route('login') }}"
                                   style="display:inline-flex;align-items:center;padding:0.6rem 1.25rem;
                                          border-radius:0.5rem;font-size:0.85rem;font-weight:600;
                                          border:1px solid #E5E7EB;background:#fff;color:#374151;">
                                    Masuk
                                </a>
                            </div>
                        </div>
                        <div style="width:90px;height:90px;border-radius:50%;background:rgba(123,97,255,0.12);
                                    display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i data-lucide="shield-check" style="width:46px;height:46px;color:#7b61ff;"></i>
                        </div>
                    </div>

                    {{-- Materi preview --}}
                    <div>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.85rem;">
                            <p style="font-size:1.1rem;font-weight:800;color:#111827;">Materi Unggulan</p>
                            <a href="{{ route('login') }}" style="font-size:0.8rem;font-weight:700;color:#7b61ff;">Lihat Semua →</a>
                        </div>
                        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:0.85rem;">
                            <div style="background:#fff;border:1px solid #E5E7EB;border-radius:0.875rem;
                                        padding:1rem;border-left:3px solid #7b61ff;box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                                <span style="font-size:0.6rem;font-weight:800;padding:0.2rem 0.5rem;border-radius:9999px;
                                             background:#D1FAE5;color:#10B981;letter-spacing:0.05em;">EASY</span>
                                <p style="font-size:0.875rem;font-weight:700;color:#111827;margin:0.5rem 0 0.25rem;">Dasar Keamanan Digital</p>
                                <p style="font-size:0.75rem;color:#6B7280;line-height:1.5;">Pahami prinsip dasar cara kerja internet dan ancaman cyber.</p>
                            </div>
                            <div style="background:#fff;border:1px solid #E5E7EB;border-radius:0.875rem;
                                        padding:1rem;border-left:3px solid #F59E0B;box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                                <span style="font-size:0.6rem;font-weight:800;padding:0.2rem 0.5rem;border-radius:9999px;
                                             background:#FEF3C7;color:#F59E0B;letter-spacing:0.05em;">MEDIUM</span>
                                <p style="font-size:0.875rem;font-weight:700;color:#111827;margin:0.5rem 0 0.25rem;">Seni Mengelola Password</p>
                                <p style="font-size:0.75rem;color:#6B7280;line-height:1.5;">Belajar membuat password kuat dan menggunakan password manager.</p>
                            </div>
                            <div style="background:#fff;border:1px solid #E5E7EB;border-radius:0.875rem;
                                        padding:1rem;border-left:3px solid #EF4444;box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                                <span style="font-size:0.6rem;font-weight:800;padding:0.2rem 0.5rem;border-radius:9999px;
                                             background:#FEE2E2;color:#EF4444;letter-spacing:0.05em;">HARD</span>
                                <p style="font-size:0.875rem;font-weight:700;color:#111827;margin:0.5rem 0 0.25rem;">Deteksi Serangan Phishing</p>
                                <p style="font-size:0.75rem;color:#6B7280;line-height:1.5;">Analisis mendalam tentang cara hacker menggunakan rekayasa sosial.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right --}}
                <div id="tip" style="width:300px;flex-shrink:0;display:flex;flex-direction:column;gap:1.25rem;">

                    {{-- Cyber Tip --}}
                    <div style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);border:1px solid rgba(123,97,255,0.15);
                                border-radius:1rem;padding:1.4rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;right:-12px;bottom:-12px;opacity:0.06;">
                            <i data-lucide="shield-check" style="width:110px;height:110px;"></i>
                        </div>
                        <div style="width:38px;height:38px;border-radius:50%;background:rgba(123,97,255,0.18);
                                    display:flex;align-items:center;justify-content:center;margin-bottom:0.85rem;">
                            <i data-lucide="lightbulb" style="width:18px;height:18px;color:#7b61ff;"></i>
                        </div>
                        <p style="font-size:1rem;font-weight:800;color:#111827;margin-bottom:0.6rem;">Cyber-Tip Hari Ini</p>
                        <p style="font-size:0.82rem;color:#6B7280;font-style:italic;line-height:1.7;margin-bottom:1rem;">
                            "Selalu gunakan Two-Factor Authentication (2FA) pada akun pentingmu. Ini adalah lapisan pertahanan ekstra yang membuat hacker sulit masuk meskipun mereka tahu password-mu."
                        </p>
                        <a href="{{ route('register') }}"
                           style="display:inline-flex;align-items:center;gap:4px;font-size:0.82rem;font-weight:700;color:#7b61ff;">
                            Pelajari Selengkapnya
                            <i data-lucide="chevron-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>

                    {{-- Quick Login --}}
                    <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1rem;
                                padding:1.4rem;box-shadow:0 2px 12px rgba(0,0,0,0.04);">
                        <p style="font-size:0.95rem;font-weight:800;color:#111827;margin-bottom:3px;">Sudah punya akun?</p>
                        <p style="font-size:0.78rem;color:#9CA3AF;margin-bottom:1.1rem;">Masuk dan lanjutkan belajarmu.</p>

                        <form action="{{ url('/login') }}" method="POST" style="display:flex;flex-direction:column;gap:0.65rem;">
                            @csrf
                            <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                        border-radius:0.6rem;padding:0.65rem 0.85rem;">
                                <i data-lucide="mail" style="width:15px;height:15px;color:#9CA3AF;flex-shrink:0;"></i>
                                <input type="text" name="email" placeholder="ID atau Email" required
                                       style="border:none;background:transparent;outline:none;width:100%;
                                              font-family:inherit;font-size:0.85rem;color:#374151;">
                            </div>
                            <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                        border-radius:0.6rem;padding:0.65rem 0.85rem;">
                                <i data-lucide="lock" style="width:15px;height:15px;color:#9CA3AF;flex-shrink:0;"></i>
                                <input type="password" name="password" placeholder="Password" required
                                       style="border:none;background:transparent;outline:none;width:100%;
                                              font-family:inherit;font-size:0.85rem;color:#374151;">
                            </div>
                            @if(session('error'))
                            <p style="font-size:0.75rem;color:#EF4444;">{{ session('error') }}</p>
                            @endif
                            <button type="submit"
                                    style="display:flex;align-items:center;justify-content:center;gap:8px;
                                           width:100%;padding:0.7rem;border-radius:0.6rem;font-size:0.875rem;
                                           font-weight:700;background:#7b61ff;color:#fff;cursor:pointer;
                                           border:none;font-family:inherit;
                                           box-shadow:0 4px 14px rgba(123,97,255,0.3);">
                                Masuk Sekarang
                                <i data-lucide="arrow-right" style="width:15px;height:15px;"></i>
                            </button>
                        </form>

                        <p style="text-align:center;font-size:0.78rem;color:#9CA3AF;margin-top:0.9rem;">
                            Belum punya akun?
                            <a href="{{ route('register') }}" style="color:#7b61ff;font-weight:700;">Daftar gratis</a>
                        </p>
                    </div>

                    {{-- Trusted --}}
                    <div style="background:#F9FAFB;border:1px solid #E5E7EB;border-radius:1rem;
                                padding:1.1rem;text-align:center;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:6px;margin-bottom:4px;">
                            <i data-lucide="check-circle" style="width:15px;height:15px;color:#10B981;"></i>
                            <span style="font-size:0.65rem;font-weight:800;color:#374151;letter-spacing:0.08em;">TRUSTED BY 500+ SCHOOLS</span>
                        </div>
                        <p style="font-size:0.75rem;color:#9CA3AF;">Dipercaya oleh ribuan siswa dan guru di seluruh Indonesia</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <footer style="border-top:1px solid #E5E7EB;padding:1.25rem 2rem;background:#fff;
                       display:flex;justify-content:space-between;align-items:center;">
            <p style="font-size:0.75rem;color:#9CA3AF;">© 2025 Nexyra Learn. All rights reserved.</p>
            <div style="display:flex;gap:1.5rem;">
                <a href="#" style="font-size:0.75rem;color:#9CA3AF;">Kebijakan Privasi</a>
                <a href="#" style="font-size:0.75rem;color:#9CA3AF;">Ketentuan Layanan</a>
                <a href="#" style="font-size:0.75rem;color:#9CA3AF;">Bantuan</a>
            </div>
        </footer>
    </main>
</div>
@endsection
