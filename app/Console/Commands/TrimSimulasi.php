<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SimulasiKasus;

class TrimSimulasi extends Command
{
    protected $signature = 'simulasi:trim';
    protected $description = 'Trim simulasi_kasuses table to 10 records';

    public function handle()
    {
        $keepIds = SimulasiKasus::orderBy('id')->limit(10)->pluck('id');
        $deleted = SimulasiKasus::whereNotIn('id', $keepIds)->delete();
        $this->info("Deleted: {$deleted}. Remaining: " . SimulasiKasus::count());
    }
}
