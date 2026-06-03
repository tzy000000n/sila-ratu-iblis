<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth.session')->group(function () {
    Route::get('/dashboard', function () {
        $materiLanjut = \App\Models\Materi::where('level', 'EASY')->first();
        return view('dashboard', compact('materiLanjut'));
    })->name('dashboard');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.detail');

    Route::get('/quiz', function (\Illuminate\Http\Request $request) {
        $query = \App\Models\Materi::where('status', 'approved');

        // Filter Kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }

        // Filter Level (bisa array karena checkbox)
        if ($request->has('level') && is_array($request->level)) {
            $query->whereIn('level', $request->level);
        }

        // Pagination
        $quizzes = $query->paginate(5)->withQueryString();

        return view('quiz-list', compact('quizzes'));
    })->name('quiz');

    Route::get('/quiz/{slug}', function (string $slug) {
        $materi = \App\Models\Materi::with('questions')->where('slug', $slug)->firstOrFail();
        return view('quiz-take', compact('materi'));
    })->name('quiz.take');

    // Simulasi
    Route::get('/simulasi', function () {
        $materis = \App\Models\Materi::where('status', 'approved')->get();
        return view('simulasi-list', compact('materis'));
    })->name('simulasi');

    Route::get('/simulasi/{slug}', function ($slug) {
        $materi = \App\Models\Materi::where('slug', $slug)
            ->with('simulasiKasus')
            ->firstOrFail();
            
        return view('simulasi-take', compact('materi'));
    })->name('simulasi.take');

    Route::get('/hasil', function () {
        return view('hasil');
    })->name('hasil');

    Route::get('/rekomendasi', function () {
        $rekomendasiUtama = \App\Models\Materi::where('status', 'approved')->inRandomOrder()->first();
        $rekomendasiList = \App\Models\Materi::where('status', 'approved')->where('id', '!=', $rekomendasiUtama->id)->inRandomOrder()->take(3)->get();
        return view('rekomendasi', compact('rekomendasiUtama', 'rekomendasiList'));
    })->name('rekomendasi');

    Route::get('/password-checker', function () {
        return view('password-checker');
    })->name('password-checker');

    Route::get('/profile', function () {
        $recentMateri = \App\Models\Materi::take(4)->get();
        return view('profile', compact('recentMateri'));
    })->name('profile');

    Route::post('/profile', function (\Illuminate\Http\Request $request) {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/avatars'), $filename);
            
            // Delete old avatar if exists and not default
            if ($user->avatar && file_exists(public_path('uploads/avatars/' . $user->avatar))) {
                unlink(public_path('uploads/avatars/' . $user->avatar));
            }
            
            $user->avatar = $filename;
        }

        $user->save();
        
        return back()->with('success', 'Profile updated successfully!');
    })->name('profile.update');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/notifications', function () {
        return view('notifications');
    })->name('notifications');

    Route::get('/help', function () {
        return view('help');
    })->name('help');

    Route::post('/help/contact', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        \App\Models\ContactMessage::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('success', 'Pesan Anda telah berhasil dikirim ke tim Administrator. Kami akan segera merespons.');
    })->name('help.contact');

    Route::get('/leaderboard', function () {
        $users = \App\Models\User::where('role', 'siswa')->orderByDesc('xp')->get();
        return view('leaderboard', compact('users'));
    })->name('leaderboard');

    Route::post('/api/save-result', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'type' => 'required|in:quiz,simulasi,materi',
            'reference_id' => 'required|string',
            'score' => 'required|integer',
            'max_score' => 'required|integer',
        ]);

        $user = auth()->user();
        $isFirstTime = false;

        $existing = \App\Models\UserResult::where('user_id', $user->id)
            ->where('type', $request->type)
            ->where('reference_id', $request->reference_id)
            ->first();

        if ($existing) {
            if ($request->score > $existing->score) {
                $existing->update([
                    'score' => $request->score,
                    'max_score' => $request->max_score,
                ]);
            }
        } else {
            \App\Models\UserResult::create([
                'user_id' => $user->id,
                'type' => $request->type,
                'reference_id' => $request->reference_id,
                'score' => $request->score,
                'max_score' => $request->max_score,
            ]);
            $isFirstTime = true;
        }

        // Streak logic
        $today = \Carbon\Carbon::today();
        $lastActivity = $user->last_activity_date ? \Carbon\Carbon::parse($user->last_activity_date) : null;

        if (!$lastActivity) {
            $user->streak_days = 1;
        } elseif ($lastActivity->isYesterday()) {
            $user->streak_days += 1;
        } elseif (!$lastActivity->isToday()) {
            $user->streak_days = 1;
        }
        $user->last_activity_date = $today;

        // XP logic
        if ($isFirstTime) {
            $gainedXp = 0;
            if ($request->type === 'materi') {
                $gainedXp = 10;
            } elseif ($request->type === 'simulasi') {
                $gainedXp = 50;
            } elseif ($request->type === 'quiz') {
                $gainedXp = $request->score; // Add quiz score directly as XP
            }
            $user->xp += $gainedXp;
        }

        $user->save();

        return response()->json(['success' => true, 'xp' => $user->xp, 'streak' => $user->streak_days]);
    })->name('save.result');

    // Global Search API
    Route::get('/api/search', function (\Illuminate\Http\Request $request) {
        $q = $request->query('q');
        if (!$q) return response()->json([]);

        $materi = \App\Models\Materi::where('status', 'approved')
            ->where('judul', 'like', '%' . $q . '%')
            ->orWhere('kategori', 'like', '%' . $q . '%')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'judul' => $item->judul,
                    'type' => 'Materi',
                    'url' => route('materi.detail', $item->slug),
                ];
            });

        // For quiz we just use the same materi that have quizzes
        $quiz = \App\Models\Materi::where('status', 'approved')
            ->where('judul', 'like', '%' . $q . '%')
            ->orWhere('kategori', 'like', '%' . $q . '%')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'judul' => 'Quiz: ' . $item->judul,
                    'type' => 'Quiz',
                    'url' => route('quiz.take', $item->slug),
                ];
            });

        // Interleave or just merge
        $results = collect($materi)->merge($quiz)->take(8);
        return response()->json($results);
    })->name('api.search');

    // Global Search Page
    Route::get('/search', function (\Illuminate\Http\Request $request) {
        $q = $request->query('q');
        $materis = \App\Models\Materi::where('status', 'approved')
            ->where(function($query) use ($q) {
                $query->where('judul', 'like', '%' . $q . '%')
                      ->orWhere('kategori', 'like', '%' . $q . '%');
            })->paginate(10);
            
        return view('search-results', compact('materis', 'q'));
    })->name('global.search');
});


// Admin Routes
Route::middleware(['auth.session', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/materi', [\App\Http\Controllers\AdminController::class, 'materi'])->name('materi');
    Route::get('/quiz', [\App\Http\Controllers\AdminController::class, 'quiz'])->name('quiz');
    Route::get('/simulasi', [\App\Http\Controllers\AdminController::class, 'simulasi'])->name('simulasi');
    Route::get('/pengguna', [\App\Http\Controllers\AdminController::class, 'pengguna'])->name('pengguna');
    Route::get('/analytics', [\App\Http\Controllers\AdminController::class, 'analytics'])->name('analytics');
    Route::get('/badge', [\App\Http\Controllers\AdminController::class, 'badge'])->name('badge');
    Route::get('/notifikasi', [\App\Http\Controllers\AdminController::class, 'notifikasi'])->name('notifikasi');
    Route::get('/settings', [\App\Http\Controllers\AdminController::class, 'settings'])->name('settings');

    // CRUD Materi
    Route::post('/materi', [\App\Http\Controllers\AdminController::class, 'storeMateri'])->name('materi.store');
    Route::put('/materi/{id}', [\App\Http\Controllers\AdminController::class, 'updateMateri'])->name('materi.update');
    Route::delete('/materi/{id}', [\App\Http\Controllers\AdminController::class, 'destroyMateri'])->name('materi.destroy');

    // Pesan Masuk
    Route::get('/pesan', [\App\Http\Controllers\AdminController::class, 'pesan'])->name('pesan');
    Route::put('/pesan/{id}/read', [\App\Http\Controllers\AdminController::class, 'markMessageRead'])->name('pesan.read');
    Route::delete('/pesan/{id}', [\App\Http\Controllers\AdminController::class, 'destroyMessage'])->name('pesan.destroy');
});
