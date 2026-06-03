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
                <h1 style="font-size: 2rem; font-weight: 800; color: #111827; letter-spacing: -0.02em; margin-bottom: 0.5rem;">Bantuan & Dukungan</h1>
                <p style="font-size: 0.95rem; color: #6B7280;">Temukan jawaban untuk pertanyaan umum atau hubungi tim dukungan kami.</p>
            </div>

            <div style="background: #ffffff; border: 1px solid #E5E7EB; border-radius: 1.5rem; padding: 2rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02); display: flex; flex-direction: column; gap: 1.5rem;">
                
                {{-- FAQ Item 1 --}}
                <div style="border-bottom: 1px solid #F3F4F6; padding-bottom: 1.25rem;">
                    <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="help-circle" style="width: 18px; height: 18px; color: #7B61FF;"></i> Bagaimana cara memulai materi?
                    </h3>
                    <p style="font-size: 0.9rem; color: #4B5563; line-height: 1.6; margin-left: 26px;">
                        Anda dapat memulai dengan masuk ke menu "Materi" di sebelah kiri, lalu pilih topik yang ingin dipelajari dan tekan "Mulai Belajar". Ikuti panduan secara berurutan.
                    </p>
                </div>

                {{-- FAQ Item 2 --}}
                <div style="border-bottom: 1px solid #F3F4F6; padding-bottom: 1.25rem;">
                    <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="help-circle" style="width: 18px; height: 18px; color: #7B61FF;"></i> Bagaimana sistem XP bekerja?
                    </h3>
                    <p style="font-size: 0.9rem; color: #4B5563; line-height: 1.6; margin-left: 26px;">
                        Anda akan mendapatkan XP setiap kali menyelesaikan sebuah Materi (+10 XP), Kuis (sesuai skor), atau Lab Simulasi (+50 XP). Kumpulkan XP untuk meningkatkan peringkat Anda di Leaderboard.
                    </p>
                </div>

                {{-- FAQ Item 3 --}}
                <div style="border-bottom: 1px solid #F3F4F6; padding-bottom: 1.25rem;">
                    <h3 style="font-size: 1.1rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="help-circle" style="width: 18px; height: 18px; color: #7B61FF;"></i> Lupa kata sandi?
                    </h3>
                    <p style="font-size: 0.9rem; color: #4B5563; line-height: 1.6; margin-left: 26px;">
                        Jika Anda lupa kata sandi, silakan hubungi Administrator Anda atau gunakan fitur reset sandi di halaman pengaturan akun.
                    </p>
                </div>

                <div style="margin-top: 1rem; padding: 1.5rem; background: rgba(123, 97, 255, 0.05); border: 1px dashed rgba(123, 97, 255, 0.4); border-radius: 1rem; text-align: center;">
                    @if(auth()->user()->role === 'admin')
                        <p style="font-size: 0.95rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">Kotak Masuk Pesan</p>
                        <p style="font-size: 0.85rem; color: #6B7280; margin-bottom: 1rem;">Lihat dan balas pesan yang dikirimkan oleh pengguna platform.</p>
                        <a href="{{ route('admin.pesan') }}" style="background: #7B61FF; color: white; border: none; padding: 0.6rem 1.25rem; border-radius: 0.75rem; font-weight: 700; cursor: pointer; text-decoration: none; display: inline-block;">
                            Lihat Pesan Masuk
                        </a>
                    @else
                        <p style="font-size: 0.95rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">Masih butuh bantuan?</p>
                        <p style="font-size: 0.85rem; color: #6B7280; margin-bottom: 1rem;">Tim administrator kami siap membantu Anda menyelesaikan masalah teknis.</p>
                        <button type="button" onclick="document.getElementById('contact-modal').style.display='flex'" class="btn-fill" style="background: #7B61FF; color: white; border: none; padding: 0.6rem 1.25rem; border-radius: 0.75rem; font-weight: 700; cursor: pointer; text-decoration: none; display: inline-block;">
                            Hubungi Admin
                        </button>
                    @endif
                </div>

            </div>

            <div style="display: flex; justify-content: flex-start; margin-top: 0.5rem;">
                <a href="{{ url()->previous() }}" class="btn btn-outline" style="border-radius: 0.75rem; display: inline-flex; align-items: center; gap: 8px; padding: 0.75rem 1.5rem; text-decoration: none;">
                    <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i> Kembali
                </a>
            </div>

        </div>
    </main>
</div>

{{-- Contact Modal --}}
<div id="contact-modal" style="display: none; position: fixed; inset: 0; background: rgba(17, 24, 39, 0.6); backdrop-filter: blur(4px); z-index: 100; align-items: center; justify-content: center; padding: 1.5rem;">
    <div style="background: #FFFFFF; border-radius: 1.5rem; max-width: 500px; width: 100%; padding: 2.25rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; gap: 1.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; border-bottom: 1px solid #E5E7EB; padding-bottom: 1rem;">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: #111827; margin: 0;">Kirim Pesan ke Admin</h3>
            <button type="button" onclick="document.getElementById('contact-modal').style.display='none'" style="color: #9CA3AF; cursor: pointer; padding: 0.25rem; display: flex; align-items: center; justify-content: center; border-radius: 0.375rem; background: none; border: none;"
                    onmouseover="this.style.color='#111827'; this.style.background='#F3F4F6';" onmouseout="this.style.color='#9CA3AF'; this.style.background='none';">
                <i data-lucide="x" style="width: 20px; height: 20px;"></i>
            </button>
        </div>

        <form action="{{ route('help.contact') }}" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem; width: 100%;">
            @csrf
            {{-- Subject Input --}}
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: #4B5563;">SUBJEK / TOPIK</label>
                <input type="text" name="subject" required placeholder="Contoh: Kesulitan mengakses modul simulasi"
                       style="border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.65rem 1rem; font-size: 0.9rem; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#7B61FF';" onblur="this.style.borderColor='#D1D5DB';">
            </div>

            {{-- Message Input --}}
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: #4B5563;">DETAIL PESAN</label>
                <textarea name="message" rows="4" required placeholder="Jelaskan kendala atau pertanyaan Anda secara detail..."
                          style="border: 1px solid #D1D5DB; border-radius: 0.75rem; padding: 0.65rem 1rem; font-size: 0.9rem; outline: none; font-family: inherit; resize: none; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#7B61FF';" onblur="this.style.borderColor='#D1D5DB';"></textarea>
            </div>

            {{-- Actions --}}
            <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 0.5rem;">
                <button type="button" onclick="document.getElementById('contact-modal').style.display='none'" class="btn-outline" style="padding: 0.65rem 1.25rem; font-size: 0.875rem; border: 1px solid rgba(123, 97, 255, 0.4); color: #7B61FF; background: transparent; border-radius: 0.75rem; font-weight: 700; cursor: pointer;">
                    Batal
                </button>
                <button type="submit" class="btn-fill" style="padding: 0.65rem 1.5rem; font-size: 0.875rem; background: #7B61FF; color: white; border: none; border-radius: 0.75rem; font-weight: 700; cursor: pointer;">
                    Kirim Pesan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Custom Toast for Success --}}
<div id="contact-toast" style="position: fixed; bottom: 2rem; right: 2rem; background: #111827; color: #FFFFFF; padding: 0.85rem 1.5rem; border-radius: 0.75rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); display: flex; align-items: center; gap: 0.5rem; z-index: 150; opacity: 0; visibility: hidden; transform: translateY(1.5rem); transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease, visibility 0.3s ease; font-weight: 600; font-size: 0.9rem;">
    <i data-lucide="check-circle" style="width: 18px; height: 18px; color: #10B981;"></i>
    <span>{{ session('success') }}</span>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('contact-toast');
        toast.style.opacity = '1';
        toast.style.visibility = 'visible';
        toast.style.transform = 'translateY(0)';
        
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.visibility = 'hidden';
            toast.style.transform = 'translateY(1.5rem)';
        }, 4000);
    });
</script>
@endif

@endsection
