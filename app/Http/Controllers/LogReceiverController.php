<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteOldLogsByNode;
use App\Models\Disk;
use App\Models\Log;
use Illuminate\Http\Request;
use Throwable;

class LogReceiverController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $log = new Log();
        $log->fill($request->all());

        if (!$log->save()) {
            return response()
                ->json("Registro não criado!", 400);
        }

        if(!empty($request->disks) && count($request->disks) > 0){
            foreach ($request->disks as $disk){
                $nDisk = new Disk();
                $nDisk->disk = $disk['disk'];
                $nDisk->percent_usage = $disk['usage_percent'];
                $nDisk->usage = $disk['used_gb'];
                $nDisk->total = $disk['total_gb'];
                $nDisk->log_id = $log->id;
                $nDisk->save();
            }
        }

        try {
            DeleteOldLogsByNode::dispatch($log->node_id);
        } catch (Throwable $e) {
            Log::error('Erro ao deletar registros antigos on LogReceiverController: ' . $e->getMessage());
        }


        return response()->json('Registrado com Sucesso!!!', 201);
    }
}
