<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\UserdataTamu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CrudHadiahController extends Controller
{

	/*public function index()
	{
		$user = Users::all();
		return view('crud_users.index', ['user' => $user]);
	}
	*/
	public function index(Request $request)
	{
		$search = $request->input('search');
		$user = DB::table('tamu_hadiah')
		->when($search, function ($query, $search) {
			return $query->where('pemilik_rekening', 'like', '%' . $search . '%')
				->orWhere('no_rekening', 'like', '%' . $search . '%');
		})
		->where('users_id', '=', Auth::user()->id)
		->get();

		return view('user.tamu_hadiah.index', compact('user'));
	} 

	public function tambah()
	{
		return view('user.crud_tamu.tambah');
	}

	public function store(Request $request): RedirectResponse
    {
    $request->validate([
        'bank' => 'required',
        'pemilik_rekening' => 'required',
        'no_rekening' => 'required',
    ]);

    $userId = auth()->id();

    DB::table('tamu_hadiah')->insert([
        'users_id' => $userId,
        'bank' => $request->bank,
        'pemilik_rekening' => $request->pemilik_rekening,
        'no_rekening' => $request->no_rekening,
    ]);

    return redirect('/hadiah')->with('success', 'Anda berhasil menambahkan data!');
    } 

	public function edit($id)
	{
		$user = UserdataTamu::find($id);
		return view('user.crud_tamu.edit', ['user' => $user]);
	}

	public function update($id, Request $request): RedirectResponse
	{
		$request->validate([
			'bank' => 'required',
			'pemilik_rekening' => 'required',
			'no_rekening' => 'required',
		]);

		DB::table('tamu_hadiah')
        ->where('id', $id)
        ->update([
            'bank' => $request->bank,
            'pemilik_rekening' => $request->pemilik_rekening,
			'no_rekening' => $request->no_rekening,
        ]);

		return redirect('/hadiah')->with('success', 'Anda berhasil memperbarui data!');
	} 

	public function hapus($id)
	{
		DB::table('tamu_hadiah')->where('id', $id)->delete();
		return redirect('/hadiah')->with('success', 'Anda berhasil menghapus data!');
	} 
}
