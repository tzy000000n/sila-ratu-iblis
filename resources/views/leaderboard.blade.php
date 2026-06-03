@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => 'dashboard'])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari peserta atau topik...'])

        {{-- Content Wrapper --}}
        <div style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2rem; max-width: 900px; width: 100%; margin: 0 auto;">
            
            <div style="text-align: center;">
                <h1 style="font-size: 2.5rem; font-weight: 800; color: #111827; letter-spacing: -0.03em; margin-bottom: 0.5rem;">Peringkat Lengkap</h1>
                <p style="font-size: 1rem; color: #6B7280;">Daftar lengkap pencapaian pengalaman (XP) seluruh peserta Nexyra Learn.</p>
            </div>

            <div style="background: #ffffff; border: 1px solid #E5E7EB; border-radius: 1.5rem; padding: 2rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);">
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @php
                        $maxLbXp = $users->first() ? max($users->first()->xp, 1) : 1;
                    @endphp

                    @foreach($users as $index => $u)
                        @php
                            $isCurrentUser = $u->id === auth()->id();
                            $color = $isCurrentUser ? '#7b61ff' : '#9CA3AF';
                            $pct = round(($u->xp / $maxLbXp) * 100);
                            $rankColor = '#6B7280';
                            $rankBg = '#F3F4F6';

                            if ($index == 0) {
                                $rankColor = '#D97706';
                                $rankBg = '#FEF3C7';
                            } elseif ($index == 1) {
                                $rankColor = '#4B5563';
                                $rankBg = '#E5E7EB';
                            } elseif ($index == 2) {
                                $rankColor = '#B45309';
                                $rankBg = '#FEF3C7';
                            }

                            // Try to get avatar
                            $nameLower = strtolower($u->name);
                            $isFemale = in_array($nameLower, ['naysilla', 'rusyda', 'alicia', 'salsa']);
                            $genderPath = $isFemale ? 'girl' : 'boy';
                            $avatarUrl = $u->avatar ? asset('uploads/avatars/' . $u->avatar) : "https://avatar.iran.liara.run/public/{$genderPath}?username=" . urlencode($u->name);
                        @endphp
                        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; border-radius: 1rem; {{ $isCurrentUser ? 'background: rgba(123, 97, 255, 0.05); border: 1px solid rgba(123, 97, 255, 0.2);' : 'background: #F9FAFB; border: 1px solid transparent;' }}">
                            
                            {{-- Rank --}}
                            <div style="width: 40px; height: 40px; border-radius: 50%; background: {{ $rankBg }}; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <span style="font-size: 1rem; font-weight: 800; color: {{ $rankColor }};">{{ $index + 1 }}</span>
                            </div>

                            {{-- Avatar --}}
                            <img src="{{ $avatarUrl }}" alt="{{ $u->name }} avatar" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid {{ $isCurrentUser ? '#7b61ff' : '#E5E7EB' }};">

                            {{-- Details --}}
                            <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                                    <span style="font-size: 1.05rem; font-weight: 800; color: #111827;">
                                        {{ $u->name }}
                                        @if($isCurrentUser)
                                            <span style="font-size: 0.75rem; color: #7b61ff; font-weight: 700; background: rgba(123, 97, 255, 0.1); padding: 2px 8px; border-radius: 999px; margin-left: 8px;">Kamu</span>
                                        @endif
                                    </span>
                                    <span style="font-size: 0.95rem; font-weight: 800; color: {{ $isCurrentUser ? '#7b61ff' : '#4B5563' }};">
                                        {{ number_format($u->xp) }} <span style="font-size: 0.75rem; color: #9CA3AF;">XP</span>
                                    </span>
                                </div>
                                <div style="background: #E5E7EB; border-radius: 9999px; height: 6px; width: 100%;">
                                    <div style="background: {{ $isCurrentUser ? '#7b61ff' : '#9CA3AF' }}; height: 6px; border-radius: 9999px; width: {{ $pct }}%;"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="display: flex; justify-content: center; margin-top: 1rem;">
                <a href="{{ route('dashboard') }}" class="btn btn-outline" style="border-radius: 0.75rem; display: inline-flex; align-items: center; gap: 8px; padding: 0.75rem 1.5rem; text-decoration: none;">
                    <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i> Kembali ke Dashboard
                </a>
            </div>

        </div>
    </main>
</div>
@endsection
