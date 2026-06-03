<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = Materi::where('status', 'approved');

        // Filter Kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }

        // Filter Level (bisa array karena checkbox)
        if ($request->has('level') && is_array($request->level)) {
            $query->whereIn('level', $request->level);
        }

        // Pagination
        $materis = $query->paginate(5)->withQueryString();

        return view('materi', compact('materis'));
    }

    public function show(string $slug)
    {
        $materi = Materi::where('slug', $slug)->where('status', 'approved')->firstOrFail();
        return view('detail-materi', compact('materi'));
    }
}
