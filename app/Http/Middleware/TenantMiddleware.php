<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenant=Tenant::where('email',$request->email)->get();
        if($tenant && session()->has('email')){
            return $next($request);
        }
        else{
            return back()->with(['message'=>'Please login first']);
        }
    }
}
