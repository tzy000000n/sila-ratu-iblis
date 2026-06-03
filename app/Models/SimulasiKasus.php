<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulasiKasus extends Model
{
    protected $guarded = [];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
