<?php

namespace App\Http\Middleware;

use Closure;

class Agent 
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
        if($request->user()->typeId == 3){
        
            return $next($request);
        
        }else {
            return redirect('admin');
        }        
        
        /*if(isset($request)){

            return redirect('agent');
        }
        else if($request->user()->typeId == 3){
            return $next($request);

        }else{
            return redirect('admin');
        }*/

    }
}
