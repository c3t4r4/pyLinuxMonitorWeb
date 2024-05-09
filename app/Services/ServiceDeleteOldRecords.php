<?php

namespace App\Services;

use App\Models\Disk;
use App\Models\Log;
use Carbon\Carbon;

class ServiceDeleteOldRecords
{
    public static function Remove(): void
    {
        $ontem = Carbon::now()->subDay();

        Log::where('created_at', '<', $ontem)->take(30)->delete();
        Disk::where('created_at', '<', $ontem)->take(30)->delete();

    }
}
