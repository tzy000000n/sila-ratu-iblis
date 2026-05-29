@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh;">

    {{-- ===== LEFT PANEL ===== --}}
    <div style="width:42%; flex-shrink:0; background:linear-gradient(160deg,#7C3AED 0%,#4F46E5 100%);
                padding:2.5rem 3rem; display:flex; flex-direction:column; justify-content:space-between;
                color:#fff; position:relative; overflow:hidden;">

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

        {{-- Main text --}}
        <div style="position:relative;z-index:1;display:flex;flex-direction:column;gap:1rem;">
            <h1 style="font-size:2.4rem;font-weight:800;line-height:1.15;letter-spacing:-0.02em;">
                Mulai Petualangan<br>Cyber Kamu.
            </h1>
            <p style="font-size:0.9rem;line-height:1.75;opacity:0.85;max-width:320px;">
                Belajar keamanan siber jadi lebih seru dan mudah dipahami dengan kurikulum yang dirancang khusus untuk generasi masa depan.
            </p>

            {{-- Cyber tip box --}}
            <div style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);
                        border-radius:1rem;padding:1.25rem;margin-top:0.5rem;">
                <div style="display:flex;align-items:center;gap:6px;
                            font-size:0.65rem;font-weight:800;letter-spacing:0.1em;
                            opacity:0.75;margin-bottom:0.65rem;">
                    <i data-lucide="zap" style="width:13px;height:13px;"></i> CYBER-TIP
                </div>
                <p style="font-size:0.875rem;line-height:1.65;opacity:0.9;">
                    "Gunakan minimal 12 karakter dengan kombinasi simbol dan angka untuk membuat password yang sulit ditembus."
                </p>
            </div>
        </div>

        {{-- Bottom badge --}}
        <div style="position:relative;z-index:1;display:flex;align-items:center;gap:10px;">
            <div style="display:flex;">
                <div style="width:28px;height:28px;border-radius:50%;background:#A78BFA;border:2px solid #fff;
                            display:flex;align-items:center;justify-content:center;font-size:0.6rem;font-weight:700;">A</div>
                <div style="width:28px;height:28px;border-radius:50%;background:#60A5FA;border:2px solid #fff;
                            margin-left:-8px;display:flex;align-items:center;justify-content:center;font-size:0.6rem;font-weight:700;">B</div>
                <div style="width:28px;height:28px;border-radius:50%;background:#34D399;border:2px solid #fff;
                            margin-left:-8px;display:flex;align-items:center;justify-content:center;font-size:0.6rem;font-weight:700;">C</div>
            </div>
            <p style="font-size:0.82rem;opacity:0.85;">Bergabung dengan <strong>5,000+</strong> pelajar lainnya</p>
        </div>
    </div>

    {{-- ===== RIGHT PANEL ===== --}}
    <div style="flex:1;background:#FAFAFA;display:flex;flex-direction:column;
                align-items:center;justify-content:center;padding:3rem 4rem;overflow-y:auto;">

        <div style="width:100%;max-width:460px;">

            {{-- Title --}}
            <div style="margin-bottom:1.75rem;">
                <p style="font-size:1.6rem;font-weight:800;color:#111827;margin-bottom:6px;">Buat Akun Baru</p>
                <p style="font-size:0.9rem;color:#6B7280;">Lengkapi data diri kamu untuk mulai belajar.</p>
            </div>

            {{-- Error --}}
            @if(session('error'))
            <div style="background:#FEE2E2;color:#EF4444;padding:0.85rem 1rem;border-radius:0.6rem;
                        margin-bottom:1.25rem;font-size:0.85rem;">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST"
                  style="display:flex;flex-direction:column;gap:1.1rem;">
                @csrf

                {{-- Nama --}}
                <div style="display:flex;flex-direction:column;gap:6px;">
                    <label style="font-size:0.875rem;font-weight:600;color:#374151;">Nama Lengkap</label>
                    <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                border-radius:0.6rem;padding:0.75rem 0.9rem;
                                border:1px solid transparent;transition:all 0.2s;"
                         onfocusin="this.style.borderColor='#7b61ff';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(123,97,255,0.1)'"
                         onfocusout="this.style.borderColor='transparent';this.style.background='#F3F4F6';this.style.boxShadow='none'">
                        <i data-lucide="user" style="width:17px;height:17px;color:#9CA3AF;flex-shrink:0;"></i>
                        <input type="text" name="name" placeholder="Masukkan nama lengkap kamu" required
                               style="border:none;background:transparent;outline:none;width:100%;
                                      font-family:inherit;font-size:0.9rem;color:#374151;">
                    </div>
                </div>

                {{-- Email --}}
                <div style="display:flex;flex-direction:column;gap:6px;">
                    <label style="font-size:0.875rem;font-weight:600;color:#374151;">Email</label>
                    <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                border-radius:0.6rem;padding:0.75rem 0.9rem;
                                border:1px solid transparent;transition:all 0.2s;"
                         onfocusin="this.style.borderColor='#7b61ff';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(123,97,255,0.1)'"
                         onfocusout="this.style.borderColor='transparent';this.style.background='#F3F4F6';this.style.boxShadow='none'">
                        <i data-lucide="mail" style="width:17px;height:17px;color:#9CA3AF;flex-shrink:0;"></i>
                        <input type="email" name="email" placeholder="example@email.com" required
                               style="border:none;background:transparent;outline:none;width:100%;
                                      font-family:inherit;font-size:0.9rem;color:#374151;">
                    </div>
                </div>

                {{-- Password row --}}
                <div style="display:flex;gap:1rem;">
                    <div style="flex:1;display:flex;flex-direction:column;gap:6px;">
                        <label style="font-size:0.875rem;font-weight:600;color:#374151;">Password</label>
                        <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                    border-radius:0.6rem;padding:0.75rem 0.9rem;
                                    border:1px solid transparent;transition:all 0.2s;"
                             onfocusin="this.style.borderColor='#7b61ff';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(123,97,255,0.1)'"
                             onfocusout="this.style.borderColor='transparent';this.style.background='#F3F4F6';this.style.boxShadow='none'">
                            <i data-lucide="lock" style="width:17px;height:17px;color:#9CA3AF;flex-shrink:0;"></i>
                            <input type="password" name="password" placeholder="••••••••" required
                                   style="border:none;background:transparent;outline:none;width:100%;
                                          font-family:inherit;font-size:0.9rem;letter-spacing:0.12em;color:#374151;">
                        </div>
                    </div>
                    <div style="flex:1;display:flex;flex-direction:column;gap:6px;">
                        <label style="font-size:0.875rem;font-weight:600;color:#374151;">Konfirmasi Password</label>
                        <div style="display:flex;align-items:center;gap:10px;background:#F3F4F6;
                                    border-radius:0.6rem;padding:0.75rem 0.9rem;
                                    border:1px solid transparent;transition:all 0.2s;"
                             onfocusin="this.style.borderColor='#7b61ff';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(123,97,255,0.1)'"
                             onfocusout="this.style.borderColor='transparent';this.style.background='#F3F4F6';this.style.boxShadow='none'">
                            <i data-lucide="shield-check" style="width:17px;height:17px;color:#9CA3AF;flex-shrink:0;"></i>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required
                                   style="border:none;background:transparent;outline:none;width:100%;
                                          font-family:inherit;font-size:0.9rem;letter-spacing:0.12em;color:#374151;">
                        </div>
                    </div>
                </div>

                {{-- Terms --}}
                <div style="display:flex;align-items:flex-start;gap:10px;">
                    <input type="checkbox" id="terms" required
                           style="width:15px;height:15px;accent-color:#7b61ff;margin-top:2px;flex-shrink:0;">
                    <label for="terms" style="font-size:0.875rem;color:#6B7280;line-height:1.55;cursor:pointer;">
                        Saya setuju dengan
                        <a href="#" style="color:#7b61ff;font-weight:700;">Syarat & Ketentuan</a> serta
                        <a href="#" style="color:#7b61ff;font-weight:700;">Kebijakan Privasi</a> yang berlaku.
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        style="display:flex;align-items:center;justify-content:center;
                               width:100%;padding:0.875rem;border-radius:0.6rem;
                               font-size:0.9rem;font-weight:700;background:#7b61ff;color:#fff;
                               border:none;cursor:pointer;font-family:inherit;
                               box-shadow:0 4px 14px rgba(123,97,255,0.35);">
                    Daftar Sekarang
                </button>
            </form>

            {{-- Login link --}}
            <p style="text-align:center;font-size:0.875rem;color:#6B7280;margin-top:1.25rem;">
                Sudah punya akun?
                <a href="{{ route('login') }}" style="color:#7b61ff;font-weight:700;">Masuk di sini</a>
            </p>

            {{-- Divider --}}
            <div style="display:flex;align-items:center;gap:12px;margin:1.25rem 0;">
                <div style="flex:1;height:1px;background:#E5E7EB;"></div>
                <span style="font-size:0.7rem;font-weight:700;color:#9CA3AF;letter-spacing:0.1em;">ATAU DAFTAR DENGAN</span>
                <div style="flex:1;height:1px;background:#E5E7EB;"></div>
            </div>

            {{-- Social --}}
            <div style="display:flex;gap:0.85rem;">
                <button type="button"
                        style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;
                               padding:0.75rem;border-radius:0.6rem;font-size:0.875rem;font-weight:600;
                               background:#fff;color:#374151;border:1px solid #E5E7EB;
                               cursor:pointer;font-family:inherit;">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                         style="width:18px;height:18px;"> Google
                </button>
                <button type="button"
                        style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;
                               padding:0.75rem;border-radius:0.6rem;font-size:0.875rem;font-weight:600;
                               background:#fff;color:#374151;border:1px solid #E5E7EB;
                               cursor:pointer;font-family:inherit;">
                    <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook"
                         style="width:18px;height:18px;"> Facebook
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
