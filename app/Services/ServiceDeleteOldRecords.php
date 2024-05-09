<?php

namespace App\Services;

use App\Models\Log;
use Carbon\Carbon;

class ServiceDeleteOldRecords
{
    public static function Remove(): void
    {
        $ontem = Carbon::now()->subDay();
        $logs = Log::where('created_at', '<', $ontem)->take(20)->get();

        foreach ($logs as $log) {
            $log->delete();
        }
    }
}
