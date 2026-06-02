@extends('layouts.app')

@section('content')
<style>
/* Responsive styles */
@media (max-width: 768px) {
  aside { display: none; }
  main { margin-left: 0 !important; }
  #mobile-drawer-toggle { display: inline-block !important; }
  .rekomendasi-page .grid { grid-template-columns: 1fr !important; }
  aside.hidden { display: block !important; }
}
</style>
<div class="rekomendasi-page" style="display:flex; min-height:100vh; background:#F9FAFB;">

    {{-- ===== SIDEBAR ===== --}}
    @include('partials.sidebar', ['active' => 'rekomendasi'])

    {{-- ===== MAIN ===== --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">

        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari topik atau materi...'])

        {{-- Content Wrapper --}}
        <div style="padding:2rem 2.5rem; display:flex; flex-direction:column; gap:2rem;">

            {{-- Title Section --}}
            <div>
                <h1 style="font-size:2.25rem; font-weight:800; color:#111827; margin-bottom:0.5rem; letter-spacing:-0.02em;">Rekomendasi Pembelajaran</h1>
                <p style="font-size:0.95rem; color:#6B7280; line-height:1.5;">Berdasarkan aktivitas terakhirmu dalam simulasi 'Phishing Defense', kami telah menyiapkan jalur belajar khusus untuk memperkuat pertahananmu.</p>
            </div>

            {{-- Rekomendasi Utama (Primary Card) --}}
            <div style="background:#fff; border:1px solid #E5E7EB; border-radius:1.5rem; display:flex; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.02); min-height:380px;">
                <!-- Left Column (Info) -->
                <div style="flex:1.2; padding:3rem; display:flex; flex-direction:column; justify-content:center;">
                    <div style="display:flex; align-items:center; gap:8px; color:#7B61FF; font-weight:700; font-size:0.75rem; letter-spacing:0.08em; text-transform:uppercase;">
                        <i data-lucide="sparkles" style="width:14px; height:14px;"></i> Rekomendasi Utama
                    </div>
                    <h2 style="font-size:2.25rem; font-weight:800; color:#111827; margin-top:0.75rem; margin-bottom:1.25rem; line-height:1.25; letter-spacing:-0.03em;">
                        Mastering Social Engineering Defense
                    </h2>
                    <p style="font-size:0.925rem; color:#6B7280; line-height:1.7; margin-bottom:2.25rem; max-width:520px;">
                        Karena kamu berhasil mengidentifikasi 4 dari 5 serangan phishing kemarin, modul ini akan membantumu memahami psikologi di balik manipulasi digital untuk perlindungan tingkat lanjut.
                    </p>
                    <div style="display:flex; align-items:center; gap:1.5rem;">
                        <a href="{{ route('materi.detail', 'mastering-social-engineering-defense') }}" style="display:inline-flex; align-items:center; gap:8px; background:#7B61FF; color:#fff; font-weight:700; font-size:0.9rem; padding:0.85rem 1.75rem; border-radius:0.75rem; box-shadow:0 4px 14px rgba(123, 97, 255, 0.35); transition:transform 0.2s, background-color 0.2s;" 
                           onmouseover="this.style.transform='translateY(-2px)'; this.style.backgroundColor='#6366F1';" 
                           onmouseout="this.style.transform='none'; this.style.backgroundColor='#7B61FF';">
                            Mulai Sekarang <i data-lucide="arrow-right" style="width:16px; height:16px;"></i>
                        </a>
                        <div style="display:flex; align-items:center; gap:6px; font-size:0.875rem; color:#4B5563; font-weight:600;">
                            <i data-lucide="clock" style="width:16px; height:16px; color:#6B7280;"></i> 45 Menit
                        </div>
                    </div>
                </div>
                
                <!-- Right Column (Cyber Illustration) -->
                <div style="flex:1; position:relative; background-image:url('{{ asset('images/cyber_recommendation.png') }}'); background-size:cover; background-position:center; min-height:100%;">
                    <!-- Cyber Tips Overlay Box -->
                    <div style="position:absolute; bottom:1.5rem; right:1.5rem; width:260px; background:rgba(255,255,255,0.92); backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px); border-radius:1rem; padding:1.25rem; border:1px solid rgba(255,255,255,0.5); box-shadow:0 10px 25px rgba(0,0,0,0.08); display:flex; flex-direction:column; gap:8px;">
                        <div style="display:flex; align-items:center; gap:6px; color:#B45309; font-weight:800; font-size:0.7rem; letter-spacing:0.06em; text-transform:uppercase;">
                            <i data-lucide="lightbulb" style="width:14px; height:14px; fill:#F59E0B; color:#F59E0B; stroke-width:2;"></i> Cyber-Tips
                        </div>
                        <p style="font-size:0.775rem; color:#4B5563; line-height:1.5; font-weight:500; margin:0;">
                            Jangan pernah membagikan OTP meskipun penelpon terdengar sangat meyakinkan.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Lanjutkan Eksplorasi Section --}}
            <div style="display:flex; flex-direction:column; gap:1.25rem; margin-top:0.5rem;">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h3 style="font-size:1.5rem; font-weight:800; color:#111827; letter-spacing:-0.01em;">Lanjutkan Eksplorasi</h3>
                    <a href="{{ route('materi') }}" style="font-size:0.875rem; font-weight:700; color:#7B61FF; display:inline-flex; align-items:center; gap:2px; transition:color 0.2s;" onmouseover="this.style.color='#6366F1';" onmouseout="this.style.color='#7B61FF';">
                        Lihat Semua <i data-lucide="chevron-right" style="width:16px; height:16px;"></i>
                    </a>
                </div>

                {{-- Cards Grid --}}
                <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1.5rem;">
                    
                    <!-- Card 1: Dasar Keamanan Jaringan -->
                    <div style="background:#fff; border:1px solid #E5E7EB; border-radius:1.25rem; display:flex; flex-direction:column; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.02); transition:transform 0.2s, box-shadow 0.2s;" 
                         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.05)';" 
                         onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.02)';">
                        <div style="height:170px; position:relative; overflow:hidden; background:#F3F4F6;">
                            <img src="{{ asset('images/network_globe_isometric.png') }}" style="width:100%; height:100%; object-fit:cover;" alt="Dasar Keamanan Jaringan">
                            <span style="position:absolute; top:0.75rem; left:0.75rem; background:#D1FAE5; color:#10B981; font-size:0.65rem; font-weight:800; padding:0.25rem 0.6rem; border-radius:4px; letter-spacing:0.05em;">MUDAH</span>
                        </div>
                        <div style="padding:1.5rem; display:flex; flex-direction:column; flex:1;">
                            <h4 style="font-size:1.125rem; font-weight:800; color:#111827; margin-bottom:0.5rem; line-height:1.3;">Dasar Keamanan Jaringan</h4>
                            <p style="font-size:0.85rem; color:#6B7280; line-height:1.55; margin-bottom:1.5rem; flex:1;">Pahami bagaimana data berpindah dari devicemu ke server dengan aman melalui enkripsi.</p>
                            <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid #F3F4F6; padding-top:1rem; margin-top:auto;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="display:flex; align-items:center;">
                                        <div style="width:20px; height:20px; border-radius:50%; background:#E5E7EB; border:1.5px solid #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; margin-right:-6px; z-index:2;"><i data-lucide="user" style="width:8px; height:8px; color:#9CA3AF;"></i></div>
                                        <div style="width:20px; height:20px; border-radius:50%; background:#D1D5DB; border:1.5px solid #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; z-index:1;"><i data-lucide="user" style="width:8px; height:8px; color:#9CA3AF;"></i></div>
                                    </div>
                                    <span style="font-size:0.725rem; font-weight:700; color:#9CA3AF;">1.2k Siswa</span>
                                </div>
                                <a href="{{ route('materi.detail', 'dasar-keamanan-jaringan') }}" style="display:flex; align-items:center; gap:4px; font-size:0.85rem; font-weight:700; color:#7B61FF;">
                                    Mulai <i data-lucide="play-circle" style="width:18px; height:18px; fill:#7B61FF; color:#fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Seni Kriptografi Modern -->
                    <div style="background:#fff; border:1px solid #E5E7EB; border-radius:1.25rem; display:flex; flex-direction:column; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.02); transition:transform 0.2s, box-shadow 0.2s;" 
                         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.05)';" 
                         onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.02)';">
                        <div style="height:170px; position:relative; overflow:hidden; background:#F3F4F6;">
                            <img src="{{ asset('images/cryptography_locks_keys.png') }}" style="width:100%; height:100%; object-fit:cover;" alt="Seni Kriptografi Modern">
                            <span style="position:absolute; top:0.75rem; left:0.75rem; background:#FEF3C7; color:#D97706; font-size:0.65rem; font-weight:800; padding:0.25rem 0.6rem; border-radius:4px; letter-spacing:0.05em;">MENENGAH</span>
                        </div>
                        <div style="padding:1.5rem; display:flex; flex-direction:column; flex:1;">
                            <h4 style="font-size:1.125rem; font-weight:800; color:#111827; margin-bottom:0.5rem; line-height:1.3;">Seni Kriptografi Modern</h4>
                            <p style="font-size:0.85rem; color:#6B7280; line-height:1.55; margin-bottom:1.5rem; flex:1;">Belajar memecahkan kode rahasia dan bagaimana cara kerja kunci publik vs kunci privat.</p>
                            <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid #F3F4F6; padding-top:1rem; margin-top:auto;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="display:flex; align-items:center;">
                                        <div style="width:20px; height:20px; border-radius:50%; background:#E5E7EB; border:1.5px solid #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; margin-right:-6px; z-index:2;"><i data-lucide="user" style="width:8px; height:8px; color:#9CA3AF;"></i></div>
                                        <div style="width:20px; height:20px; border-radius:50%; background:#D1D5DB; border:1.5px solid #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; z-index:1;"><i data-lucide="user" style="width:8px; height:8px; color:#9CA3AF;"></i></div>
                                    </div>
                                    <span style="font-size:0.725rem; font-weight:700; color:#9CA3AF;">+850 Siswa</span>
                                </div>
                                <a href="{{ route('materi.detail', 'seni-kriptografi-modern') }}" style="display:flex; align-items:center; gap:4px; font-size:0.85rem; font-weight:700; color:#7B61FF;">
                                    Mulai <i data-lucide="play-circle" style="width:18px; height:18px; fill:#7B61FF; color:#fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: OWASP Top 10 Beginner -->
                    <div style="background:#fff; border:1px solid #E5E7EB; border-radius:1.25rem; display:flex; flex-direction:column; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.02); transition:transform 0.2s, box-shadow 0.2s;" 
                         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.05)';" 
                         onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.02)';">
                        <div style="height:170px; position:relative; overflow:hidden; background:#F3F4F6;">
                            <img src="{{ asset('images/laptop_desk_coding.png') }}" style="width:100%; height:100%; object-fit:cover;" alt="OWASP Top 10 Beginner">
                            <span style="position:absolute; top:0.75rem; left:0.75rem; background:#FEF3C7; color:#D97706; font-size:0.65rem; font-weight:800; padding:0.25rem 0.6rem; border-radius:4px; letter-spacing:0.05em;">MENENGAH</span>
                        </div>
                        <div style="padding:1.5rem; display:flex; flex-direction:column; flex:1;">
                            <h4 style="font-size:1.125rem; font-weight:800; color:#111827; margin-bottom:0.5rem; line-height:1.3;">OWASP Top 10 Beginner</h4>
                            <p style="font-size:0.85rem; color:#6B7280; line-height:1.55; margin-bottom:1.5rem; flex:1;">Mengenal 10 kerentanan aplikasi web paling populer dan cara mencegahnya sejak dini.</p>
                            <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid #F3F4F6; padding-top:1rem; margin-top:auto;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="display:flex; align-items:center;">
                                        <div style="width:20px; height:20px; border-radius:50%; background:#E5E7EB; border:1.5px solid #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; margin-right:-6px; z-index:2;"><i data-lucide="user" style="width:8px; height:8px; color:#9CA3AF;"></i></div>
                                        <div style="width:20px; height:20px; border-radius:50%; background:#D1D5DB; border:1.5px solid #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; z-index:1;"><i data-lucide="user" style="width:8px; height:8px; color:#9CA3AF;"></i></div>
                                    </div>
                                    <span style="font-size:0.725rem; font-weight:700; color:#9CA3AF;">540 Siswa</span>
                                </div>
                                <a href="{{ route('materi.detail', 'owasp-top-10-beginner') }}" style="display:flex; align-items:center; gap:4px; font-size:0.85rem; font-weight:700; color:#7B61FF;">
                                    Mulai <i data-lucide="play-circle" style="width:18px; height:18px; fill:#7B61FF; color:#fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Streak Alert Banner --}}
            <div style="background:#0E004E; border-radius:1.25rem; padding:1.5rem 2.25rem; display:flex; justify-content:space-between; align-items:center; color:#fff; margin-top:0.5rem; box-shadow:0 8px 30px rgba(14, 0, 78, 0.15);">
                <div>
                    <h4 style="font-size:1.125rem; font-weight:800; margin:0; display:flex; align-items:center; gap:6px;">
                        Pertahankan Semangatmu! 🔥
                    </h4>
                    <p style="font-size:0.85rem; opacity:0.85; margin:6px 0 0 0; line-height:1.4;">
                        Kamu sedang dalam 5 hari streak belajar. Selesaikan 1 modul hari ini untuk bonus 100 XP.
                    </p>
                </div>
                
                {{-- Streak Days Tracker --}}
                <div style="display:flex; gap:8px; align-items:center;">
                    @foreach([['M', true], ['S', true], ['S', true], ['R', true], ['K', true], ['J', true], ['S', false]] as $day)
                        <div style="width:36px; height:36px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:0.875rem; font-weight:700;
                                    background:{{ $day[1] ? '#5236EC' : 'rgba(255,255,255,0.06)' }};
                                    color:{{ $day[1] ? '#fff' : 'rgba(255,255,255,0.35)' }};
                                    border: 1px solid {{ $day[1] ? 'transparent' : 'rgba(255,255,255,0.08)' }};">
                            {{ $day[0] }}
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>

</div>
<div id="mobile-sidebar-overlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:30;" onclick="document.getElementById('mobile-drawer-toggle').click();"></div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('mobile-drawer-toggle');
    const sidebar = document.querySelector('aside');
    const overlay = document.getElementById('mobile-sidebar-overlay');
    if (toggleBtn && sidebar && overlay) {
      toggleBtn.addEventListener('click', function () {
        const hidden = sidebar.classList.toggle('hidden');
        overlay.style.display = hidden ? 'block' : 'none';
      });
    }
  });
</script>
@endpush

@endsection
