@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    
    {{-- Sidebar --}}
    @include('partials.sidebar', ['active' => ''])

    {{-- Main Content --}}
    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        
        {{-- Header --}}
        @include('partials.header', ['placeholder' => 'Cari materi atau quiz...', 'showSearch' => true])

        <div style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2rem; max-width: 1100px; width: 100%; margin: 0 auto;">
            
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <h1 style="font-size: 2rem; font-weight: 800; color: #111827; margin: 0; letter-spacing: -0.02em;">Hasil Pencarian</h1>
                <p style="font-size: 0.95rem; color: #6B7280; margin: 0;">
                    Menampilkan hasil untuk kata kunci: <strong style="color: #7B61FF;">"{{ $q }}"</strong>
                </p>
            </div>

            @if($materis->isEmpty())
                <div style="background: white; border: 1px solid #E5E7EB; border-radius: 1.5rem; padding: 4rem 2rem; text-align: center; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.015);">
                    <div style="width: 80px; height: 80px; background: #F3F4F6; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto;">
                        <i data-lucide="search-x" style="width: 40px; height: 40px; color: #9CA3AF;"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem;">Hasil tidak ditemukan</h3>
                    <p style="font-size: 0.95rem; color: #6B7280; max-width: 400px; margin: 0 auto;">
                        Maaf, kami tidak dapat menemukan materi atau quiz yang cocok dengan "<strong>{{ $q }}</strong>". Silakan coba dengan kata kunci lain.
                    </p>
                    <a href="{{ route('dashboard') }}" style="display: inline-block; margin-top: 1.5rem; background: #7B61FF; color: white; padding: 0.75rem 1.5rem; border-radius: 0.75rem; text-decoration: none; font-weight: 600; font-size: 0.9rem;">
                        Kembali ke Dashboard
                    </a>
                </div>
            @else
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                    @foreach($materis as $m)
                        <div style="background: white; border: 1px solid #E5E7EB; border-radius: 1rem; overflow: hidden; display: flex; flex-direction: column; transition: transform 0.2s, box-shadow 0.2s;" 
                             onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.05)'" 
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                             
                            <div style="height: 140px; background: linear-gradient(135deg, #7b61ff, #4F46E5); position: relative; padding: 1.5rem; display: flex; align-items: flex-end;">
                                <span style="position: absolute; top: 1rem; right: 1rem; background: rgba(255,255,255,0.2); backdrop-filter: blur(4px); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; color: white;">
                                    {{ $m->level }}
                                </span>
                                <h3 style="color: white; font-size: 1.25rem; font-weight: 800; margin: 0; line-height: 1.3; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                    {{ $m->judul }}
                                </h3>
                            </div>
                            
                            <div style="padding: 1.5rem; display: flex; flex-direction: column; gap: 1rem; flex: 1;">
                                <p style="font-size: 0.85rem; color: #6B7280; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ Str::limit(strip_tags($m->konten), 120) }}
                                </p>
                                
                                <div style="display: flex; gap: 0.5rem; margin-top: auto; padding-top: 1rem; border-top: 1px solid #F3F4F6;">
                                    <a href="{{ route('materi.detail', $m->slug) }}" style="flex: 1; text-align: center; padding: 0.6rem; background: rgba(123,97,255,0.1); color: #7B61FF; border-radius: 0.5rem; font-size: 0.85rem; font-weight: 700; text-decoration: none;">
                                        Lihat Materi
                                    </a>
                                    <a href="{{ route('quiz.take', $m->slug) }}" style="flex: 1; text-align: center; padding: 0.6rem; background: #FFFBEB; color: #F59E0B; border-radius: 0.5rem; font-size: 0.85rem; font-weight: 700; text-decoration: none;">
                                        Ikuti Quiz
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div style="margin-top: 2rem;">
                    {{ $materis->links() }}
                </div>
            @endif

        </div>
    </main>
</div>
@endsection
