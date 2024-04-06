<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Template;
use App\Models\UserdataPembayaran;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search = request()->query('search');
        $userCount = User::where('role', '<>', 'admin')->count();
        $templateCount = Template::count();
        $latestUser = User::orderBy('id', 'desc')->whereNotIn('role', ['admin'])->take(4)->get();
        $totalTagihan = UserdataPembayaran::where('status', 'Belum bayar')->count();
    
        return view('admin.beranda', compact('userCount', 'templateCount', 'latestUser', 'totalTagihan'));
    }

}
