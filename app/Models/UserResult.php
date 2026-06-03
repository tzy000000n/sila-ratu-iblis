<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserResult extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'reference_id',
        'score',
        'max_score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
