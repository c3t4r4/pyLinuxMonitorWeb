<?php

namespace App\Jobs;

use App\Services\ServiceDeleteOldRecords;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use PHPUnit\Event\Dispatcher;
use Illuminate\Support\Facades\Log;
use Throwable;

class DeleteOldRecordsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Tempo máximo para execução do job.
     */
    public int $timeout = 60 * 10; // 10 minutos

    /**
     * Número máximo de tentativas.
     */
    public int $tries = 3; // Permitir 3 tentativas

    /**
     * Controla o tempo entre re-tentativas.
     */
    public int $backoff = 60; // 60 segundos de espera entre tentativas


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * @throws Throwable
     */
    public function handle(): void
    {
        ServiceDeleteOldRecords::Remove();
    }
}
