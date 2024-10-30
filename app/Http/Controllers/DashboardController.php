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
        // Verifica se existe uma data de última execução na session
        $lastRun = Cache::get('delete_records_last_run');
        $today = Carbon::now()->format('Y-m-d'); // Formata como 'YYYY-MM-DD'

        // Se não houver data ou a data for diferente de hoje, dispara o job
        if (!$lastRun || $lastRun < $today) {
            DeleteOldRecordsJob::dispatch();

            // Armazena a data atual na session
            Cache::put('delete_records_last_run', $today);
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
