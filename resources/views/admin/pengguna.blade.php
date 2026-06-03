@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'pengguna'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari nama, email, atau role...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title --}}
            <div>
                <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Kelola Pengguna</h1>
                <p style="font-size: 0.95rem; color: #6B7280;">Kelola data siswa dan admin dalam platform.</p>
            </div>

            {{-- Cards --}}
            <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:1.25rem;">
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(123,97,255,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="users" style="width:24px; height:24px; color:#7b61ff;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Total User</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(16,185,129,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="user-check" style="width:24px; height:24px; color:#10B981;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Aktif Hari Ini</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ \App\Models\User::whereDate('last_activity_date', \Carbon\Carbon::today())->count() }}</p>
                    </div>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(245,158,11,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="star" style="width:24px; height:24px; color:#F59E0B;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Siswa Aktif</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ \App\Models\User::where('role', 'siswa')->count() }}</p>
                    </div>
                </div>
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:rgba(59,130,246,0.1); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="trending-up" style="width:24px; height:24px; color:#3B82F6;"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">Rata-rata CR</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ round(\App\Models\UserResult::avg('score') ?? 0) }}%</p>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <table style="width: 100%; border-collapse: collapse; text-align:left;">
                    <thead>
                        <tr style="background:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Pengguna</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Role</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Progress</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Status</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr style="border-bottom:1px solid #F3F4F6;">
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <div style="width:40px; height:40px; border-radius:50%; background:#E5E7EB; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <i data-lucide="user" style="width:20px; height:20px; color:#9CA3AF;"></i>
                                    </div>
                                    <div>
                                        <p style="font-weight:700; color:#111827; font-size:0.95rem;">{{ $user->name }}</p>
                                        <p style="color:#6B7280; font-size:0.8rem;">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                @if($user->role == 'admin')
                                    <span style="background:#FEE2E2; color:#991B1B; padding:0.2rem 0.5rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Admin</span>
                                @else
                                    <span style="background:#F3F4F6; color:#4B5563; padding:0.2rem 0.5rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Siswa</span>
                                @endif
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                @php
                                    $level = 'Beginner';
                                    if ($user->xp > 500) $level = 'Intermediate';
                                    if ($user->xp > 1500) $level = 'Advanced';
                                    if ($user->xp > 3000) $level = 'Expert';
                                @endphp
                                <p style="font-weight:600; color:#111827; font-size:0.85rem;">Level: {{ $level }}</p>
                                <p style="color:#6B7280; font-size:0.75rem; margin-top:2px;">{{ $user->xp ?? 0 }} XP • Streak: {{ $user->streak_days ?? 0 }} Hari</p>
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <span style="background:#D1FAE5; color:#065F46; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Aktif</span>
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; gap:0.5rem;">
                                    <button style="background:none; border:none; color:#3B82F6; cursor:pointer;" onclick="alert('Fitur lihat detail profil pengguna segera hadir.')" title="View Detail"><i data-lucide="eye" style="width:18px; height:18px;"></i></button>
                                    <button style="background:none; border:none; color:#F59E0B; cursor:pointer;" onclick="alert('Fitur ubah role (Admin/Siswa) segera hadir.')" title="Edit Role"><i data-lucide="edit" style="width:18px; height:18px;"></i></button>
                                    <button style="background:none; border:none; color:#EF4444; cursor:pointer;" onclick="if(confirm('Yakin menangguhkan pengguna ini?')) { alert('Pengguna ditangguhkan.'); }" title="Suspend"><i data-lucide="slash" style="width:18px; height:18px;"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="padding:1rem 1.5rem; display:flex; justify-content:space-between; align-items:center; border-top:1px solid #E5E7EB; background:#F9FAFB;">
                    <p style="font-size:0.85rem; color:#6B7280;">Menampilkan {{ $users->firstItem() ?? 0 }} hingga {{ $users->lastItem() ?? 0 }} dari {{ $users->total() }} pengguna</p>
                    <div style="display:flex; gap:0.5rem;">
                        @if ($users->onFirstPage())
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">&laquo; Sebelumnya</span>
                        @else
                            <a href="{{ $users->previousPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">&laquo; Sebelumnya</a>
                        @endif

                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">Selanjutnya &raquo;</a>
                        @else
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">Selanjutnya &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
@endsection
