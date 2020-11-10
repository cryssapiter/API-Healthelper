<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserModel; 

class LoginMiddleware
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
       if($request->input('token')){
           $check = UserModel::where('token', $request->input('token'))->first();

           if(!$check){
               return response('Token invalid',401);
           }else{
               return $next($request);
           }
       }else{
           return response('Insert Token',401);
       }
    }
}