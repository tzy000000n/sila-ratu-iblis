@extends('layouts.app')

@section('content')
<style>
/* CSS Reset and Font Smooth */
body {
    background-color: #F9FAFB;
    color: #111827;
}

/* Base custom styles for responsiveness */
.checker-container {
    display: flex;
    min-height: 100vh;
    background: #F9FAFB;
}

.checker-grid {
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 1.75rem;
    align-items: flex-start;
}

/* Sidebar Responsive Overlay */
@media (max-width: 1024px) {
    .checker-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    aside.sidebar-nav {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        position: fixed !important;
        z-index: 40 !important;
    }
    aside.sidebar-nav.show {
        transform: translateX(0);
    }
    main.main-content {
        margin-left: 0 !important;
    }
    #mobile-drawer-toggle {
        display: inline-block !important;
    }
}

/* Card Styling */
.card-primary {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 1.5rem;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

/* Dynamic Requirement Items */
.req-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.25rem;
    border-radius: 1rem;
    transition: all 0.25s ease;
}

.req-item.unmet {
    background: #FFFFFF;
    border: 1.5px dashed #E5E7EB;
    color: #6B7280;
}

.req-item.met {
    background: #F5F3FF;
    border: 1.5px solid rgba(123, 97, 255, 0.15);
    color: #111827;
}

.req-item.failed {
    background: #FEF2F2;
    border: 1.5px solid rgba(239, 68, 68, 0.15);
    color: #111827;
}

/* Progress bar segments */
.progress-container {
    display: flex;
    gap: 6px;
    height: 8px;
    width: 100%;
    margin-top: 0.5rem;
}

.progress-segment {
    flex: 1;
    height: 100%;
    border-radius: 999px;
    background-color: #E5E7EB;
    transition: background-color 0.3s ease;
}

/* Tooltip and notification styling */
.custom-toast {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: #111827;
    color: #FFFFFF;
    padding: 0.85rem 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    z-index: 50;
    opacity: 0;
    visibility: hidden;
    transform: translateY(1.5rem);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease, visibility 0.3s ease;
    font-weight: 600;
    font-size: 0.9rem;
}

.custom-toast.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.custom-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(17, 24, 39, 0.4);
    backdrop-filter: blur(4px);
    z-index: 100;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}

.custom-modal {
    background: #FFFFFF;
    border-radius: 1.5rem;
    max-width: 480px;
    width: 100%;
    padding: 2.25rem;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 1.25rem;
    transform: scale(0.9);
    transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.custom-modal-backdrop.show {
    display: flex;
}

.custom-modal-backdrop.show .custom-modal {
    transform: scale(1);
}

.smart-habit-card {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 1.25rem;
    padding: 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.smart-habit-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.04);
}
</style>

<div class="checker-container">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar-nav" style="width:260px; flex-shrink:0; position:fixed; top:0; left:0; height:100vh;
                  background:rgba(255,255,255,0.92); backdrop-filter:blur(12px);
                  border-right:1px solid #E5E7EB; display:flex; flex-direction:column;
                  justify-content:space-between; z-index:30; overflow-y:auto;">
        @include('partials.sidebar', ['active' => 'password-checker'])
    </aside>

    {{-- ===== MAIN ===== --}}
    <main class="main-content" style="flex:1; margin-left:260px; display:flex; flex-direction:column; min-width: 0;">

        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari lab, materi, atau tools...'])

        {{-- Content Wrapper --}}
        <div style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2.5rem; max-width: 1200px; width: 100%; margin: 0 auto;">

            {{-- Title Section --}}
            <div style="text-align: center; display: flex; flex-direction: column; gap: 0.5rem;">
                <h1 style="font-size: 2.5rem; font-weight: 800; color: #111827; letter-spacing: -0.03em; margin: 0;">Uji Ketahanan Sandi Anda</h1>
                <p style="font-size: 1rem; color: #6B7280; max-width: 640px; margin: 0 auto; line-height: 1.6;">
                    Yakin sandi Anda tidak bisa ditembus? Mari kita analisis. Kami akan memeriksa pola, kompleksitas, dan trik umum peretas untuk memastikan kehidupan digital Anda tetap privat.
                </p>
            </div>

            {{-- Main Two-Column Layout --}}
            <div class="checker-grid">

                {{-- Left Column (Analyzer Panel & Tips) --}}
                <div style="display: flex; flex-direction: column; gap: 1.75rem;">

                    {{-- Main Analyzer Card --}}
                    <div class="card-primary">
                        <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                            <span style="font-size: 0.7rem; font-weight: 800; color: #7B61FF; letter-spacing: 0.08em; text-transform: uppercase;">
                                Analisis Sandi
                            </span>
                        </div>

                        {{-- Input Field Container --}}
                        <div style="position: relative; width: 100%;">
                            <input type="text" id="password-input" value="K33pltS4f3!" placeholder="Ketik password di sini..."
                                   style="width: 100%; font-size: 1.75rem; font-weight: 700; color: #111827; background: #F5F3FF;
                                          border: 1px solid rgba(123, 97, 255, 0.1); border-radius: 1rem; padding: 1.5rem 4rem 1.5rem 2rem;
                                          outline: none; letter-spacing: 0.03em; box-shadow: inset 0 2px 4px rgba(123, 97, 255, 0.02);
                                          font-family: monospace;">
                            <button id="toggle-visibility" type="button" style="position: absolute; right: 1.5rem; top: 50%; transform: translateY(-50%);
                                                   color: #9CA3AF; background: none; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;
                                                   padding: 0.5rem; border-radius: 0.5rem; transition: color 0.2s;"
                                    onmouseover="this.style.color='#7B61FF'" onmouseout="this.style.color='#9CA3AF'">
                                <i id="eye-icon" data-lucide="eye" style="width: 22px; height: 22px;"></i>
                            </button>
                        </div>

                        {{-- Strength & Score Bar --}}
                        <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-top: 0.25rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 0.95rem; font-weight: 700; color: #374151;">
                                    Kekuatan: <span id="strength-label" style="color: #7B61FF; font-weight: 800;">Kuat</span>
                                </span>
                                <span id="score-badge" style="font-size: 0.75rem; font-weight: 800; background: rgba(123, 97, 255, 0.15);
                                             color: #7B61FF; padding: 0.25rem 0.75rem; border-radius: 9999px;">
                                    85/100
                                </span>
                            </div>

                            {{-- Segmented Progress Bar --}}
                            <div class="progress-container">
                                <div class="progress-segment" id="seg-1"></div>
                                <div class="progress-segment" id="seg-2"></div>
                                <div class="progress-segment" id="seg-3"></div>
                                <div class="progress-segment" id="seg-4"></div>
                            </div>
                        </div>

                        {{-- Crack Time Info --}}
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #4B5563; font-weight: 600; margin-top: 0.25rem;">
                            <i data-lucide="clock" style="width: 16px; height: 16px; color: #7B61FF;"></i>
                            <span>Estimasi waktu peretasan: <span id="crack-time" style="font-weight: 800; color: #111827;">400 tahun</span> <span style="font-weight: 500; color: #6B7280;">(Brute force)</span></span>
                        </div>

                        {{-- Action Button --}}
                        <button id="secure-btn" type="button" class="btn" style="background: #7B61FF; color: #FFFFFF; width: 100%; padding: 1.15rem;
                                               border-radius: 1rem; font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; justify-content: center;
                                               gap: 10px; box-shadow: 0 4px 18px rgba(123, 97, 255, 0.35); transition: background-color 0.2s, transform 0.2s; margin-top: 0.5rem;"
                                onmouseover="this.style.backgroundColor='#6366F1'; this.style.transform='translateY(-1px)';"
                                onmouseout="this.style.backgroundColor='#7B61FF'; this.style.transform='none';">
                            <i data-lucide="shield-check" style="width: 20px; height: 20px;"></i>
                            AMANKAN SANDI INI
                        </button>
                    </div>

                    {{-- Pro Cyber-Tip Card --}}
                    <div style="background: linear-gradient(135deg, #F5F3FF 0%, #F0FDFA 100%); border: 1px solid rgba(123, 97, 255, 0.12);
                                border-radius: 1.5rem; padding: 2rem; display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="width: 44px; height: 44px; border-radius: 0.85rem; background: #7B61FF; display: flex;
                                    align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 10px rgba(123, 97, 255, 0.2);">
                            <i data-lucide="lightbulb" style="width: 22px; height: 22px; color: #FFFFFF; fill: rgba(255, 255, 255, 0.15)"></i>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <h3 style="font-size: 1.1rem; font-weight: 800; color: #7B61FF; margin: 0;">Pro Cyber-Tip</h3>
                            <p style="font-size: 0.875rem; color: #4B5563; line-height: 1.6; margin: 0;">
                                Daripada sandi kompleks seperti <strong style="color: #111827; font-family: monospace; font-size: 0.95rem;">"P@ssw0rd123"</strong>, cobalah menggunakan <strong>Passphrase</strong>. Empat kata acak seperti <strong style="color: #7B61FF; font-family: monospace; font-size: 0.95rem;">"GitarBiruKopiGunung"</strong> jauh lebih sulit untuk diretas oleh komputer namun lebih mudah untuk Anda ingat!
                            </p>
                        </div>
                    </div>

                </div>

                {{-- Right Column (Requirements & Banner) --}}
                <div style="display: flex; flex-direction: column; gap: 1.75rem;">

                    {{-- Requirements Checklist --}}
                    <div class="card-primary" style="gap: 1.25rem;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i data-lucide="list-checks" style="width: 20px; height: 20px; color: #7B61FF;"></i>
                            <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin: 0;">Persyaratan</h3>
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            {{-- Requirement 1: Length --}}
                            <div id="req-length" class="req-item met">
                                <div class="icon-container" style="flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                    <div class="met-icon" style="display: flex; background: #7B61FF; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="check" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                    <div class="unmet-icon" style="display: none; border: 2px solid #D1D5DB; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <span style="width: 8px; height: 8px; background: #9CA3AF; border-radius: 50%;"></span>
                                    </div>
                                    <div class="failed-icon" style="display: none; background: #EF4444; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="x" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 0.15rem;">
                                    <span class="title" style="font-size: 0.85rem; font-weight: 700;">Minimal 12 karakter</span>
                                    <span class="desc" style="font-size: 0.75rem; opacity: 0.8;">Lebih panjang lebih baik.</span>
                                </div>
                            </div>

                            {{-- Requirement 2: Numbers --}}
                            <div id="req-numbers" class="req-item met">
                                <div class="icon-container" style="flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                    <div class="met-icon" style="display: flex; background: #7B61FF; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="check" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                    <div class="unmet-icon" style="display: none; border: 2px solid #D1D5DB; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <span style="width: 8px; height: 8px; background: #9CA3AF; border-radius: 50%;"></span>
                                    </div>
                                    <div class="failed-icon" style="display: none; background: #EF4444; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="x" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 0.15rem;">
                                    <span class="title" style="font-size: 0.85rem; font-weight: 700;">Angka (0-9)</span>
                                    <span class="desc" style="font-size: 0.75rem; opacity: 0.8;">Memuat setidaknya satu angka.</span>
                                </div>
                            </div>

                            {{-- Requirement 3: Special characters --}}
                            <div id="req-special" class="req-item met">
                                <div class="icon-container" style="flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                    <div class="met-icon" style="display: flex; background: #7B61FF; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="check" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                    <div class="unmet-icon" style="display: none; border: 2px solid #D1D5DB; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <span style="width: 8px; height: 8px; background: #9CA3AF; border-radius: 50%;"></span>
                                    </div>
                                    <div class="failed-icon" style="display: none; background: #EF4444; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="x" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 0.15rem;">
                                    <span class="title" style="font-size: 0.85rem; font-weight: 700;">Karakter khusus</span>
                                    <span class="desc" style="font-size: 0.75rem; opacity: 0.8;">Simbol seperti ! @ # $ %</span>
                                </div>
                            </div>

                            {{-- Requirement 4: Mixed casing --}}
                            <div id="req-casing" class="req-item unmet">
                                <div class="icon-container" style="flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                    <div class="met-icon" style="display: none; background: #7B61FF; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="check" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                    <div class="unmet-icon" style="display: flex; border: 2px solid #D1D5DB; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <span style="width: 8px; height: 8px; background: #9CA3AF; border-radius: 50%;"></span>
                                    </div>
                                    <div class="failed-icon" style="display: none; background: #EF4444; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="x" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 0.15rem;">
                                    <span class="title" style="font-size: 0.85rem; font-weight: 700;">Kombinasi huruf</span>
                                    <span class="desc" style="font-size: 0.75rem; opacity: 0.8;">Huruf besar dan kecil.</span>
                                </div>
                            </div>

                            {{-- Requirement 5: No common patterns --}}
                            <div id="req-patterns" class="req-item failed">
                                <div class="icon-container" style="flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                    <div class="met-icon" style="display: none; background: #7B61FF; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="check" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                    <div class="unmet-icon" style="display: none; border: 2px solid #D1D5DB; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <span style="width: 8px; height: 8px; background: #9CA3AF; border-radius: 50%;"></span>
                                    </div>
                                    <div class="failed-icon" style="display: flex; background: #EF4444; border-radius: 50%; width: 24px; height: 24px; align-items: center; justify-content: center;">
                                        <i data-lucide="x" style="width: 14px; height: 14px; color: #fff;"></i>
                                    </div>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 0.15rem;">
                                    <span class="title" style="font-size: 0.85rem; font-weight: 700;">Tanpa pola umum</span>
                                    <span class="desc" style="font-size: 0.75rem; opacity: 0.8;">Hindari "123" atau "qwerty".</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Security Banner --}}
                    <div style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); border-radius: 1.5rem;
                                overflow: hidden; display: flex; flex-direction: column; box-shadow: 0 10px 25px rgba(15, 23, 42, 0.15); border: 1px solid rgba(255, 255, 255, 0.05);">
                        <div style="height: 180px; position: relative; background: radial-gradient(circle at center, #1E1B4B 0%, #0F172A 100%); display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/every_layer_counts.png') }}" style="width: 100%; height: 100%; object-fit: contain; padding: 1rem;" alt="Every layer counts illustration">
                        </div>
                        <div style="padding: 1.5rem; text-align: center;">
                            <p style="font-size: 0.95rem; font-weight: 700; color: #FFFFFF; margin: 0; letter-spacing: 0.02em;">Setiap lapisan keamanan sangat penting.</p>
                        </div>
                    </div>

                </div>

            </div>

            {{-- Bottom Section (Smart Password Habits) --}}
            <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-top: 1.5rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #111827; letter-spacing: -0.02em; margin: 0;">Kebiasaan Sandi Cerdas</h2>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">

                    {{-- Card 1 --}}
                    <div class="smart-habit-card">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(123, 97, 255, 0.1);
                                    display: flex; align-items: center; justify-content: center;">
                            <i data-lucide="key" style="width: 18px; height: 18px; color: #7B61FF;"></i>
                        </div>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin: 0.25rem 0 0;">Gunakan Pengelola Sandi</h3>
                        <p style="font-size: 0.85rem; color: #6B7280; line-height: 1.6; margin: 0;">
                            Jangan menghafal 50 sandi. Gunakan pengelola sandi untuk menyimpannya di brankas terenkripsi.
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div class="smart-habit-card">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(123, 97, 255, 0.1);
                                    display: flex; align-items: center; justify-content: center;">
                            <i data-lucide="smartphone" style="width: 18px; height: 18px; color: #7B61FF;"></i>
                        </div>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin: 0.25rem 0 0;">Aktifkan MFA</h3>
                        <p style="font-size: 0.85rem; color: #6B7280; line-height: 1.6; margin: 0;">
                            Autentikasi Multi-Faktor adalah garis pertahanan kedua terbaik Anda dari login tidak sah.
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="smart-habit-card">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(245, 158, 11, 0.1);
                                    display: flex; align-items: center; justify-content: center;">
                            <i data-lucide="rotate-cw" style="width: 18px; height: 18px; color: #D97706;"></i>
                        </div>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin: 0.25rem 0 0;">Ganti Secara Bijak</h3>
                        <p style="font-size: 0.85rem; color: #6B7280; line-height: 1.6; margin: 0;">
                            Ganti sandi Anda segera jika curiga terjadi kebocoran, tapi hindari mengganti terlalu sering tanpa alasan.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </main>

</div>

{{-- Custom Copy Modal --}}
<div class="custom-modal-backdrop" id="success-modal-backdrop">
    <div class="custom-modal">
        <div style="width: 60px; height: 60px; border-radius: 50%; background: #D1FAE5; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.1);">
            <i data-lucide="shield-check" style="width: 30px; height: 30px; color: #10B981;"></i>
        </div>
        <div style="display: flex; flex-direction: column; gap: 6px;">
            <h3 style="font-size: 1.35rem; font-weight: 800; color: #111827; margin: 0;">Keamanan Terjaga!</h3>
            <p style="font-size: 0.875rem; color: #6B7280; line-height: 1.5; margin: 0;">
                Sandi Anda disalin dan siap melindungi akun Anda. Pastikan menyimpannya dengan aman.
            </p>
        </div>
        <button id="modal-close-btn" type="button" style="background: #111827; color: #FFFFFF; font-weight: 700; font-size: 0.875rem;
                               padding: 0.75rem 2.25rem; border-radius: 0.75rem; border: none; cursor: pointer; transition: background-color 0.2s; width: 100%; margin-top: 0.5rem;"
                onmouseover="this.style.backgroundColor='#1F2937'" onmouseout="this.style.backgroundColor='#111827'">
            Luar Biasa!
        </button>
    </div>
</div>

{{-- Toast Notification --}}
<div class="custom-toast" id="clipboard-toast">
    <i data-lucide="copy" style="width: 18px; height: 18px;"></i>
    <span>Sandi disalin ke clipboard!</span>
</div>

<div id="mobile-sidebar-overlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:25;" onclick="document.getElementById('mobile-drawer-toggle').click();"></div>

{{-- Interactive JavaScript Logic --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password-input');
    const strengthLabel = document.getElementById('strength-label');
    const scoreBadge = document.getElementById('score-badge');
    const crackTimeSpan = document.getElementById('crack-time');
    const toggleVisibleBtn = document.getElementById('toggle-visibility');
    const eyeIcon = document.getElementById('eye-icon');
    const secureBtn = document.getElementById('secure-btn');
    const modalBackdrop = document.getElementById('success-modal-backdrop');
    const modalCloseBtn = document.getElementById('modal-close-btn');
    const toast = document.getElementById('clipboard-toast');

    // Drawer references
    const mobileToggle = document.getElementById('mobile-drawer-toggle');
    const sidebar = document.querySelector('aside.sidebar-nav');
    const overlay = document.getElementById('mobile-sidebar-overlay');

    // Mobile drawer toggling logic
    if (mobileToggle && sidebar && overlay) {
        mobileToggle.addEventListener('click', function () {
            sidebar.classList.toggle('show');
            if (sidebar.classList.contains('show')) {
                overlay.style.display = 'block';
            } else {
                overlay.style.display = 'none';
            }
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.style.display = 'none';
        });
    }

    // Common password patterns block list
    const commonPatterns = [
        '123', 'qwerty', 'password', 'admin', '12345', '123456', 'abcd', '12345678', 'asdf', 'password123', '123456789',
        '1234567890', 'letmein', 'iloveyou', 'p@ssword', 'p@ssw0rd', 'dragon', 'monkey', 'football', 'welcome', 'shadow'
    ];

    // Password strength levels definition
    const levels = [
        { label: 'Sangat Lemah', color: '#EF4444', activeSegments: 1 },
        { label: 'Lemah', color: '#F59E0B', activeSegments: 2 },
        { label: 'Sedang', color: '#3B82F6', activeSegments: 3 },
        { label: 'Kuat', color: '#7B61FF', activeSegments: 4 },
        { label: 'Sangat Kuat', color: '#10B981', activeSegments: 4 }
    ];

    // Requirement UI elements
    const reqs = {
        length: document.getElementById('req-length'),
        numbers: document.getElementById('req-numbers'),
        special: document.getElementById('req-special'),
        casing: document.getElementById('req-casing'),
        patterns: document.getElementById('req-patterns')
    };

    function updateRequirementUI(element, status) {
        element.classList.remove('unmet', 'met', 'failed');
        const metIcon = element.querySelector('.met-icon');
        const unmetIcon = element.querySelector('.unmet-icon');
        const failedIcon = element.querySelector('.failed-icon');

        metIcon.style.display = 'none';
        unmetIcon.style.display = 'none';
        failedIcon.style.display = 'none';

        if (status === 'met') {
            element.classList.add('met');
            metIcon.style.display = 'flex';
        } else if (status === 'failed') {
            element.classList.add('failed');
            failedIcon.style.display = 'flex';
        } else {
            element.classList.add('unmet');
            unmetIcon.style.display = 'flex';
        }
    }

    function calculateCrackTime(entropy) {
        if (entropy === 0) return 'Instan';

        // Attack scenario: offline cracking rate (200 billion hashes/second)
        const guessRate = 200_000_000_000;
        const totalGuesses = Math.pow(2, entropy - 1);
        const seconds = totalGuesses / guessRate;

        if (seconds < 1) return 'Instan';
        if (seconds < 60) return `${Math.round(seconds)} detik`;
        
        const minutes = seconds / 60;
        if (minutes < 60) return `${Math.round(minutes)} menit`;
        
        const hours = minutes / 60;
        if (hours < 24) return `${Math.round(hours)} jam`;
        
        const days = hours / 24;
        if (days < 30) return `${Math.round(days)} hari`;
        
        const months = days / 30.4375;
        if (months < 12) return `${Math.round(months)} bulan`;
        
        const years = days / 365.25;
        if (years < 100) return `${Math.round(years)} tahun`;
        if (years < 1000) return `${Math.round(years / 10) * 10} tahun`;
        if (years < 1000000) return `${Math.round(years / 100) * 100} tahun`;
        if (years < 1000000000) return `${Math.round(years / 1000000)} juta tahun`;
        return `${Math.round(years / 1000000000)} miliar tahun`;
    }

    function analyze() {
        const value = passwordInput.value;
        
        // Calculate criteria
        const hasLength = value.length >= 12;
        const hasNumbers = /\d/.test(value);
        const hasSpecial = /[^a-zA-Z\d]/.test(value);
        const hasMixed = /[a-z]/.test(value) && /[A-Z]/.test(value);
        
        // Check for common patterns
        let hasPattern = false;
        if (value.length > 0) {
            const lowerValue = value.toLowerCase();
            for (const pattern of commonPatterns) {
                if (lowerValue.includes(pattern)) {
                    hasPattern = true;
                    break;
                }
            }
        }

        // Update Checklist item UI
        updateRequirementUI(reqs.length, hasLength ? 'met' : 'unmet');
        updateRequirementUI(reqs.numbers, hasNumbers ? 'met' : 'unmet');
        updateRequirementUI(reqs.special, hasSpecial ? 'met' : 'unmet');
        updateRequirementUI(reqs.casing, hasMixed ? 'met' : 'unmet');
        updateRequirementUI(reqs.patterns, value.length === 0 ? 'unmet' : (hasPattern ? 'failed' : 'met'));

        // Calculate custom score
        let score = 0;
        if (value.length > 0) {
            if (value.length >= 12) score += 25;
            else if (value.length >= 8) score += 10;
            
            if (hasNumbers) score += 20;
            if (hasSpecial) score += 20;
            if (hasMixed) score += 20;
            if (!hasPattern) score += 15;
        }

        // Calculate Entropy for crack time
        let poolSize = 0;
        if (/[a-z]/.test(value)) poolSize += 26;
        if (/[A-Z]/.test(value)) poolSize += 26;
        if (/\d/.test(value)) poolSize += 10;
        if (/[^a-zA-Z\d]/.test(value)) poolSize += 33; // Approx symbol count

        const entropy = poolSize > 0 ? value.length * Math.log2(poolSize) : 0;
        const crackTimeText = calculateCrackTime(entropy);
        crackTimeSpan.innerText = crackTimeText;

        // Determine Strength Level index based on score
        let lvlIndex = 0;
        if (score >= 90) lvlIndex = 4;      // Very Strong
        else if (score >= 75) lvlIndex = 3; // Strong
        else if (score >= 50) lvlIndex = 2; // Medium
        else if (score >= 25) lvlIndex = 1; // Weak
        else lvlIndex = 0;                  // Very Weak

        // If empty password
        if (value.length === 0) {
            strengthLabel.innerText = 'None';
            strengthLabel.style.color = '#9CA3AF';
            scoreBadge.innerText = '0/100';
            // Reset segments
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`seg-${i}`).style.backgroundColor = '#E5E7EB';
            }
            return;
        }

        const currentLvl = levels[lvlIndex];
        strengthLabel.innerText = currentLvl.label;
        strengthLabel.style.color = currentLvl.color;
        scoreBadge.innerText = `${score}/100`;
        scoreBadge.style.background = currentLvl.color + '26'; // 15% opacity hex
        scoreBadge.style.color = currentLvl.color;

        // Update segmented progress bar colors
        for (let i = 1; i <= 4; i++) {
            const seg = document.getElementById(`seg-${i}`);
            if (i <= currentLvl.activeSegments) {
                seg.style.backgroundColor = currentLvl.color;
            } else {
                seg.style.backgroundColor = '#E5E7EB';
            }
        }
    }

    // Visibility toggle functionality
    let isVisible = true;
    toggleVisibleBtn.addEventListener('click', function () {
        isVisible = !isVisible;
        if (isVisible) {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('data-lucide', 'eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('data-lucide', 'eye-off');
        }
        lucide.createIcons(); // Redraw icon
    });

    // Copy to clipboard secure action
    secureBtn.addEventListener('click', function () {
        const textToCopy = passwordInput.value;
        if (!textToCopy) return;

        navigator.clipboard.writeText(textToCopy).then(function () {
            // Show custom modal
            modalBackdrop.classList.add('show');

            // Trigger temporary toast
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }).catch(function (err) {
            console.error('Failed to copy password: ', err);
        });
    });

    // Close Modal button
    modalCloseBtn.addEventListener('click', function () {
        modalBackdrop.classList.remove('show');
    });

    // Close Modal on click backdrop
    modalBackdrop.addEventListener('click', function (e) {
        if (e.target === modalBackdrop) {
            modalBackdrop.classList.remove('show');
        }
    });

    // Listen to inputs
    passwordInput.addEventListener('input', analyze);

    // Run first analysis for pre-populated value
    analyze();
});
</script>
@endsection
