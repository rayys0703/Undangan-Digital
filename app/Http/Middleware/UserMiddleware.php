<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\UserdataAcara;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            // Jika peran pengguna adalah 'user', biarkan mereka melanjutkan
            if (auth()->user()->role === 'user') {

                // Cek apakah pengguna sudah berada di halaman /setup
                if ($request->path() !== 'setup') {
                    $user_id = Auth::id();
                    $dataAcara = UserdataAcara::where('users_id', $user_id)->first();

                    if (empty($dataAcara->nama_pria) || empty($dataAcara->bio_pria) || empty($dataAcara->nama_wanita) || empty($dataAcara->bio_wanita) || empty($dataAcara->tanggal_akad) || empty($dataAcara->tanggal_resepsi) ||  empty($dataAcara->tempat_akad) ||  empty($dataAcara->tempat_resepsi) || empty($dataAcara->nama_acara)) {
                        return redirect('/setup');
                    }
                }
                return $next($request);
            }
            // Jika peran pengguna adalah 'admin', arahkan mereka ke '/admin'
            elseif (auth()->user()->role === 'admin') {
                return redirect('/admin');
            }
        }

        return redirect('/login');
        //return redirect()->back();
        //abort(403, 'Anda tidak memiliki izin.');
    }
}
