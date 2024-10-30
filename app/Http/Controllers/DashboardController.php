<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteOldRecordsJob;
use App\Models\Group;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
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

        $groups = Group::with('nodes')->permitedAll()->get();

        return Inertia::render('Dashboard', [
            'groups' => $groups,
        ]);
    }

    public function welcome()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
