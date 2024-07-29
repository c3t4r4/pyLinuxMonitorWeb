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
        $nodes = Node::with('lastlog')->get();

        $logsID = [];
        $disksID = [];

        foreach ($nodes as $node){
            $logsID[] = $node->lastlog->id;
            $disksID[] = $node->lastlog->disk_id;
        }

        $anterior = Carbon::now()->subMinutes(3);

        Log::where('created_at', '<', $anterior)->whereNotIn('id',$logsID)->delete();
        Disk::where('created_at', '<', $anterior)->whereNotIn('id',$disksID)->delete();

    }
}
