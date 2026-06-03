@extends('layouts.app')

@section('content')
<style>
    .filter-item-hover {
        transition: background-color 0.2s ease, color 0.2s ease;
        padding: 0.5rem;
        margin-left: -0.5rem;
        margin-right: -0.5rem;
        border-radius: 0.375rem;
    }
    .filter-item-hover:hover {
        background-color: #F3F4F6; /* Tailwind gray-100 */
    }
    .filter-item-active {
        background-color: #EEF2FF !important; /* Tailwind indigo-50 */
    }
</style>
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar', ['active' => 'quiz'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        @include('partials.header', ['placeholder' => 'Cari quiz keamanan digital...', 'showSearch' => true])

        <!-- Quiz Content -->
        <div class="p-8 flex-col gap-6">
            <!-- Top Section -->
            <div class="flex justify-between items-end">
                <div>
                    <div class="text-sm font-bold mb-2 flex items-center gap-2">
                        <a href="{{ route('dashboard') }}" class="text-muted" style="text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--muted)'">Dashboard</a> 
                        <i data-lucide="chevron-right" style="width: 14px; height: 14px; color: var(--muted);"></i>
                        <span class="text-primary">Quiz Pembelajaran</span>
                    </div>
                    <h2 class="font-bold" style="font-size: 2.25rem; line-height: 1.2; margin-bottom: 0.5rem;">Eksplorasi Quiz</h2>
                    <p class="text-muted">Uji pengetahuanmu dengan menjawab soal-soal di setiap modul.</p>
                </div>
            </div>
            <div class="flex-col gap-6 mt-4">
                <!-- Top Filters -->
                <form id="filterForm" action="{{ route('quiz') }}" method="GET" class="flex gap-6 w-full" style="align-items: stretch; flex-wrap: wrap;">
                    <!-- Kategori Utama -->
                    <div class="card flex-1" style="padding: 1.25rem; min-width: 250px;">
                        <h3 class="text-xs font-bold text-muted tracking-wider" style="margin-bottom: 0.75rem;">KATEGORI UTAMA</h3>
                        <div class="flex-col gap-3">
                            @php
                                $categories = [
                                    ['name' => 'Keamanan Digital', 'icon' => 'shield'],
                                    ['name' => 'Password', 'icon' => 'key'],
                                    ['name' => 'Phishing', 'icon' => 'fish-symbol'],
                                    ['name' => 'Networking', 'icon' => 'network'],
                                ];
                            @endphp
                            @foreach($categories as $cat)
                            <label class="flex items-center gap-3 cursor-pointer filter-item-hover {{ request('category') == $cat['name'] ? 'filter-item-active text-primary' : 'text-muted' }}">
                                <input type="radio" name="category" value="{{ $cat['name'] }}" class="hidden" style="display:none;" onchange="document.getElementById('filterForm').submit()" {{ request('category') == $cat['name'] ? 'checked' : '' }}>
                                <i data-lucide="{{ $cat['icon'] }}" style="width: 20px; height: 20px; {{ request('category') == $cat['name'] ? 'stroke-width: 2.5; color: var(--primary);' : '' }}"></i>
                                <span style="font-size: 1.05rem; {{ request('category') == $cat['name'] ? 'font-weight: 700; color: var(--primary);' : 'font-weight: 500;' }}">{{ $cat['name'] }}</span>
                            </label>
                            @endforeach
                            @if(request('category'))
                            <a href="{{ route('quiz', array_merge(request()->except('category', 'page'))) }}" class="text-xs font-bold mt-2 block text-center" style="color: #EF4444; padding-top: 0.5rem; border-top: 1px solid #E5E7EB;">Reset Kategori</a>
                            @endif
                        </div>
                    </div>

                    <!-- Tingkat Kesulitan -->
                    <div class="card flex-1" style="padding: 1.25rem; min-width: 250px;">
                        <h3 class="text-xs font-bold text-muted tracking-wider" style="margin-bottom: 0.75rem;">TINGKAT KESULITAN</h3>
                        <div class="flex-col gap-3">
                            <label class="flex items-center gap-3 cursor-pointer filter-item-hover">
                                <input type="checkbox" name="level[]" value="EASY" onchange="document.getElementById('filterForm').submit()" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" style="accent-color: var(--primary);" {{ in_array('EASY', request('level', [])) ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-gray-700">Mudah (Easy)</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer filter-item-hover">
                                <input type="checkbox" name="level[]" value="MEDIUM" onchange="document.getElementById('filterForm').submit()" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" style="accent-color: var(--primary);" {{ in_array('MEDIUM', request('level', [])) ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-gray-700">Menengah (Medium)</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer filter-item-hover">
                                <input type="checkbox" name="level[]" value="HARD" onchange="document.getElementById('filterForm').submit()" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" style="accent-color: var(--primary);" {{ in_array('HARD', request('level', [])) ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-gray-700">Sulit (Hard)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Cyber-Tip -->
                    <div class="card flex-1" style="padding: 1.25rem; background-color: #F5F3FF; border: 1px solid rgba(139, 92, 246, 0.1); min-width: 250px;">
                        <div class="flex items-center gap-2 text-primary font-bold mb-3">
                            <i data-lucide="lightbulb" style="width: 18px; height: 18px;"></i>
                            <span>Cyber-Tip</span>
                        </div>
                        <p class="text-sm leading-relaxed" style="color: #4C1D95; opacity: 0.9;">
                            Gunakan autentikasi dua faktor (2FA) di setiap akun pentingmu untuk lapisan keamanan ekstra!
                        </p>
                    </div>
                </form>

                <!-- Grid / Courses -->
                <div style="width: 100%; margin-top: 1rem;">
                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1.5rem;">
                        
                        @forelse($quizzes as $materi)
                        <!-- Card -->
                        <div class="card p-0 overflow-hidden flex-col" style="border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px -5px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1)'">
                            <div style="height: 140px; background: {{ $materi->level == 'EASY' ? 'linear-gradient(to bottom, #0F172A, #1E293B)' : ($materi->level == 'MEDIUM' ? 'linear-gradient(to bottom, #18181B, #27272A)' : '#DFE7FD') }}; position: relative; display: flex; align-items: center; justify-content: center;">
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: {{ $materi->level == 'EASY' ? 'var(--success-bg)' : ($materi->level == 'MEDIUM' ? 'var(--warning-bg)' : '#FEE2E2') }}; color: {{ $materi->level == 'EASY' ? 'var(--success)' : ($materi->level == 'MEDIUM' ? 'var(--warning)' : '#EF4444') }}; font-size: 0.65rem; font-weight: 800; padding: 0.25rem 0.6rem; border-radius: 9999px; letter-spacing: 0.05em;">{{ $materi->level }}</div>
                                <div style="width: 64px; height: 64px; border-radius: 50%; border: 2px solid {{ $materi->level == 'EASY' ? 'rgba(56, 189, 248, 0.5)' : ($materi->level == 'MEDIUM' ? 'rgba(217, 70, 239, 0.5)' : 'transparent') }}; display: flex; align-items: center; justify-content: center; {{ $materi->level != 'HARD' ? 'box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);' : '' }}">
                                    @php
                                        $icon = 'book';
                                        if($materi->kategori == 'Keamanan Digital') $icon = 'shield';
                                        if($materi->kategori == 'Password') $icon = 'key-round';
                                        if($materi->kategori == 'Phishing') $icon = 'fish-symbol';
                                        if($materi->kategori == 'Networking') $icon = 'network';
                                    @endphp
                                    <i data-lucide="{{ $icon }}" style="width: 32px; height: 32px; color: {{ $materi->level == 'EASY' ? '#38BDF8' : ($materi->level == 'MEDIUM' ? '#D946EF' : '#6366F1') }}; {{ $materi->level == 'HARD' ? 'width: 64px; height: 64px; stroke-width: 2;' : '' }}"></i>
                                </div>
                            </div>
                            <div class="p-5 flex-col flex-1">
                                <h3 class="mb-2 leading-tight" style="font-size: 1.25rem; font-weight: 800; color: #000;">{{ $materi->judul }}</h3>
                                <p class="text-sm mb-6 flex-1 line-clamp-2" style="color: #6B7280; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">{{ $materi->deskripsi }}</p>
                                <a href="{{ route('quiz.take', $materi->slug) }}" class="btn w-full flex items-center justify-center gap-2 mt-auto">
                                    Mulai Quiz <i data-lucide="play-circle" style="width: 18px; height: 18px;"></i>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-12">
                            <i data-lucide="search-x" class="mx-auto mb-4" style="width: 48px; height: 48px; color: #9CA3AF;"></i>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Quiz Tidak Ditemukan</h3>
                            <p class="text-gray-500">Coba ubah filter kategori atau tingkat kesulitan Anda.</p>
                            <a href="{{ route('quiz') }}" class="btn mt-4 inline-flex">Reset Filter</a>
                        </div>
                        @endforelse

                    </div>

                    <!-- Pagination -->
                    @if($quizzes->hasPages())
                    <div class="flex flex-col items-center mt-12 gap-4">
                        <div class="flex gap-2">
                            {{-- Previous Page Link --}}
                            @if ($quizzes->onFirstPage())
                                <button class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-300 bg-gray-50 cursor-not-allowed">
                                    <i data-lucide="chevron-left" style="width: 18px; height: 18px;"></i>
                                </button>
                            @else
                                <a href="{{ $quizzes->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white">
                                    <i data-lucide="chevron-left" style="width: 18px; height: 18px;"></i>
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($quizzes->onEachSide(1)->links()->elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <span class="flex items-center justify-center w-10 h-10 text-gray-500 font-bold">...</span>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $quizzes->currentPage())
                                            <button class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary text-white font-bold">{{ $page }}</button>
                                        @else
                                            <a href="{{ $url }}" class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 bg-white font-medium">{{ $page }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($quizzes->hasMorePages())
                                <a href="{{ $quizzes->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white">
                                    <i data-lucide="chevron-right" style="width: 18px; height: 18px;"></i>
                                </a>
                            @else
                                <button class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-300 bg-gray-50 cursor-not-allowed">
                                    <i data-lucide="chevron-right" style="width: 18px; height: 18px;"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="flex justify-center mt-4">
                        <p class="text-xs font-bold text-muted uppercase" style="letter-spacing: 0.05em;">MENAMPILKAN {{ $quizzes->firstItem() ?? 0 }} - {{ $quizzes->lastItem() ?? 0 }} DARI {{ $quizzes->total() }} QUIZ</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating Chatbot Button -->
    <div style="position: fixed; bottom: 2rem; right: 2rem; width: 56px; height: 56px; border-radius: 50%; background-color: var(--primary); display: flex; justify-content: center; align-items: center; color: white; cursor: pointer; box-shadow: 0 4px 14px 0 rgba(139, 92, 246, 0.39); z-index: 50; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <i data-lucide="bot" style="width: 24px; height: 24px;"></i>
    </div>
</div>
@endsection
