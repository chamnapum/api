<?php
namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
    	$domains = ['http://localhost:8080', 'http://www.examplesite2.com'];

        if(isset($request->server()['HTTP_ORIGIN'])){
            $origin = $request->server()['HTTP_ORIGIN'];
            if(in_array($origin, $domains)){
                header('Access-Control-Allow-Origin: '.  $origin);
                header('Access-Control-Allow-Headers: Origin, Content-Type');
            }
        }
        return $next($request);
            // ->header('Access-Control-Allow-Origin', '*')
            // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
