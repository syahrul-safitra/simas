<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMaster
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // jika user belum login :
        if (!auth()->check()) {
            return redirect('login');
        }

        if (auth()->user()->level !== 'master') {
            return redirect('dashboard/pengguna');
        }
        return $next($request);
    }
}
