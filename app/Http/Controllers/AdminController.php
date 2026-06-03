<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Materi;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUser = \App\Models\User::count();
        $materiAktif = Materi::where('status', 'approved')->count();
        
        $simulasiAktif = \App\Models\SimulasiKasus::count();
        $totalXp = \App\Models\User::sum('xp');
        
        $avgScore = \App\Models\UserResult::whereIn('type', ['quiz', 'simulasi'])->avg('score') ?? 0;
        $completionRate = round($avgScore);
        
        $recentResults = \App\Models\UserResult::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUser', 'materiAktif', 'simulasiAktif', 'totalXp', 'completionRate', 'recentResults'));
    }

    public function materi()
    {
        $materis = Materi::with('author')->paginate(10);
        return view('admin.materi', compact('materis'));
    }

    public function quiz()
    {
        $quizzes = Materi::paginate(10);
        return view('admin.quiz', compact('quizzes'));
    }

    public function simulasi()
    {
        $simulasis = \App\Models\SimulasiKasus::with('materi')->get();
        return view('admin.simulasi', compact('simulasis'));
    }

    public function pengguna()
    {
        $users = \App\Models\User::paginate(10);
        return view('admin.pengguna', compact('users'));
    }

    public function analytics()
    {
        return view('admin.analytics');
    }

    public function badge()
    {
        return view('admin.badge');
    }

    public function notifikasi()
    {
        return view('admin.notifikasi');
    }

    public function pesan()
    {
        $messages = \App\Models\ContactMessage::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pesan', compact('messages'));
    }

    public function markMessageRead($id)
    {
        $msg = \App\Models\ContactMessage::findOrFail($id);
        $msg->update(['is_read' => true]);
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroyMessage($id)
    {
        $msg = \App\Models\ContactMessage::findOrFail($id);
        $msg->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function storeMateri(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:materis,slug',
            'kategori' => 'required|string',
            'level' => 'required|in:EASY,MEDIUM,HARD',
            'konten' => 'required|string',
        ]);

        Materi::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'konten' => $request->konten,
            'deskripsi' => substr(strip_tags($request->konten), 0, 150),
            'status' => 'approved', // Langsung approved tanpa moderasi
            'is_premium' => false,
            'author_id' => auth()->id(),
        ]);

        return redirect()->route('admin.materi')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function updateMateri(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:materis,slug,'.$materi->id,
            'kategori' => 'required|string',
            'level' => 'required|in:EASY,MEDIUM,HARD',
            'konten' => 'required|string',
        ]);

        $materi->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'konten' => $request->konten,
            'deskripsi' => substr(strip_tags($request->konten), 0, 150),
        ]);

        return redirect()->route('admin.materi')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroyMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return redirect()->route('admin.materi')->with('success', 'Materi berhasil dihapus.');
    }
}
