<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Team;


class CheckRoleEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next)
    {
        $user = User::find($request->user()->id);
       
       if(auth()->user()->isEditor($user)){
            return $next($request);
        }
        else{
    
        return redirect()->back()->withErrors(['No autenticado o sin permisos de edición.']);
    }

        
       
    }

  
   
}
