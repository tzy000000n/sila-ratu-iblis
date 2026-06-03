<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'level',
        'kategori',
        'konten',
        'is_premium',
        'status',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function simulasiKasus()
    {
        return $this->hasOne(SimulasiKasus::class);
    }
}
