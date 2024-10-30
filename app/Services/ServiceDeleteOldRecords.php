<?php

namespace App\Services;

use App\Models\Disk;
use App\Models\Log;
use App\Models\Node;
use Carbon\Carbon;

class ServiceDeleteOldRecords
{
    public static function Remove(): void
    {
        $logsID = [];

        // Processa os nodes em chunks para evitar consumo excessivo de memória
        Node::with('lastlog')->chunk(100, function ($nodes) use (&$logsID) {
            foreach ($nodes as $node) {
                if ($node->lastlog) {
                    $logsID[] = $node->lastlog->id;
                }
            }
        });

        $anterior = Carbon::now()->subMinutes(3);

        // Exclui logs antigos que não estão na lista de logsID em blocos
        Log::where('created_at', '<', $anterior)
            ->whereNotIn('id', $logsID)
            ->chunk(100, function ($logs) {
                $logs->each->delete(); // Exclusão segura por blocos
            });
    }
}
