@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">

    @include('partials.sidebar', ['active' => 'materi'])

    <!-- Main Content -->
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:6rem;">

        @include('partials.header', ['placeholder' => 'Cari materi keamanan siber...'])

        <!-- Article Content -->
        <div style="max-width: 860px; margin: 0 auto; padding: 2.5rem 2rem;">

            <!-- Breadcrumb & Meta -->
            <div class="flex items-center gap-2 text-xs font-bold text-muted" style="margin-bottom: 1.5rem; letter-spacing: 0.05em;">
                <span style="background-color: rgba(139,92,246,0.1); color: var(--primary); padding: 0.25rem 0.75rem; border-radius: 9999px;">FUNDAMENTALS</span>
                <span>•</span>
                <span>15 MIN BACA</span>
            </div>

            <!-- Title -->
            <h1 class="font-bold" style="font-size: 2rem; line-height: 1.25; margin-bottom: 0.75rem; color: #111; letter-spacing: -0.02em;">
                {{ $materi['judul'] }}
            </h1>
            <p class="text-muted" style="font-size: 1rem; margin-bottom: 2rem; line-height: 1.6;">{{ $materi['deskripsi'] }}</p>

            <!-- Author -->
            <div class="flex items-center gap-3" style="margin-bottom: 2.5rem; padding-bottom: 2rem; border-bottom: 1px solid var(--border);">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 0.875rem;">N</div>
                <div>
                    <p class="font-bold text-sm">Disajikan oleh</p>
                    <p class="text-xs text-muted">Tim Edukasi Nexyra</p>
                </div>
            </div>

            <!-- Content Body -->
            <div style="line-height: 1.85; color: #374151; font-size: 0.975rem;">
                {!! $materi['konten'] !!}
            </div>

            <!-- Cyber Tip Box -->
            <div style="background: linear-gradient(135deg, #F5F3FF, #EDE9FE); border-left: 4px solid var(--primary); border-radius: 0.75rem; padding: 1.5rem; margin: 2.5rem 0;">
                <div class="flex items-center gap-2 font-bold text-primary" style="margin-bottom: 0.75rem; font-size: 0.875rem;">
                    <i data-lucide="lightbulb" style="width: 18px; height: 18px;"></i>
                    Cyber-Tip: Gunakan MFA!
                </div>
                <p class="text-sm" style="color: #4C1D95; line-height: 1.7;">
                    Cara paling efektif untuk melindungi diri dari phishing adalah dengan mengaktifkan Multi-Factor Authentication (MFA). Bahkan jika penyerang berhasil mendapatkan kata sandimu, mereka tidak bisa masuk tanpa kode tambahan dari HP-mu.
                </p>
            </div>

            <!-- Conclusion -->
            <p style="line-height: 1.85; color: #374151; font-size: 0.975rem; margin-bottom: 3rem;">
                Kesimpulannya, keamanan siber bukan hanya tentang teknologi canggih, tapi tentang kewaspadaan kita. Selalu "berhenti, pikirkan, dan verifikasi" sebelum membagikan informasi apa pun di internet.
            </p>

            <!-- CTA Section -->
            <div style="border-top: 1px solid var(--border); padding-top: 2.5rem; text-align: center;">
                <p class="text-xs font-bold text-muted" style="letter-spacing: 0.1em; margin-bottom: 0.75rem;">SELESAI MEMBACA?</p>
                <h3 class="font-bold" style="font-size: 1.5rem; margin-bottom: 0.5rem;">Uji pengetahuanmu sekarang!</h3>
                <p class="text-muted text-sm" style="margin-bottom: 1.5rem;">Kerjakan quiz untuk mengukur pemahamanmu tentang materi ini.</p>
                <a href="#" class="btn btn-primary" style="padding: 0.875rem 2.5rem; font-size: 1rem; border-radius: 2rem;">
                    Mulai Quiz <i data-lucide="arrow-right" style="width: 18px; height: 18px; margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </main>

    <!-- Bottom Progress Bar -->
    <div style="position: fixed; bottom: 0; left: 260px; right: 0; background-color: white; border-top: 1px solid var(--border); padding: 1rem 2rem; display: flex; align-items: center; justify-content: space-between; z-index: 10;">
        <div class="flex items-center gap-3" style="flex: 1;">
            <i data-lucide="book-open" class="text-muted" style="width: 18px; height: 18px;"></i>
            <div style="flex: 1; background-color: #E5E7EB; border-radius: 9999px; height: 6px;">
                <div style="background-color: var(--primary); height: 6px; border-radius: 9999px; width: 65%; transition: width 0.3s;"></div>
            </div>
            <span class="text-xs font-bold text-muted">65%</span>
        </div>
        <a href="#" class="btn btn-primary" style="margin-left: 2rem; padding: 0.6rem 1.5rem; font-size: 0.875rem; border-radius: 2rem;">
            Mulai Quiz <i data-lucide="arrow-right" style="width: 16px; height: 16px; margin-left: 6px;"></i>
        </a>
    </div>
</div>
@endsection
