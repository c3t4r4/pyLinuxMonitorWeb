<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteOldRecordsJob;
use App\Models\Disk;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

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

        // Recupera a última execução do cache
        $lastRun = Cache::get('delete_records_last_run');
        $now = Carbon::now();

        // Se não houver data ou passaram mais de 30 minutos, dispara o job
        if (!$lastRun || $now->diffInMinutes(Carbon::parse($lastRun)) >= 30) {
            // Dispara o job para remover registros antigos
            DeleteOldRecordsJob::dispatch();

            // Armazena a data e hora atual no cache
            Cache::put('delete_records_last_run', $now);
        }

        return response()->json('Registrado com Sucesso!!!', 201);
    }
}
