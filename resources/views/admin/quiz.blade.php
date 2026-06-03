@extends('layouts.app')

@section('content')
<div style="display:flex; min-height:100vh; background:#F9FAFB;">
    @include('partials.sidebar-admin', ['active' => 'quiz'])

    <main style="flex:1; margin-left:260px; display:flex; flex-direction:column;">
        @include('partials.header', ['placeholder' => 'Cari quiz...'])
        
        <div style="padding: 2rem; display:flex; flex-direction:column; gap:1.5rem;">
            
            {{-- Header Title & Action --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem;">Kelola Quiz</h1>
                    <p style="font-size: 0.95rem; color: #6B7280;">Pantau dan buat evaluasi pembelajaran untuk pengguna.</p>
                </div>
                <button style="background:#7b61ff; color:white; border:none; padding:0.75rem 1.5rem; border-radius:0.75rem; font-weight:600; font-size:0.9rem; cursor:pointer; display:flex; align-items:center; gap:0.5rem; box-shadow:0 4px 12px rgba(123,97,255,0.25);" onclick="document.getElementById('modal-quiz').style.display='flex'">
                    <i data-lucide="plus" style="width:18px; height:18px;"></i> Buat Quiz
                </button>
            </div>

            {{-- 4 Cards Statistik --}}
            <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:1.25rem;">
                @php
                $avgScore = round(\App\Models\UserResult::where('type', 'quiz')->avg('score') ?? 0);
                $completionRate = \App\Models\UserResult::where('type', 'quiz')->count() > 0 ? $avgScore . '%' : '0%';
                $totalQuiz = \App\Models\Materi::where('status', 'approved')->count();
                $totalSoal = $totalQuiz * 10; // Asumsi 10 soal per quiz
                $stats = [
                    ['Total Quiz', $totalQuiz, 'file-question', '#F59E0B', 'rgba(245,158,11,0.1)'],
                    ['Total Soal', $totalSoal, 'list-checks', '#10B981', 'rgba(16,185,129,0.1)'],
                    ['Rata-rata Nilai', $avgScore, 'bar-chart', '#7b61ff', 'rgba(123,97,255,0.1)'],
                    ['Completion Rate', $completionRate, 'check-circle', '#3B82F6', 'rgba(59,130,246,0.1)'],
                ];
                @endphp
                @foreach($stats as $s)
                <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; padding:1.25rem; box-shadow:0 2px 10px rgba(0,0,0,0.02); display:flex; align-items:center; gap:1rem;">
                    <div style="width:48px; height:48px; border-radius:0.75rem; background:{{ $s[4] }}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i data-lucide="{{ $s[2] }}" style="width:24px; height:24px; color:{{ $s[3] }};"></i>
                    </div>
                    <div>
                        <p style="font-size:0.8rem; font-weight:600; color:#6B7280; margin-bottom:0.25rem;">{{ $s[0] }}</p>
                        <p style="font-size:1.5rem; font-weight:800; color:#111827;">{{ $s[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Data Table --}}
            <div style="background:white; border:1px solid #E5E7EB; border-radius:1rem; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.02);">
                <table style="width: 100%; border-collapse: collapse; text-align:left;">
                    <thead>
                        <tr style="background:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Nama Quiz</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Kategori</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Jumlah Soal</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Durasi</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Status</th>
                            <th style="padding:1rem 1.5rem; font-weight:600; color:#4B5563; font-size:0.85rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizzes as $q)
                        <tr style="border-bottom:1px solid #F3F4F6;">
                            <td style="padding:1rem 1.5rem; font-weight:700; color:#111827; font-size:0.95rem;">Quiz: {{ $q->judul }}</td>
                            <td style="padding:1rem 1.5rem; color:#4B5563; font-size:0.9rem;">{{ $q->kategori }}</td>
                            <td style="padding:1rem 1.5rem; color:#4B5563; font-size:0.9rem;">0 Soal</td>
                            <td style="padding:1rem 1.5rem; color:#4B5563; font-size:0.9rem;">{{ $q->estimasi_waktu ?? 30 }} Menit</td>
                            <td style="padding:1rem 1.5rem;">
                                @if($q->status == 'approved')
                                    <span style="background:#D1FAE5; color:#065F46; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Aktif</span>
                                @else
                                    <span style="background:#F3F4F6; color:#4B5563; padding:0.3rem 0.6rem; border-radius:0.375rem; font-size:0.75rem; font-weight:700;">Draft</span>
                                @endif
                            </td>
                            <td style="padding:1rem 1.5rem;">
                                <div style="display:flex; gap:0.5rem;">
                                    <button style="background:none; border:none; color:#F59E0B; cursor:pointer;" title="Edit Quiz" onclick="editQuiz()">
                                        <i data-lucide="edit" style="width:18px; height:18px;"></i>
                                    </button>
                                    <button style="background:none; border:none; color:#10B981; cursor:pointer;" title="Kelola Soal" onclick="alert('Fitur Kelola Soal akan diimplementasikan.')">
                                        <i data-lucide="list" style="width:18px; height:18px;"></i>
                                    </button>
                                    <button style="background:none; border:none; color:#EF4444; cursor:pointer;" title="Hapus" onclick="if(confirm('Yakin hapus quiz ini?')) { alert('Quiz dihapus!'); }">
                                        <i data-lucide="trash-2" style="width:18px; height:18px;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="padding:1rem 1.5rem; display:flex; justify-content:space-between; align-items:center; border-top:1px solid #E5E7EB; background:#F9FAFB;">
                    <p style="font-size:0.85rem; color:#6B7280;">Menampilkan {{ $quizzes->firstItem() ?? 0 }} hingga {{ $quizzes->lastItem() ?? 0 }} dari {{ $quizzes->total() }} quiz</p>
                    <div style="display:flex; gap:0.5rem;">
                        @if ($quizzes->onFirstPage())
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">&laquo; Sebelumnya</span>
                        @else
                            <a href="{{ $quizzes->previousPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">&laquo; Sebelumnya</a>
                        @endif

                        @if ($quizzes->hasMorePages())
                            <a href="{{ $quizzes->nextPageUrl() }}" style="padding:0.4rem 0.8rem; background:white; border:1px solid #D1D5DB; color:#4B5563; border-radius:0.5rem; font-size:0.85rem; font-weight:600; text-decoration:none;">Selanjutnya &raquo;</a>
                        @else
                            <span style="padding:0.4rem 0.8rem; background:#E5E7EB; color:#9CA3AF; border-radius:0.5rem; font-size:0.85rem; font-weight:600; cursor:not-allowed;">Selanjutnya &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- Modal Buat Quiz --}}
    <div id="modal-quiz" style="display:none; position:fixed; inset:0; background:rgba(17,24,39,0.5); backdrop-filter:blur(4px); z-index:50; justify-content:center; align-items:center; padding:2rem;">
        <div style="background:white; border-radius:1rem; width:100%; max-width:800px; max-height:90vh; display:flex; flex-direction:column; box-shadow:0 10px 25px rgba(0,0,0,0.1); animation: slideUp 0.3s ease-out forwards;">
            <div style="padding:1.5rem; border-bottom:1px solid #E5E7EB; display:flex; justify-content:space-between; align-items:center;">
                <h2 style="font-size:1.25rem; font-weight:800; color:#111827;">Buat Quiz Baru</h2>
                <button onclick="document.getElementById('modal-quiz').style.display='none'" style="background:none; border:none; cursor:pointer; color:#9CA3AF;">
                    <i data-lucide="x" style="width:24px; height:24px;"></i>
                </button>
            </div>
            <div style="padding:1.5rem; overflow-y:auto; flex:1; display:flex; flex-direction:column; gap:1.5rem;">
                
                {{-- Info Dasar --}}
                <div style="display:flex; flex-direction:column; gap:1rem;">
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Judul Quiz</label>
                        <input type="text" placeholder="Contoh: Quiz Evaluasi Modul 1" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                    </div>
                    <div style="display:flex; gap:1rem;">
                        <div style="flex:1;">
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Kategori</label>
                            <select style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                                <option>Web Security</option>
                                <option>Network Security</option>
                            </select>
                        </div>
                        <div style="flex:1;">
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Durasi (Menit)</label>
                            <input type="number" placeholder="30" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                        </div>
                        <div style="flex:1;">
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Passing Grade</label>
                            <input type="number" placeholder="70" style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem;">
                        </div>
                    </div>
                </div>

                <hr style="border:none; border-top:1px solid #E5E7EB;">

                {{-- Section Soal (Mockup form) --}}
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                        <h3 style="font-size:1.1rem; font-weight:700; color:#111827;">Daftar Soal</h3>
                        <button type="button" style="background:#F3F4F6; color:#4B5563; border:1px solid #E5E7EB; padding:0.4rem 0.8rem; border-radius:0.5rem; font-weight:600; font-size:0.8rem; cursor:pointer; display:flex; align-items:center; gap:0.4rem;">
                            <i data-lucide="plus" style="width:14px; height:14px;"></i> Tambah Soal
                        </button>
                    </div>

                    {{-- Soal Item --}}
                    <div style="background:#F9FAFB; border:1px solid #E5E7EB; border-radius:0.75rem; padding:1.25rem; display:flex; flex-direction:column; gap:1rem;">
                        <div style="display:flex; justify-content:space-between;">
                            <span style="font-size:0.85rem; font-weight:700; color:#7b61ff;">Soal 1</span>
                            <button style="background:none; border:none; color:#EF4444; cursor:pointer;"><i data-lucide="trash-2" style="width:16px; height:16px;"></i></button>
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Pertanyaan</label>
                            <textarea rows="2" placeholder="Tulis pertanyaan di sini..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.75rem;">
                            <div style="display:flex; align-items:center; gap:0.5rem;">
                                <input type="radio" name="correct_1" title="Jawaban Benar">
                                <input type="text" placeholder="Pilihan A" style="flex:1; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.375rem; outline:none; font-size:0.85rem;">
                            </div>
                            <div style="display:flex; align-items:center; gap:0.5rem;">
                                <input type="radio" name="correct_1" title="Jawaban Benar">
                                <input type="text" placeholder="Pilihan B" style="flex:1; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.375rem; outline:none; font-size:0.85rem;">
                            </div>
                            <div style="display:flex; align-items:center; gap:0.5rem;">
                                <input type="radio" name="correct_1" title="Jawaban Benar">
                                <input type="text" placeholder="Pilihan C" style="flex:1; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.375rem; outline:none; font-size:0.85rem;">
                            </div>
                            <div style="display:flex; align-items:center; gap:0.5rem;">
                                <input type="radio" name="correct_1" title="Jawaban Benar">
                                <input type="text" placeholder="Pilihan D" style="flex:1; padding:0.5rem; border:1px solid #E5E7EB; border-radius:0.375rem; outline:none; font-size:0.85rem;">
                            </div>
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.5rem;">Pembahasan</label>
                            <textarea rows="2" placeholder="Penjelasan mengapa jawaban tersebut benar..." style="width:100%; padding:0.75rem; border:1px solid #E5E7EB; border-radius:0.5rem; outline:none; font-family:inherit; font-size:0.9rem; resize:vertical;"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div style="padding:1.5rem; border-top:1px solid #E5E7EB; display:flex; justify-content:flex-end; gap:0.75rem;">
                <button type="button" onclick="document.getElementById('modal-quiz').style.display='none'" style="padding:0.75rem 1.5rem; border:1px solid #E5E7EB; background:white; border-radius:0.5rem; font-weight:600; color:#374151; cursor:pointer;">Batal</button>
                <button type="button" style="padding:0.75rem 1.5rem; border:none; background:#7b61ff; color:white; border-radius:0.5rem; font-weight:600; cursor:pointer;">Simpan Quiz</button>
            </div>
        </div>
    </div>
</div>
<style>
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
<script>
function editQuiz() {
    document.getElementById('modal-quiz').style.display='flex';
}
</script>
@endsection
