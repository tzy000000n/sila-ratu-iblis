@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh;">

    {{-- ===== LEFT PANEL ===== --}}
    <div style="width:42%; flex-shrink:0; background:linear-gradient(160deg,#7C3AED 0%,#4F46E5 100%);
                padding:2.5rem 3rem; display:flex; flex-direction:column; justify-content:space-between;
                color:#fff; position:relative; overflow:hidden;">

        {{-- decorative circle --}}
        <div style="position:absolute;top:-80px;right:-80px;width:300px;height:300px;
                    border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:absolute;bottom:-60px;left:-60px;width:220px;height:220px;
                    border-radius:50%;background:rgba(255,255,255,0.05);"></div>

        {{-- Logo --}}
        <div style="display:flex;align-items:center;gap:10px;position:relative;z-index:1;">
            <div style="width:34px;height:34px;background:#fff;border-radius:8px;
                        display:flex;align-items:center;justify-content:center;">
                <i data-lucide="shield" style="width:20px;height:20px;color:#7b61ff;"></i>
            </div>
            <span style="font-size:1.15rem;font-weight:800;letter-spacing:-0.3px;">Nexyra Learn</span>
        </div>

        {{-- Illustration + text --}}
        <div style="position:relative;z-index:1;display:flex;flex-direction:column;gap:1.5rem;">
            {{-- Illustration placeholder --}}
            <div style="background:rgba(0,0,0,0.25);border-radius:1.25rem;overflow:hidden;
                        height:260px;display:flex;align-items:center;justify-content:center;">
                <img src="{{ asset('images/cyber_illustration.png') }}" alt="Cyber Illustration"
                     style="width:100%;height:100%;object-fit:cover;"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div style="display:none;flex-direction:column;align-items:center;gap:1rem;padding:2rem;">
                    <i data-lucide="shield-check" style="width:80px;height:80px;color:rgba(255,255,255,0.4);"></i>
                    <p style="font-size:0.8rem;opacity:0.5;text-align:center;">Cybersecurity Illustration</p>
                </div>
            </div>
            <div>
                <p style="font-size:1.2rem;font-weight:800;margin-bottom:0.6rem;">Belajar cerdas, internet aman</p>
                <p style="font-size:0.9rem;line-height:1.7;opacity:0.85;max-width:340px;">
                    Bergabunglah dengan ribuan siswa lainnya untuk menguasai keamanan siber melalui simulasi interaktif yang menyenangkan.
                </p>
            </div>
        </div>

        {{-- Badge --}}
        <div style="position:relative;z-index:1;display:inline-flex;align-items:center;gap:8px;
                    background:rgba(255,255,255,0.15);border-radius:9999px;
                    padding:0.45rem 1rem;width:fit-content;
                    font-size:0.7rem;font-weight:700;letter-spacing:0.08em;">
            <i data-lucide="check-circle" style="width:14px;height:14px;"></i>
            TRUSTED BY 500+ SCHOOLS
        </div>
    </div>

    {{-- ===== RIGHT PANEL ===== --}}
    <div style="flex:1;background:#FAFAFA;display:flex;flex-direction:column;
                align-items:center;justify-content:center;padding:3rem 4rem;position:relative;">

        <div style="width:100%;max-width:420px;">

            {{-- Title --}}
            <div style="margin-bottom:2rem;">
                <p style="font-size:1.4rem;font-weight:800;color:#111827;margin-bottom:6px;">Selamat Datang Kembali</p>
                <p style="font-size:0.9rem;color:#6B7280;">Silakan masuk ke akun Anda untuk melanjutkan belajar.</p>
            </div>

            {{-- Error --}}
            @if(session('error'))
            <div style="background:#FEE2E2;color:#EF4444;padding:0.85rem 1rem;border-radius:0.6rem;
                        margin-bottom:1.25rem;font-size:0.85rem;">
                {{ session('error') }}
            </div>
            @endif

            {{-- Card --}}
            <div style="background:#fff;border:1px solid #E5E7EB;border-radius:1.25rem;
                        padding:2rem;box-shadow:0 4px 24px rgba(0,0,0,0.05);">
                <form action="{{ url('/login') }}" method="POST" style="display:flex;flex-direction:column;gap:1.1rem;">
                    @csrf

                    {{-- Email --}}
                    <div style="display:flex;flex-direction:column;gap:6px;">
                        <label style="font-size:0.7rem;font-weight:700;color:#9CA3AF;letter-spacing:0.1em;">EMAIL</label>
                        <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                    border-radius:0.6rem;padding:0.75rem 0.9rem;
                                    border:1px solid transparent;transition:all 0.2s;"
                             onfocusin="this.style.borderColor='#7b61ff';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(123,97,255,0.1)'"
                             onfocusout="this.style.borderColor='transparent';this.style.background='#F3F4F6';this.style.boxShadow='none'">
                            <i data-lucide="mail" style="width:17px;height:17px;color:#9CA3AF;flex-shrink:0;"></i>
                            <input type="text" name="email" placeholder="nama@sekolah.sch.id" required
                                   style="border:none;background:transparent;outline:none;width:100%;
                                          font-family:inherit;font-size:0.9rem;color:#374151;">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div style="display:flex;flex-direction:column;gap:6px;">
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <label style="font-size:0.7rem;font-weight:700;color:#9CA3AF;letter-spacing:0.1em;">PASSWORD</label>
                            <a href="#" style="font-size:0.8rem;font-weight:600;color:#7b61ff;">Lupa password?</a>
                        </div>
                        <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                    border-radius:0.6rem;padding:0.75rem 0.9rem;
                                    border:1px solid transparent;transition:all 0.2s;"
                             onfocusin="this.style.borderColor='#7b61ff';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(123,97,255,0.1)'"
                             onfocusout="this.style.borderColor='transparent';this.style.background='#F3F4F6';this.style.boxShadow='none'">
                            <i data-lucide="lock" style="width:17px;height:17px;color:#9CA3AF;flex-shrink:0;"></i>
                            <input type="password" name="password" id="pw" placeholder="••••••••" required
                                   style="border:none;background:transparent;outline:none;width:100%;
                                          font-family:inherit;font-size:0.9rem;letter-spacing:0.12em;color:#374151;">
                            <button type="button" onclick="togglePw()"
                                    style="background:none;border:none;cursor:pointer;padding:0;display:flex;">
                                <i data-lucide="eye" id="pw-eye" style="width:17px;height:17px;color:#9CA3AF;"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Remember --}}
                    <div style="display:flex;align-items:center;gap:8px;">
                        <input type="checkbox" id="remember"
                               style="width:15px;height:15px;accent-color:#7b61ff;border-radius:4px;">
                        <label for="remember" style="font-size:0.875rem;color:#6B7280;cursor:pointer;">
                            Ingat saya di perangkat ini
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            style="display:flex;align-items:center;justify-content:center;gap:8px;
                                   width:100%;padding:0.85rem;border-radius:0.6rem;
                                   font-size:0.9rem;font-weight:700;background:#7b61ff;color:#fff;
                                   border:none;cursor:pointer;font-family:inherit;
                                   box-shadow:0 4px 14px rgba(123,97,255,0.35);">
                        Masuk Sekarang
                        <i data-lucide="arrow-right" style="width:17px;height:17px;"></i>
                    </button>

                    {{-- Divider --}}
                    <div style="display:flex;align-items:center;gap:12px;">
                        <div style="flex:1;height:1px;background:#E5E7EB;"></div>
                        <span style="font-size:0.7rem;font-weight:700;color:#9CA3AF;letter-spacing:0.1em;">ATAU</span>
                        <div style="flex:1;height:1px;background:#E5E7EB;"></div>
                    </div>

                    {{-- Google --}}
                    <button type="button"
                            style="display:flex;align-items:center;justify-content:center;gap:10px;
                                   width:100%;padding:0.8rem;border-radius:0.6rem;
                                   font-size:0.875rem;font-weight:600;background:#fff;color:#374151;
                                   border:1px solid #E5E7EB;cursor:pointer;font-family:inherit;">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                             style="width:18px;height:18px;">
                        Masuk dengan Google
                    </button>
                </form>
            </div>

            {{-- Register link --}}
            <p style="text-align:center;font-size:0.875rem;color:#6B7280;margin-top:1.5rem;">
                Belum punya akun?
                <a href="{{ route('register') }}" style="color:#7b61ff;font-weight:700;">Daftar gratis di sini</a>
            </p>
        </div>

        {{-- Footer links --}}
        <div style="position:absolute;bottom:1.5rem;left:0;right:0;
                    display:flex;justify-content:center;gap:1.5rem;">
            <a href="#" style="font-size:0.75rem;color:#9CA3AF;">Kebijakan Privasi</a>
            <span style="font-size:0.75rem;color:#D1D5DB;">•</span>
            <a href="#" style="font-size:0.75rem;color:#9CA3AF;">Ketentuan Layanan</a>
            <span style="font-size:0.75rem;color:#D1D5DB;">•</span>
            <a href="#" style="font-size:0.75rem;color:#9CA3AF;">Bantuan</a>
        </div>
    </div>
</div>

<script>
function togglePw() {
    const input = document.getElementById('pw');
    const icon  = document.getElementById('pw-eye');
    if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
    } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
    }
    lucide.createIcons();
}
</script>
@endsection
