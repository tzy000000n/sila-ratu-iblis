@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar', ['active' => 'materi'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column; padding-bottom:5rem;">
        @include('partials.header', ['placeholder' => 'Cari materi keamanan digital...'])

        <!-- Materi Content -->
        <div class="p-8 flex-col gap-6">
            <!-- Top Section -->
            <div class="flex justify-between items-end">
                <div>
                    <div class="text-sm font-bold mb-2 flex items-center gap-2">
                        <span class="text-muted">Dashboard</span> 
                        <i data-lucide="chevron-right" style="width: 14px; height: 14px; color: var(--muted);"></i>
                        <span class="text-primary">Materi Pembelajaran</span>
                    </div>
                    <h2 class="font-bold" style="font-size: 2.25rem; line-height: 1.2; margin-bottom: 0.5rem;">Eksplorasi Materi</h2>
                    <p class="text-muted">Tingkatkan pertahanan digitalmu dengan kurikulum terstruktur kami.</p>
                </div>
                <button class="btn flex items-center gap-2" style="background-color: rgba(139, 92, 246, 0.1); color: var(--primary); border: 1px solid rgba(139, 92, 246, 0.2);">
                    <i data-lucide="award" style="width: 18px; height: 18px;"></i>
                    Pro Access
                </button>
            </div>

            <div class="flex gap-6 mt-4" style="align-items: flex-start;">
                <!-- Left Sidebar / Filters -->
                <div class="flex-col gap-6" style="width: 250px; flex-shrink: 0;">
                    <!-- Kategori Utama -->
                    <div class="card" style="padding: 1rem;">
                        <h3 class="text-xs font-bold text-muted tracking-wider" style="margin-bottom: 0.75rem;">KATEGORI UTAMA</h3>
                        <div class="flex-col gap-3">
                            <a href="#" class="flex items-center gap-3 font-bold" style="color: #000; transition: transform 0.2s;" onmouseover="this.style.transform='translateX(4px)'" onmouseout="this.style.transform='none'">
                                <i data-lucide="shield" style="width: 20px; height: 20px; stroke-width: 2.5; color: #000;"></i>
                                <span style="font-size: 1.05rem;">Keamanan Digital</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 font-medium text-muted" style="transition: transform 0.2s;" onmouseover="this.style.transform='translateX(4px)'; this.style.color='#000'" onmouseout="this.style.transform='none'; this.style.color=''">
                                <i data-lucide="key" style="width: 20px; height: 20px;"></i>
                                <span style="font-size: 1.05rem;">Password</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 font-medium text-muted" style="transition: transform 0.2s;" onmouseover="this.style.transform='translateX(4px)'; this.style.color='#000'" onmouseout="this.style.transform='none'; this.style.color=''">
                                <i data-lucide="fish-symbol" style="width: 20px; height: 20px;"></i>
                                <span style="font-size: 1.05rem;">Phishing</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 font-medium text-muted" style="transition: transform 0.2s;" onmouseover="this.style.transform='translateX(4px)'; this.style.color='#000'" onmouseout="this.style.transform='none'; this.style.color=''">
                                <i data-lucide="network" style="width: 20px; height: 20px;"></i>
                                <span style="font-size: 1.05rem;">Networking</span>
                            </a>
                        </div>
                    </div>

                    <!-- Tingkat Kesulitan -->
                    <div class="card" style="padding: 1rem;">
                        <h3 class="text-xs font-bold text-muted tracking-wider" style="margin-bottom: 0.75rem;">TINGKAT KESULITAN</h3>
                        <div class="flex-col gap-3">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" style="accent-color: var(--primary);">
                                <span class="text-sm font-medium text-gray-700">Mudah (Easy)</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" style="accent-color: var(--primary);">
                                <span class="text-sm font-medium text-gray-700">Menengah (Medium)</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" style="accent-color: var(--primary);">
                                <span class="text-sm font-medium text-gray-700">Sulit (Hard)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Cyber-Tip -->
                    <div class="card" style="padding: 1.25rem; background-color: #F5F3FF; border: 1px solid rgba(139, 92, 246, 0.1);">
                        <div class="flex items-center gap-2 text-primary font-bold mb-3">
                            <i data-lucide="lightbulb" style="width: 18px; height: 18px;"></i>
                            <span>Cyber-Tip</span>
                        </div>
                        <p class="text-xs leading-relaxed" style="color: #4C1D95; opacity: 0.9;">
                            Gunakan autentikasi dua faktor (2FA) di setiap akun pentingmu untuk lapisan keamanan ekstra!
                        </p>
                    </div>
                </div>

                <!-- Right Grid / Courses -->
                <div style="flex: 1;">
                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1.5rem;">
                        
                        <!-- Card 1 -->
                        <div class="card p-0 overflow-hidden flex-col" style="border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px -5px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1)'">
                            <div style="height: 140px; background: linear-gradient(to bottom, #0F172A, #1E293B); position: relative; display: flex; align-items: center; justify-content: center;">
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: var(--success-bg); color: var(--success); font-size: 0.65rem; font-weight: 800; padding: 0.25rem 0.6rem; border-radius: 9999px; letter-spacing: 0.05em;">EASY</div>
                                <div style="width: 64px; height: 64px; border-radius: 50%; border: 2px solid rgba(56, 189, 248, 0.5); display: flex; align-items: center; justify-content: center; box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);">
                                    <i data-lucide="shield" style="width: 32px; height: 32px; color: #38BDF8;"></i>
                                </div>
                            </div>
                            <div class="p-5 flex-col flex-1">
                                <h3 class="mb-2 leading-tight" style="font-size: 1.25rem; font-weight: 800; color: #000;">Dasar Keamanan Digital</h3>
                                <p class="text-sm mb-6 flex-1 line-clamp-2" style="color: #6B7280; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">Pahami prinsip dasar cara kerja internet dan ancaman cyber umum.</p>
                                <a href="{{ route('materi.detail', 'dasar-keamanan-digital') }}" class="btn w-full flex items-center justify-center gap-2 mt-auto">
                                    Mulai Belajar <i data-lucide="play-circle" style="width: 18px; height: 18px;"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="card p-0 overflow-hidden flex-col" style="border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px -5px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1)'">
                            <div style="height: 140px; background: linear-gradient(to bottom, #18181B, #27272A); position: relative; display: flex; align-items: center; justify-content: center;">
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: var(--warning-bg); color: var(--warning); font-size: 0.65rem; font-weight: 800; padding: 0.25rem 0.6rem; border-radius: 9999px; letter-spacing: 0.05em;">MEDIUM</div>
                                <div style="width: 64px; height: 64px; border-radius: 50%; border: 2px solid rgba(217, 70, 239, 0.5); display: flex; align-items: center; justify-content: center; box-shadow: 0 0 20px rgba(217, 70, 239, 0.3);">
                                    <i data-lucide="key-round" style="width: 32px; height: 32px; color: #D946EF;"></i>
                                </div>
                            </div>
                            <div class="p-5 flex-col flex-1">
                                <h3 class="mb-2 leading-tight" style="font-size: 1.25rem; font-weight: 800; color: #000;">Seni Mengelola Password</h3>
                                <p class="text-sm mb-6 flex-1 line-clamp-2" style="color: #6B7280; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">Belajar membuat password yang kuat dan menggunakan password manager.</p>
                                <a href="{{ route('materi.detail', 'seni-mengelola-password') }}" class="btn w-full flex items-center justify-center gap-2 mt-auto">
                                    Mulai Belajar <i data-lucide="play-circle" style="width: 18px; height: 18px;"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="card p-0 overflow-hidden flex-col" style="border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px -5px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1)'">
                            <div style="height: 150px; background-color: #DFE7FD; position: relative; display: flex; align-items: center; justify-content: center;">
                                <div style="position: absolute; top: 1rem; left: 1rem; background-color: #FEE2E2; color: #EF4444; font-size: 0.7rem; font-weight: 800; padding: 0.25rem 0.75rem; border-radius: 9999px; letter-spacing: 0.05em;">HARD</div>
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <i data-lucide="fish-symbol" style="width: 64px; height: 64px; color: #6366F1; stroke-width: 2;"></i>
                                </div>
                            </div>
                            <div class="p-5 flex-col flex-1">
                                <h3 class="mb-2 leading-tight" style="font-size: 1.4rem; font-weight: 800; color: #000; letter-spacing: -0.02em;">Deteksi Serangan Phishing</h3>
                                <p class="mb-6 flex-1 line-clamp-2" style="font-size: 0.95rem; color: #6B7280; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">Analisis mendalam tentang cara hacker menggunakan rekayasa sosial.</p>
                                <a href="{{ route('materi.detail', 'deteksi-serangan-phishing') }}" class="btn w-full flex items-center justify-center gap-2 mt-auto">
                                    Mulai Belajar <i data-lucide="play-circle" style="width: 18px; height: 18px;"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="card p-0 overflow-hidden flex-col" style="border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px -5px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1)'">
                            <div style="height: 140px; background: linear-gradient(to bottom, #000000, #1F2937); position: relative; display: flex; align-items: center; justify-content: center;">
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: var(--success-bg); color: var(--success); font-size: 0.65rem; font-weight: 800; padding: 0.25rem 0.6rem; border-radius: 9999px; letter-spacing: 0.05em;">EASY</div>
                                <div style="display: flex; gap: 8px;">
                                    <i data-lucide="users" style="width: 40px; height: 40px; color: #10B981;"></i>
                                    <i data-lucide="activity" style="width: 40px; height: 40px; color: #F43F5E;"></i>
                                </div>
                            </div>
                            <div class="p-5 flex-col flex-1">
                                <h3 class="mb-2 leading-tight" style="font-size: 1.25rem; font-weight: 800; color: #000;">Waspada Social Engineering</h3>
                                <p class="text-sm mb-6 flex-1 line-clamp-2" style="color: #6B7280; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">Bukan hanya kode, manusia adalah titik lemah terbesar.</p>
                                <a href="{{ route('materi.detail', 'waspada-social-engineering') }}" class="btn w-full flex items-center justify-center gap-2 mt-auto">
                                    Mulai Belajar <i data-lucide="play-circle" style="width: 18px; height: 18px;"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Card 5 Locked -->
                        <div class="card p-0 overflow-hidden flex-col" style="border: 1px solid var(--border); opacity: 0.85; position: relative; background-color: #F8FAFC;">
                            <div style="height: 140px; background-color: #F1F5F9; position: relative; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #E2E8F0;">
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: #E2E8F0; color: #64748B; font-size: 0.65rem; font-weight: 800; padding: 0.25rem 0.6rem; border-radius: 9999px; letter-spacing: 0.05em;">LOCKED</div>
                                <i data-lucide="lock" style="width: 40px; height: 40px; color: #CBD5E1;"></i>
                            </div>
                            <div class="p-5 flex-col flex-1">
                                <div class="flex items-center gap-1 mb-2">
                                    <i data-lucide="star" style="width: 14px; height: 14px; color: #F59E0B; fill: #F59E0B;"></i>
                                    <span style="font-size: 0.65rem; font-weight: 800; color: #F59E0B; letter-spacing: 0.05em;">PREMIUM CONTENT</span>
                                </div>
                                <h3 class="mb-2 leading-tight" style="font-size: 1.25rem; font-weight: 800; color: #000;">Forensik Digital Lanjutan</h3>
                                <p class="text-sm mb-6 flex-1 line-clamp-2" style="color: #6B7280; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">Pelajari cara melacak jejak digital dan investigasi cyber crime.</p>
                                <button class="btn w-full flex items-center justify-center gap-2 mt-auto" style="background-color: white; border: 1px solid var(--primary); color: var(--primary);">
                                    Upgrade Pro <i data-lucide="zap" style="width: 16px; height: 16px;"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Pagination -->
                    <div class="flex flex-col items-center mt-12 gap-4">
                        <div class="flex gap-2">
                            <button class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white">
                                <i data-lucide="chevron-left" style="width: 18px; height: 18px;"></i>
                            </button>
                            <button class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary text-white font-bold">1</button>
                            <button class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 bg-white font-medium">2</button>
                            <button class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 bg-white font-medium">3</button>
                            <button class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white">
                                <i data-lucide="chevron-right" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                        <p class="text-xs font-bold text-muted" style="letter-spacing: 0.05em;">MENAMPILKAN 5 DARI 48 MATERI</p>
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
