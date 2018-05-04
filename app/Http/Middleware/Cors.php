<?php
namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
    	$domains = ['*'];

        if(isset($request->server()['HTTP_ORIGIN'])){
            $origin = $request->server()['HTTP_ORIGIN'];
            if(in_array($origin, $domains)){
                header('Access-Control-Allow-Origin: '.  $origin);
                header('Access-Control-Allow-Headers: Origin, Content-Type');
                header('Access-Control-Allow-Credentials: true');
                header('Access-Control-Max-Age: 86400');
                header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, UPDATE');
            }
        }
        return $next($request);
            // ->header('Access-Control-Allow-Origin', '*')
            // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
