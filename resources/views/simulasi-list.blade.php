@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => 'simulasi'])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari virtual lab atau kasus...'])

        {{-- Content Area --}}
        <div style="padding: 2rem; display: flex; flex-direction: column; gap: 2rem;">
            
            {{-- Title & Stats --}}
            <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <h2 style="font-size: 2rem; font-weight: 800; color: #111827; letter-spacing: -0.02em; margin-bottom: 0.5rem;">Virtual Lab Simulasi</h2>
                    <p style="color: #6B7280; font-size: 0.95rem;">Uji naluri detektif Anda dalam menghadapi kasus serangan siber dunia nyata.</p>
                </div>
            </div>

            {{-- Grid of Simulasi --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;">
                
                @foreach($materis as $materi)
                @php
                    // Cek apakah user sudah mengerjakan simulasi ini
                    $isCompleted = \App\Models\UserResult::where('user_id', auth()->id())
                        ->where('type', 'simulasi')
                        ->where('reference_id', $materi->id)
                        ->exists();

                    // Tentukan warna berdasarkan kategori materi
                    $catColor = '#7b61ff'; // default (Keamanan Digital)
                    $catBg = 'rgba(123,97,255,0.1)';
                    if($materi->kategori === 'Password') {
                        $catColor = '#F59E0B';
                        $catBg = 'rgba(245,158,11,0.1)';
                    } elseif($materi->kategori === 'Phishing') {
                        $catColor = '#EF4444';
                        $catBg = 'rgba(239,68,68,0.1)';
                    } elseif($materi->kategori === 'Networking') {
                        $catColor = '#10B981';
                        $catBg = 'rgba(16,185,129,0.1)';
                    }
                @endphp

                <div style="background: #fff; border: 1px solid #E5E7EB; border-radius: 1.25rem; padding: 1.5rem; display: flex; flex-direction: column; transition: all 0.2s; position: relative; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
                    
                    {{-- Status Badge --}}
                    @if($isCompleted)
                    <div style="position: absolute; top: 1.25rem; right: 1.25rem; width: 28px; height: 28px; background: #D1FAE5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="check" style="width: 16px; height: 16px; color: #10B981;"></i>
                    </div>
                    @endif

                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1.25rem;">
                        <div style="width: 48px; height: 48px; border-radius: 1rem; background: {{ $catBg }}; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i data-lucide="play-square" style="width: 24px; height: 24px; color: {{ $catColor }};"></i>
                        </div>
                        <div>
                            <span style="font-size: 0.7rem; font-weight: 800; color: {{ $catColor }}; text-transform: uppercase; letter-spacing: 0.05em;">{{ $materi->kategori }}</span>
                            <h3 style="font-size: 1.05rem; font-weight: 800; color: #111827; margin-top: 2px; line-height: 1.3;">{{ $materi->judul }}</h3>
                        </div>
                    </div>

                    <p style="font-size: 0.85rem; color: #6B7280; line-height: 1.5; margin-bottom: 1.5rem; flex: 1;">
                        Selesaikan skenario peretasan interaktif yang berkaitan erat dengan materi ini.
                    </p>

                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #F3F4F6; padding-top: 1.25rem;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <i data-lucide="award" style="width: 16px; height: 16px; color: #F59E0B;"></i>
                            <span style="font-size: 0.8rem; font-weight: 700; color: #374151;">+50 XP</span>
                        </div>
                        
                        <a href="{{ route('simulasi.take', $materi->slug) }}" style="padding: 0.5rem 1.25rem; background: {{ $isCompleted ? '#F3F4F6' : '#7b61ff' }}; color: {{ $isCompleted ? '#4B5563' : '#fff' }}; font-size: 0.8rem; font-weight: 700; border-radius: 9999px; text-decoration: none; transition: all 0.2s;">
                            {{ $isCompleted ? 'Ulangi Lab' : 'Mulai Lab' }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>
</div>
@endsection
