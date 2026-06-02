@extends('layouts.app')

@section('content')
    <div style="display:flex; min-height:100vh; background:#F9FAFB;">
        @include('partials.sidebar', ['active' => 'materi'])

        <main
            style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:6rem; position: relative;">
            @include('partials.header', ['placeholder' => 'Cari materi keamanan siber...'])

            <!-- Detail Materi Content -->
            <div style="padding: 2rem 4rem; display: flex; flex-direction: column; align-items: center;">
                <div style="max-width: 800px; width: 100%;">

                    <!-- Badges -->
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                        <div
                            style="background-color: #F3E8FF; color: #7C3AED; font-size: 0.75rem; font-weight: 800; padding: 0.35rem 1rem; border-radius: 9999px; letter-spacing: 0.05em;">
                            FUNDAMENTALS</div>
                        <div style="font-size: 0.85rem; font-weight: 700; color: #6B7280;">• 15 MIN BACA</div>
                    </div>

                    <!-- Title -->
                    <h1 style="font-size: 2.25rem; font-weight: 800; color: #111; line-height: 1.3; margin-bottom: 1rem;">
                        {{ $materi->judul }}</h1>
                    <p style="font-size: 1.1rem; color: #4B5563; margin-bottom: 2rem; line-height: 1.6;">
                        {{ $materi->deskripsi }}</p>

                    <!-- Author Box -->
                    <div
                        style="display: inline-flex; align-items: center; gap: 1rem; padding: 1rem 1.5rem; border: 1px solid var(--border); border-radius: 0.75rem; margin-bottom: 2.5rem; background-color: white;">
                        <div
                            style="width: 40px; height: 40px; border-radius: 50%; background-color: #F3E8FF; display: flex; align-items: center; justify-content: center; color: #7C3AED;">
                            <i data-lucide="shield" style="width: 20px; height: 20px;"></i>
                        </div>
                        <div>
                            <div
                                style="font-size: 0.65rem; font-weight: 800; color: #6B7280; letter-spacing: 0.1em; margin-bottom: 0.25rem;">
                                DIULAS OLEH</div>
                            <div style="font-weight: 700; color: var(--primary); font-size: 0.95rem;">Tim Edukasi Nexyra
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div style="font-size: 1.05rem; color: #374151; line-height: 1.8;">
                        {!! $materi->konten !!}

                        <!-- Cyber Tip Box -->
                        <div
                            style="background-color: #F5F3FF; border-radius: 0.75rem; padding: 1.5rem; display: flex; gap: 1.25rem; align-items: flex-start; margin: 3rem 0; border-left: 4px solid var(--primary);">
                            <div
                                style="width: 48px; height: 48px; border-radius: 50%; background-color: white; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                                <i data-lucide="lightbulb"
                                    style="width: 24px; height: 24px; color: var(--primary); fill: var(--primary);"></i>
                            </div>
                            <div>
                                <h4
                                    style="font-weight: 800; color: var(--primary); font-size: 1.15rem; margin-bottom: 0.5rem;">
                                    Cyber-Tip: Gunakan MFA!</h4>
                                <p style="font-size: 0.95rem; color: #4C1D95; opacity: 0.9; margin: 0; line-height: 1.6;">
                                    Cara paling efektif untuk melindungi diri dari phishing adalah dengan mengaktifkan
                                    Multi-Factor Authentication (MFA). Bahkan jika penyerang berhasil mendapatkan kata
                                    sandimu, mereka tetap tidak bisa masuk tanpa kode tambahan dari HP-mu.</p>
                            </div>
                        </div>

                        <p style="margin-bottom:1.5rem;">Kesimpulannya, keamanan siber bukan hanya tentang teknologi
                            canggih, tapi tentang kewaspadaan kita. Selalu "berhenti, pikirkan, dan verifikasi" sebelum
                            membagikan informasi apa pun di internet.</p>
                    </div>

                    <!-- Bottom CTA -->
                    <div style="text-align: center; margin-top: 5rem; padding-bottom: 3rem;">
                        <div
                            style="font-size: 0.75rem; font-weight: 800; color: #6B7280; letter-spacing: 0.1em; margin-bottom: 1rem;">
                            SELESAI MEMBACA?</div>
                        <h2 style="font-size: 1.75rem; font-weight: 800; color: #111; margin-bottom: 1.5rem;">Uji
                            pengetahuanmu sekarang!</h2>
                        <button class="btn"
                            style="padding: 0.75rem 2.5rem; font-size: 1.1rem; display: inline-flex; align-items: center; gap: 0.5rem; border-radius: 0.5rem;">
                            Mulai Quiz <i data-lucide="arrow-right" style="width: 20px; height: 20px;"></i>
                        </button>
                    </div>

                    <!-- Bottom Bar (Static) -->
                    <div
                        style="width: 100%; background-color: white; border: 1px solid var(--border); border-radius: 0.75rem; padding: 1rem 1.5rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); margin-bottom: 2rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div
                                style="width: 48px; height: 48px; border-radius: 0.5rem; background-color: #F3E8FF; display: flex; align-items: center; justify-content: center; color: var(--primary);">
                                <i data-lucide="book-open" style="width: 24px; height: 24px;"></i>
                            </div>
                            <div>
                                <div
                                    style="font-size: 0.7rem; font-weight: 800; color: #6B7280; letter-spacing: 0.05em; margin-bottom: 0.35rem;">
                                    PROGRES MATERI</div>
                                <div
                                    style="width: 250px; height: 8px; background-color: #E5E7EB; border-radius: 9999px; overflow: hidden;">
                                    <div style="width: 100%; height: 100%; background-color: var(--primary);"></div>
                                </div>
                            </div>
                        </div>
                        <button
                            style="background: none; border: none; font-size: 1.05rem; font-weight: 700; color: #111; display: inline-flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            Mulai Quiz <i data-lucide="zap" style="width: 18px; height: 18px;"></i>
                        </button>
                    </div>
                </div>
            </div>

        </main>

    </div>
@endsection