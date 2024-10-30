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
        $disksID = [];

        // Processa os nodes em chunks para evitar consumo excessivo de memória
        Node::with('lastlog')->chunk(100, function ($nodes) use (&$logsID, &$disksID) {
            foreach ($nodes as $node) {
                if ($node->lastlog) {
                    $logsID[] = $node->lastlog->id;
                    $disksID[] = $node->lastlog->disk_id;
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

        // Exclui discos antigos que não estão na lista de disksID em blocos
        Disk::where('created_at', '<', $anterior)
            ->whereNotIn('id', $disksID)
            ->chunk(100, function ($disks) {
                $disks->each->delete(); // Exclusão segura por blocos
            });
    }

    public static function RemoveByNode(Node $node): void
    {
        if(!empty($node)) {
            $ids = $node->logs()->latest()->limit(2)->pluck('id')->toArray();
            if (!empty($ids)) {
                $node->logs()->whereNotIn('id', $ids)->delete();
            }
        }
    }
}
