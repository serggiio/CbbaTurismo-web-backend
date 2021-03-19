<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if(isset($request)){
            return redirect('login');
        }
        else if($request->user()->typeId == 1){
            
            return $next($request);

        }else{
            return redirect('agent');
        }*/
        //return $next($request);
        //dd('MDLWARE ADMIN');
        if($request->user()->typeId == 1){
        
            return $next($request);
        
        }else {
            return redirect('agent');
        }   

        //return $next($request);
    }
}
