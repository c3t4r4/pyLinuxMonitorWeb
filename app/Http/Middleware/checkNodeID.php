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
        $apikey =  config('app.api_key');

        $id = $request->node_id ?? '';

        if(empty($request->key) || $apikey !== $request->key || empty($id) || !Node::whereId($id)->first()){
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return $next($request);
    }
}
