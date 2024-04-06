<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CrudUserController extends Controller
{
    public function index(Request $request)
	{
		$search = $request->input('search');
		$user = User::when($search, function ($query, $search) {
			return $query->where('name', 'like', '%' . $search . '%')
				->orWhere('email', 'like', '%' . $search . '%');
		})->where('role', '<>', 'admin')->get();

		return view('admin.pengguna.index', ['user' => $user]);
	}

    public function create()
	{
		return view('user.crud_tamu.tambah');
	}

	public function store(Request $request): RedirectResponse
	{
		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
		]);

		$userId = Auth::id();

		// Simpan ke database
		$user = User::create([
			'users_id' => $userId,
			'name' => $request->name,
			'address' => $request->address,
		]);

		return redirect('/admin/pengguna')->with('success', 'Anda berhasil menambahkan data!');
	}

	public function delete($id)
	{
		$user = User::find($id);

		$user->delete();
		return redirect('/admin/pengguna')->with('success', 'Anda berhasil menghapus pengguna!');
	}
}
