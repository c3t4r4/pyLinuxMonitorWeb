<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

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

        return response()->json('Registrado com Sucesso!!!', 201);
    }
}
