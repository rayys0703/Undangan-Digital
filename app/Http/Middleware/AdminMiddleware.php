<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return $next($request);
            }
            elseif (auth()->user()->role === 'user') {
                return redirect('/beranda');
            }
        }

        return redirect('/login');
        //return redirect()->back();
        //abort(403, 'Anda tidak memiliki izin.');
    }
}
