<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
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
