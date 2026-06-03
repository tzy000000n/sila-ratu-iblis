@extends('layouts.app')

@section('content')
<style>
/* Reset, backgrounds, and smooth scroll */
body {
    background-color: #F9FAFB;
    color: #111827;
}

.profile-container {
    display: flex;
    min-height: 100vh;
    background: #F9FAFB;
}

/* Sidebar Responsive Overlay */
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

/* Grid Layouts */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

.journey-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

@media (max-width: 1024px) {
    .journey-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .journey-grid {
        grid-template-columns: 1fr;
    }
}

/* Card Styling */
.card-base {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 1.5rem;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.015);
}

.stat-card {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 1.25rem;
    padding: 1.75rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.01);
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    position: relative;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.03);
}

.journey-card {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 1.25rem;
    padding: 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    position: relative;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.journey-card.locked {
    background: #F9FAFB;
    opacity: 0.75;
}

.journey-card:not(.locked):hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.03);
}

/* Difficulty Badges */
.badge-diff {
    font-size: 0.65rem;
    font-weight: 800;
    padding: 0.25rem 0.6rem;
    border-radius: 4px;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}

.badge-easy {
    background: #D1FAE5;
    color: #10B981;
}

.badge-medium {
    background: #FEF3C7;
    color: #D97706;
}

.badge-hard {
    background: #FEE2E2;
    color: #EF4444;
}

.badge-locked {
    background: #E5E7EB;
    color: #6B7280;
}

/* Toast and Backdrop overlays */
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

.custom-modal-backdrop.show {
    display: flex;
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
    gap: 1.5rem;
    transform: scale(0.9);
    transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.custom-modal-backdrop.show .custom-modal {
    transform: scale(1);
}

/* Buttons style */
.btn-fill {
    background: #7B61FF;
    color: #FFFFFF;
    font-weight: 700;
    font-size: 0.9rem;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 14px rgba(123, 97, 255, 0.25);
    transition: background-color 0.2s, transform 0.2s;
}

.btn-fill:hover {
    background: #6366F1;
    transform: translateY(-1px);
}

.btn-outline {
    background: transparent;
    border: 1px solid rgba(123, 97, 255, 0.4);
    color: #7B61FF;
    font-weight: 700;
    font-size: 0.9rem;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.2s, transform 0.2s;
}

.btn-outline:hover {
    background: rgba(123, 97, 255, 0.06);
    transform: translateY(-1px);
}
</style>

<div class="profile-container">

    {{-- ===== SIDEBAR ===== --}}
    @if(auth()->user()->role === 'admin')
        @include('partials.sidebar-admin', ['active' => ''])
    @else
        <aside class="sidebar-nav" style="width:260px; flex-shrink:0; position:fixed; top:0; left:0; height:100vh;
                      background:rgba(255,255,255,0.92); backdrop-filter:blur(12px);
                      border-right:1px solid #E5E7EB; display:flex; flex-direction:column;
                      justify-content:space-between; z-index:30; overflow-y:auto;">
            @include('partials.sidebar', ['active' => 'profil'])
        </aside>
    @endif

    {{-- ===== MAIN ===== --}}
    <main class="main-content" style="flex:1; margin-left:260px; display:flex; flex-direction:column; min-width: 0;">

        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari pelajaran atau topik...'])

        {{-- Content Wrapper --}}
        <div style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2rem; max-width: 1200px; width: 100%; margin: 0 auto;">

            {{-- Profile Header Card --}}
            <div class="card-base" style="display: flex; gap: 2rem; flex-wrap: wrap; align-items: center;">
                <div style="position: relative; width: 120px; height: 120px; flex-shrink: 0; margin: 0 auto;">
                    @php
                        $user = auth()->user();
                        $name = strtolower($user->name);
                        // Simple heuristic for gender based on our seeded users
                        $isFemale = in_array($name, ['naysilla', 'rusyda', 'alicia', 'salsa']);
                        
                        // We use a dynamic avatar service if no custom avatar is set
                        $genderPath = $isFemale ? 'girl' : 'boy';
                        $avatarUrl = $user->avatar ? asset('uploads/avatars/' . $user->avatar) : "https://avatar.iran.liara.run/public/{$genderPath}?username=" . urlencode($user->name);

                        // Adjust border color based on role
                        $borderColor = '#7B61FF'; // Default for siswa
                        if ($user->role == 'admin') $borderColor = '#EF4444'; // Red for admin
                    @endphp
                    <img id="avatar-img" src="{{ $avatarUrl }}"
                         style="width: 120px; height: 120px; border-radius: 1.5rem; object-fit: cover; border: 3px solid {{ $borderColor }}; background: #E5E7EB; box-shadow: 0 8px 16px rgba(0,0,0,0.1);"
                         alt="{{ $user->name }} Avatar">
                    
                    <div style="position: absolute; bottom: -8px; right: -8px; width: 28px; height: 28px; background: {{ $borderColor }};
                                border: 3px solid #FFFFFF; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                        @if(auth()->user()->role == 'admin')
                            <i data-lucide="shield" style="width: 14px; height: 14px; color: #FFFFFF; stroke-width: 2.5;"></i>
                        @else
                            <i data-lucide="check" style="width: 14px; height: 14px; color: #FFFFFF; stroke-width: 3;"></i>
                        @endif
                    </div>
                </div>

                {{-- Profile Info --}}
                <div style="flex: 1; min-width: 280px; display: flex; flex-direction: column; gap: 0.75rem;">
                    <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                        <h1 id="profile-name" style="font-size: 2rem; font-weight: 800; color: #111827; margin: 0; letter-spacing: -0.02em;">{{ auth()->user()->name }}</h1>
                        <span style="background: rgba(123, 97, 255, 0.12); color: #7B61FF; font-size: 0.65rem; font-weight: 800;
                                     padding: 0.35rem 0.75rem; border-radius: 9999px; letter-spacing: 0.05em; text-transform: uppercase;">
                            ROLE: {{ auth()->user()->role }}
                        </span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 6px; font-size: 0.875rem; color: #6B7280; font-weight: 600;">
                        <i data-lucide="mail" style="width: 16px; height: 16px; color: #9CA3AF;"></i>
                        <span id="profile-email">{{ auth()->user()->email }}</span>
                    </div>

                    <p id="profile-bio" style="font-size: 0.925rem; color: #4B5563; line-height: 1.6; margin: 0; max-width: 600px;">
                        @if($user->bio)
                            {{ $user->bio }}
                        @elseif($user->role == 'admin')
                            Administrator platform Nexyra Learn. Bertanggung jawab atas pengelolaan dan persetujuan materi.
                        @else
                            Tertarik pada ethical hacking dan network security. Saat ini sedang mendalami kriptografi dan dasar-dasar penetration testing.
                        @endif
                    </p>
                </div>

                {{-- Action Buttons --}}
                <div style="display: flex; flex-direction: column; gap: 0.75rem; flex-shrink: 0; min-width: 160px; width: 100%; max-width: 200px;">
                    <button id="edit-profile-btn" class="btn-fill" style="width: 100%; justify-content: center;">
                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i> Edit Profile
                    </button>
                    @if(auth()->user()->role == 'siswa')
                    <button id="share-stats-btn" class="btn-outline" style="width: 100%; justify-content: center;">
                        <i data-lucide="share-2" style="width: 16px; height: 16px;"></i> Share Stats
                    </button>
                    @endif
                </div>
            </div>

            @if(auth()->user()->role == 'siswa')
            {{-- Stats Grid Section --}}
            <div class="stats-grid">
                {{-- Stat Card 1 --}}
                <div class="stat-card">
                    <span style="position: absolute; top: 1.25rem; right: 1.5rem; font-size: 0.75rem; font-weight: 800; color: #10B981;">
                        +240 this week
                    </span>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(123, 97, 255, 0.1);
                                display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="award" style="width: 20px; height: 20px; color: #7B61FF;"></i>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                        <span style="font-size: 0.65rem; font-weight: 800; color: #9CA3AF; letter-spacing: 0.08em; text-transform: uppercase;">
                            Total Experience
                        </span>
                        <span style="font-size: 1.75rem; font-weight: 800; color: #7B61FF;">{{ number_format(auth()->user()->xp ?? 0) }} <span style="font-size: 1.1rem; font-weight: 600; color: #9CA3AF;">XP</span></span>
                    </div>
                </div>

                {{-- Stat Card 2 --}}
                <div class="stat-card">
                    <span style="position: absolute; top: 1.25rem; right: 1.5rem; font-size: 0.75rem; font-weight: 800; color: #F59E0B;">
                        Master Level
                    </span>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(245, 158, 11, 0.1);
                                display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="flame" style="width: 20px; height: 20px; color: #D97706;"></i>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                        <span style="font-size: 0.65rem; font-weight: 800; color: #9CA3AF; letter-spacing: 0.08em; text-transform: uppercase;">
                            Learning Streak
                        </span>
                        <span style="font-size: 1.75rem; font-weight: 800; color: #D97706;">{{ auth()->user()->streak_days ?? 0 }} <span style="font-size: 1.1rem; font-weight: 600; color: #9CA3AF;">HARI</span></span>
                    </div>
                </div>

                {{-- Stat Card 3 --}}
                <div class="stat-card">
                    <span style="position: absolute; top: 1.25rem; right: 1.5rem; font-size: 0.75rem; font-weight: 800; color: #7B61FF;">
                        Top 5%
                    </span>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(16, 185, 129, 0.1);
                                display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="medal" style="width: 20px; height: 20px; color: #10B981;"></i>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                        <span style="font-size: 0.65rem; font-weight: 800; color: #9CA3AF; letter-spacing: 0.08em; text-transform: uppercase;">
                            Modul Diselesaikan
                        </span>
                        <span style="font-size: 1.75rem; font-weight: 800; color: #10B981;">{{ \App\Models\UserResult::where('user_id', auth()->id())->where('type', 'materi')->count() }} <span style="font-size: 1.1rem; font-weight: 600; color: #9CA3AF;">MODUL</span></span>
                    </div>
                </div>
            </div>

            {{-- Learning Journey Section --}}
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                @php
                    $materiCount = \App\Models\Materi::count();
                    $completedCount = \App\Models\UserResult::where('user_id', auth()->id())->where('type', 'materi')->count();
                    $progressPct = $materiCount > 0 ? round(($completedCount / $materiCount) * 100) : 0;
                @endphp
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <h2 style="font-size: 1.5rem; font-weight: 800; color: #111827; letter-spacing: -0.02em; margin: 0;">Learning Journey</h2>
                    <span style="font-size: 0.75rem; font-weight: 800; background: rgba(123, 97, 255, 0.12); color: #7B61FF;
                                 padding: 0.35rem 0.85rem; border-radius: 9999px; letter-spacing: 0.02em;">
                        {{ $progressPct }}% Overall Progress
                    </span>
                </div>

                {{-- Learning Journey Card --}}
                <div class="card-base" style="padding: 2.25rem; display: flex; flex-direction: column; gap: 2rem;">
                    {{-- Progress Summary --}}
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="font-size: 1.25rem; font-weight: 800; color: #111827; margin: 0;">Nexyra Foundations</h3>
                            <span style="font-size: 0.85rem; font-weight: 700; color: #6B7280;">{{ $completedCount }} / {{ $materiCount }} Topik Diselesaikan</span>
                        </div>
                        {{-- Progress bar --}}
                        <div style="width: 100%; height: 10px; background: #E5E7EB; border-radius: 9999px; overflow: hidden;">
                            <div style="width: {{ $progressPct }}%; height: 100%; background: #7B61FF; border-radius: 9999px;"></div>
                        </div>
                    </div>

                    {{-- Learning Journey Modules Grid --}}
                    <div class="journey-grid">
                        @foreach($recentMateri as $idx => $materi)
                        <div class="journey-card">
                            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; 
                                            background: {{ $idx == 0 ? '#D1FAE5' : 'rgba(123, 97, 255, 0.12)' }};
                                            display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    @if($idx == 0)
                                        <i data-lucide="check" style="width: 16px; height: 16px; color: #10B981; stroke-width: 3;"></i>
                                    @else
                                        <i data-lucide="play" style="width: 16px; height: 16px; color: #7B61FF; fill: #7B61FF;"></i>
                                    @endif
                                </div>
                                <span class="badge-diff {{ $materi->level == 'EASY' ? 'badge-easy' : ($materi->level == 'MEDIUM' ? 'badge-medium' : 'badge-hard') }}">
                                    {{ $materi->level }}
                                </span>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem; flex: 1;">
                                <h4 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin: 0;">{{ $materi->judul }}</h4>
                                <p style="font-size: 0.8rem; color: #6B7280; line-height: 1.6; margin: 0;">
                                    {{ Str::limit($materi->deskripsi, 60) }}
                                </p>
                            </div>
                            <a href="{{ route('materi.detail', $materi->slug) }}" style="font-size: 0.85rem; font-weight: 700; color: #7B61FF; display: inline-flex; align-items: center; gap: 4px; width: fit-content; transition: gap 0.2s;"
                               onmouseover="this.style.gap='8px'" onmouseout="this.style.gap='4px'">
                                {{ $idx == 0 ? 'Review Materi' : ($idx == 1 ? 'Lanjut Belajar' : 'Mulai Belajar') }} <i data-lucide="arrow-right" style="width: 14px; height: 14px;"></i>
                            </a>
                        </div>
                        @endforeach

                        {{-- Solid Cyber-Tip Panel --}}
                        <div class="journey-card" style="background: #7B61FF; border: 1px solid #7B61FF; color: #FFFFFF;">
                            <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(255, 255, 255, 0.2);
                                        display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i data-lucide="lightbulb" style="width: 16px; height: 16px; color: #FFFFFF; fill: rgba(255,255,255,0.1);"></i>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.4rem; flex: 1;">
                                <h4 style="font-size: 1.1rem; font-weight: 800; color: #FFFFFF; margin: 0;">Cyber-Tip</h4>
                                <p style="font-size: 0.775rem; color: rgba(255, 255, 255, 0.85); line-height: 1.55; margin: 0; font-style: italic;">
                                    "Konsistensi adalah kunci. Selesaikan setidaknya satu tantangan mikro setiap hari agar insting keamananmu tetap tajam."
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif

        </div>
    </main>

</div>

{{-- ===== EDIT PROFILE MODAL ===== --}}
<div class="custom-modal-backdrop" id="edit-modal-backdrop">
    <div class="custom-modal">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; border-bottom: 1px solid #E5E7EB; padding-bottom: 1rem;">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: #111827; margin: 0;">Edit Profile</h3>
            <button id="modal-close-x" type="button" style="color: #9CA3AF; cursor: pointer; padding: 0.25rem; display: flex; align-items: center; justify-content: center; border-radius: 0.375rem;"
                    onmouseover="this.style.color='#111827'; this.style.background='#F3F4F6';" onmouseout="this.style.color='#9CA3AF'; this.style.background='none';">
                <i data-lucide="x" style="width: 20px; height: 20px;"></i>
            </button>
        </div>

        <form id="edit-profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.25rem; width: 100%;">
            @csrf
            {{-- Avatar Input --}}
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: #4B5563;">FOTO PROFIL</label>
                <input type="file" id="input-avatar" name="avatar" accept="image/*"
                       style="border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.65rem 1rem; font-size: 0.9rem; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#7B61FF';" onblur="this.style.borderColor='#D1D5DB';">
            </div>

            {{-- Name Input --}}
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: #4B5563;">NAMA LENGKAP</label>
                <input type="text" id="input-name" name="name" required value="{{ auth()->user()->name }}"
                       style="border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.65rem 1rem; font-size: 0.9rem; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#7B61FF';" onblur="this.style.borderColor='#D1D5DB';">
            </div>

            {{-- Email Input --}}
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: #4B5563;">ALAMAT EMAIL</label>
                <input type="email" id="input-email" name="email" required value="{{ auth()->user()->email }}"
                       style="border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.65rem 1rem; font-size: 0.9rem; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#7B61FF';" onblur="this.style.borderColor='#D1D5DB';">
            </div>

            {{-- Bio Input --}}
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: #4B5563;">TENTANG SAYA (BIO)</label>
                <textarea id="input-bio" name="bio" rows="3" required
                          style="border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.65rem 1rem; font-size: 0.9rem; outline: none; font-family: inherit; resize: none; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#7B61FF';" onblur="this.style.borderColor='#D1D5DB';">{{ auth()->user()->bio ?? (auth()->user()->role == 'admin' ? 'Administrator platform Nexyra Learn. Bertanggung jawab atas pengelolaan dan persetujuan materi.' : 'Tertarik pada ethical hacking dan network security. Saat ini sedang mendalami kriptografi dan dasar-dasar penetration testing.') }}</textarea>
            </div>

            {{-- Actions --}}
            <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 0.5rem;">
                <button type="button" id="modal-cancel-btn" class="btn-outline" style="padding: 0.65rem 1.25rem; font-size: 0.875rem;">
                    Batal
                </button>
                <button type="submit" class="btn-fill" style="padding: 0.65rem 1.5rem; font-size: 0.875rem;">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Toast Notification --}}
<div class="custom-toast" id="profile-toast">
    <i id="toast-icon" data-lucide="check-circle" style="width: 18px; height: 18px;"></i>
    <span id="toast-message">Stats copied to clipboard!</span>
</div>

<div id="mobile-sidebar-overlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:25;" onclick="document.getElementById('mobile-drawer-toggle').click();"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // DOM Elements
    const profileName = document.getElementById('profile-name');
    const profileEmail = document.getElementById('profile-email');
    const profileBio = document.getElementById('profile-bio');

    const editBtn = document.getElementById('edit-profile-btn');
    const shareBtn = document.getElementById('share-stats-btn');

    const modalBackdrop = document.getElementById('edit-modal-backdrop');
    const modalCloseX = document.getElementById('modal-close-x');
    const modalCancelBtn = document.getElementById('modal-cancel-btn');
    const editForm = document.getElementById('edit-profile-form');

    const inputName = document.getElementById('input-name');
    const inputEmail = document.getElementById('input-email');
    const inputBio = document.getElementById('input-bio');

    const toast = document.getElementById('profile-toast');
    const toastIcon = document.getElementById('toast-icon');
    const toastMsg = document.getElementById('toast-message');

    // Mobile drawer variables
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

    // Toast Utility function
    function showToast(message, iconName = 'check-circle') {
        toastMsg.innerText = message;
        toastIcon.setAttribute('data-lucide', iconName);
        lucide.createIcons();

        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    // Modal Control Open
    editBtn.addEventListener('click', function () {
        // Pre-fill form inputs with current values
        inputName.value = profileName.innerText.trim();
        inputEmail.value = profileEmail.innerText.trim();
        inputBio.value = profileBio.innerText.trim();

        modalBackdrop.classList.add('show');
    });

    // Close Modal helpers
    function closeModal() {
        modalBackdrop.classList.remove('show');
    }

    modalCloseX.addEventListener('click', closeModal);
    modalCancelBtn.addEventListener('click', closeModal);
    modalBackdrop.addEventListener('click', function (e) {
        if (e.target === modalBackdrop) {
            closeModal();
        }
    });

    @if(session('success'))
        showToast('{{ session('success') }}', 'check-circle');
    @endif
    @if($errors->any())
        showToast('Gagal mengupdate profil. Pastikan data valid.', 'alert-circle');
    @endif

    // Share Stats Action
    shareBtn.addEventListener('click', function () {
        const xp = "{{ number_format(auth()->user()->xp ?? 0) }}";
        const streaks = "{{ auth()->user()->streak_days ?? 0 }}";
        const pct = "{{ $progressPct ?? 0 }}";
        const comp = "{{ $completedCount ?? 0 }}";
        const totalM = "{{ $materiCount ?? 0 }}";

        const statsSummary = `Nexyra Learn Profile - ${profileName.innerText.trim()}\n` +
                             `📧 Email: ${profileEmail.innerText.trim()}\n` +
                             `📈 Experience: ${xp} XP\n` +
                             `🔥 Learning Streak: ${streaks} Days\n` +
                             `🎓 Progress: ${pct}% Overall (${comp}/${totalM} Topics Completed)`;

        navigator.clipboard.writeText(statsSummary).then(function () {
            showToast('Stats copied to clipboard!', 'copy');
        }).catch(function (err) {
            console.error('Failed to copy stats: ', err);
            showToast('Failed to copy stats.', 'x-circle');
        });
    });
});
</script>
@endsection
