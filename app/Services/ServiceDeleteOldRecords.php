<?php

namespace App\Services;

use App\Models\Disk;
use App\Models\Log;
use Carbon\Carbon;

class ServiceDeleteOldRecords
{
    public static function Remove(): void
    {
        $anterior = Carbon::now()->subMinutes(3);

        Log::where('created_at', '<', $anterior)->delete();
        Disk::where('created_at', '<', $anterior)->delete();

    }
}
