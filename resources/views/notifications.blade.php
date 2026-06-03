@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @if(auth()->user()->role === 'admin')
        @include('partials.sidebar-admin', ['active' => ''])
    @else
        @include('partials.sidebar', ['active' => ''])
    @endif

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari materi atau topik...'])

        {{-- Content Wrapper --}}
        <div style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2rem; max-width: 900px; width: 100%; margin: 0 auto;">
            
            <div style="text-align: left; margin-bottom: 1rem;">
                <h1 style="font-size: 2rem; font-weight: 800; color: #111827; letter-spacing: -0.02em; margin-bottom: 0.5rem;">Notifikasi</h1>
                <p style="font-size: 0.95rem; color: #6B7280;">Lihat semua pembaruan dan pemberitahuan terbaru Anda di sini.</p>
            </div>

            <div style="background: #ffffff; border: 1px solid #E5E7EB; border-radius: 1.5rem; padding: 4rem 2rem; text-align: center; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02); display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1rem;">
                <div style="width: 64px; height: 64px; background: #F3F4F6; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #9CA3AF;">
                    <i data-lucide="bell-off" style="width: 32px; height: 32px;"></i>
                </div>
                <div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Belum ada notifikasi baru</h3>
                    <p style="font-size: 0.9rem; color: #6B7280;">Anda telah membaca semua pesan dan pemberitahuan sistem.</p>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-start; margin-top: 1rem;">
                <a href="{{ url()->previous() }}" class="btn btn-outline" style="border-radius: 0.75rem; display: inline-flex; align-items: center; gap: 8px; padding: 0.75rem 1.5rem; text-decoration: none;">
                    <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i> Kembali
                </a>
            </div>

        </div>
    </main>
</div>
@endsection
