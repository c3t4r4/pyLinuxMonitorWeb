<?php

namespace App\Http\Middleware;

use App\Models\Node;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkNodeID
{

    public function handle(Request $request, Closure $next): Response
    {
        $apikey =  config('app.admin_name');

        if(empty($request->key) || $apikey !== $request->key || empty($request->id) || !Node::whereID($request->id)->whereStatus(true)->first()->exists()){
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return $next($request);
    }
}
