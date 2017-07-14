<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Jusu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        //return $this->auth->user()->tipo_user=='2-1';
        if($this->auth->user()->tipo_user=='2' || $this->auth->user()->tipo_user=='0'){
            return $next($request);
        }else{
            abort(403);
        }
    }
}
