<?php

use Illuminate\Support\Facades\DB;

$ids = \App\Models\SimulasiKasus::orderBy('id')->skip(10)->pluck('id');
\App\Models\SimulasiKasus::whereIn('id', $ids)->delete();
echo "Simulasi tersisa: " . \App\Models\SimulasiKasus::count();
