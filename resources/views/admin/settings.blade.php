@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'settings'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari pengaturan...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title --}}
            <div>
                <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Pengaturan Sistem</h1>
                <p style="font-size: 0.95rem; color: #6B7280;">Konfigurasi platform, integrasi, dan kebijakan keamanan.</p>
            </div>

            <style>
                .setting-tab {
                    padding: 0.75rem 1rem; color: #4B5563; border-radius: 0.5rem; font-weight: 500; font-size: 0.9rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;
                    transition: background 0.2s, color 0.2s; cursor: pointer;
                }
                .setting-tab:hover {
                    background: #F3F4F6;
                }
                .setting-tab.active {
                    background: rgba(123,97,255,0.1);
                    color: #7b61ff;
                    font-weight: 600;
                }
                .setting-tab.danger:hover {
                    background: #FEE2E2;
                }
                .setting-tab.danger.active {
                    background: #FEF2F2;
                    color: #EF4444;
                    border: 1px solid #FCA5A5;
                }
                .setting-content {
                    display: none;
                }
                .setting-content.active {
                    display: block;
                    animation: fadeIn 0.3s ease-in-out;
                }
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .toggle-slider:before {
                    position: absolute;
                    content: "";
                    height: 20px;
                    width: 20px;
                    left: 4px;
                    bottom: 4px;
                    background-color: white;
                    transition: .4s;
                    border-radius: 50%;
                }
            </style>

            <div style="display:flex; gap:1.5rem; align-items:flex-start;">
                {{-- Sidebar Settings --}}
                <div style="width:250px; flex-shrink:0; background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1rem; box-shadow:0 2px 10px rgba(0,0,0,0.02); display:flex; flex-direction:column; gap:0.25rem;">
                    <a onclick="switchTab('identitas')" id="link-identitas" class="setting-tab active">
                        <i data-lucide="layout" style="width:18px; height:18px;"></i> Identitas Platform
                    </a>
                    <a onclick="switchTab('smtp')" id="link-smtp" class="setting-tab">
                        <i data-lucide="mail" style="width:18px; height:18px;"></i> SMTP Email
                    </a>
                    <a onclick="switchTab('ai')" id="link-ai" class="setting-tab">
                        <i data-lucide="bot" style="width:18px; height:18px;"></i> Integrasi AI
                    </a>
                    <a onclick="switchTab('password')" id="link-password" class="setting-tab">
                        <i data-lucide="shield" style="width:18px; height:18px;"></i> Kebijakan Sandi
                    </a>
                    <a onclick="switchTab('maintenance')" id="link-maintenance" class="setting-tab danger" style="margin-top:1rem; border-top:1px solid #E5E7EB; padding-top:1rem; color:#EF4444;">
                        <i data-lucide="power" style="width:18px; height:18px;"></i> Mode Pemeliharaan
                    </a>
                </div>

                {{-- Content Area --}}
                <div style="flex:1; background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.02); min-height: 400px;">
                    
                    {{-- Tab 1: Identitas --}}
                    <div id="tab-identitas" class="setting-content active">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid #E5E7EB;">Identitas Platform</h3>
                        <div style="display:flex; flex-direction:column; gap:1.25rem; max-width:600px;">
                            <div>
                                <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Nama Platform</label>
                                <input type="text" value="Nexyra Learn - Cybersecurity Lab" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Deskripsi Singkat</label>
                                <textarea rows="3" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;">Platform edukasi interaktif untuk mempelajari keamanan siber secara komprehensif.</textarea>
                            </div>
                            <div>
                                <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Logo Platform</label>
                                <div style="display:flex; gap:1rem; align-items:center;">
                                    <div style="width:60px; height:60px; background:#F9FAFB; border:1px solid #E5E7EB; border-radius:0.5rem; display:flex; align-items:center; justify-content:center;">
                                        <i data-lucide="shield" style="width:28px; height:28px; color:#7b61ff;"></i>
                                    </div>
                                    <div>
                                        <button style="background:white; border:1px solid #E5E7EB; padding:0.5rem 1rem; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer;">Ganti Logo</button>
                                        <p style="font-size:0.75rem; color:#9CA3AF; margin-top:0.25rem;">Format SVG atau PNG disarankan.</p>
                                    </div>
                                </div>
                            </div>
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                                <div>
                                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Warna Aksen Utama</label>
                                    <div style="display:flex; align-items:center; gap:0.5rem;">
                                        <div style="width:36px; height:36px; border-radius:0.375rem; background:#7b61ff; border:1px solid #E5E7EB;"></div>
                                        <input type="text" value="#7b61ff" style="flex:1; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                                    </div>
                                </div>
                                <div>
                                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Mode Tema Default</label>
                                    <select style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                                        <option>Mode Terang</option>
                                        <option>Mode Gelap</option>
                                        <option>Default Sistem</option>
                                    </select>
                                </div>
                            </div>
                            <div style="margin-top:1rem; padding-top:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end;">
                                <button style="background:#7b61ff; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.5rem; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(123,97,255,0.25);">Simpan Pengaturan</button>
                            </div>
                        </div>
                    </div>

                    {{-- Tab 2: SMTP --}}
                    <div id="tab-smtp" class="setting-content">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid #E5E7EB;">SMTP Email</h3>
                        <div style="padding: 2rem; text-align:center; color:#6B7280; font-size:0.9rem; display: flex; flex-direction: column; align-items: center;">
                            <i data-lucide="mail" style="width:48px;height:48px;margin-bottom:1rem;opacity:0.5;"></i>
                            <p>Pengaturan SMTP Email belum dikonfigurasi.</p>
                            <button style="margin-top:1rem; background:#7b61ff; color:white; border:none; padding:0.5rem 1rem; border-radius:0.5rem; cursor:pointer;">Konfigurasi SMTP</button>
                        </div>
                    </div>

                    {{-- Tab 3: AI --}}
                    <div id="tab-ai" class="setting-content">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid #E5E7EB;">Integrasi AI</h3>
                        <div style="padding: 2rem; text-align:center; color:#6B7280; font-size:0.9rem; display: flex; flex-direction: column; align-items: center;">
                            <i data-lucide="bot" style="width:48px;height:48px;margin-bottom:1rem;opacity:0.5;"></i>
                            <p>Fitur Integrasi AI masih dalam tahap pengembangan (Segera Hadir).</p>
                        </div>
                    </div>

                    {{-- Tab 4: Password Policy --}}
                    <div id="tab-password" class="setting-content">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid #E5E7EB;">Kebijakan Sandi</h3>
                        <div style="display:flex; flex-direction:column; gap:1.25rem; max-width:600px;">
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div>
                                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #374151; margin: 0 0 0.25rem 0;">Wajibkan Karakter Khusus</h4>
                                    <p style="font-size: 0.85rem; color: #6B7280; margin: 0;">Password harus mengandung setidaknya 1 simbol (!@#$%).</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 28px;">
                                    <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #7B61FF; transition: .4s; border-radius: 34px;" class="toggle-slider"></span>
                                </label>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div>
                                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #374151; margin: 0 0 0.25rem 0;">Panjang Minimal</h4>
                                    <p style="font-size: 0.85rem; color: #6B7280; margin: 0;">Minimal karakter untuk membuat password baru.</p>
                                </div>
                                <input type="number" value="8" style="width:80px; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; text-align:center;">
                            </div>
                            <div style="margin-top:1rem; padding-top:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end;">
                                <button style="background:#7b61ff; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.5rem; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(123,97,255,0.25);">Simpan Kebijakan</button>
                            </div>
                        </div>
                    </div>

                    {{-- Tab 5: Maintenance Mode --}}
                    <div id="tab-maintenance" class="setting-content">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#EF4444; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid #E5E7EB;">Mode Pemeliharaan</h3>
                        <div style="background:#FEF2F2; border:1px solid #FCA5A5; padding:1.5rem; border-radius:0.75rem; color:#991B1B;">
                            <h4 style="font-size:1rem; font-weight:800; margin-bottom:0.5rem; display: flex; align-items: center; gap: 8px;">
                                <i data-lucide="alert-triangle" style="width: 18px; height: 18px;"></i> Peringatan Bahaya
                            </h4>
                            <p style="font-size:0.85rem; line-height:1.5; margin-bottom:1rem;">Mengaktifkan Mode Pemeliharaan akan mencegah seluruh pengguna untuk masuk ke dalam sistem. Hanya Administrator yang dapat mengakses panel ini.</p>
                            <button style="background:#EF4444; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.5rem; font-weight:600; cursor:pointer;">Aktifkan Mode Pemeliharaan</button>
                        </div>
                    </div>

                </div>
            </div>

            <script>
                function switchTab(tabId) {
                    // Hide all contents
                    document.querySelectorAll('.setting-content').forEach(el => el.classList.remove('active'));
                    // Remove active class from all tabs
                    document.querySelectorAll('.setting-tab').forEach(el => el.classList.remove('active'));
                    
                    // Show selected content
                    document.getElementById('tab-' + tabId).classList.add('active');
                    // Set active class on clicked link
                    document.getElementById('link-' + tabId).classList.add('active');
                    
                    // Re-render lucide icons if there are new ones shown (not strictly required if already rendered, but good practice)
                    if (window.lucide) {
                        lucide.createIcons();
                    }
                }
            </script>

        </div>
    </main>
</div>
@endsection
