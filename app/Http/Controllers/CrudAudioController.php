<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\AudioTemplate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CrudAudioController extends Controller
{
	public function index(Request $request)
	{
		$search = $request->input('search');
		$data = DB::table('audio_template')
		->when($search, function ($query, $search) {
			return $query->where('name', 'like', '%' . $search . '%')
				->orWhere('file', 'like', '%' . $search . '%');
		})
		->get();

		return view('admin.audio.index', compact('data'));
	} 

	public function store(Request $request): RedirectResponse
    {
    $request->validate([
        'name' => 'required',
    ]);

	$name = $request->input('name');
    $file = $request->file('file');
	$fileName = $name . '.' . $file->getClientOriginalExtension();
	$file->move(public_path('/music'), $fileName);

    DB::table('audio_template')->insert([
        'name' => $name,
        'file' => $fileName,
    ]);

    return redirect('/admin/audio')->with('success', 'Anda berhasil menambahkan data!');
    } 

	public function update($id, Request $request): RedirectResponse
	{
		$request->validate([
			'name' => 'required',
		]);

		$data = AudioTemplate::where('id', $id)->first();
        if ($request->hasFile('file')) {
            $audio = $request->file('file');
			$oldAudio = $data->file;

            if ($oldAudio) {
                $filePath = public_path('music/' . $oldAudio);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

			$name = $request->input('name');
            $filename_audio = $name . '.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('music/'), $filename_audio);

            $data->update(['file' => $filename_audio]);
        }

		DB::table('audio_template')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
        ]);

		return redirect('/admin/audio')->with('success', 'Anda berhasil memperbarui data!');
	} 

	public function hapus($id)
	{
		$audio = DB::table('audio_template')->find($id);
		$filePath = 'public/music/' . $audio->file;
		if (file_exists($filePath)) {
			unlink($filePath);
		}
		DB::table('audio_template')->where('id', $id)->delete();

		return redirect('/admin/audio')->with('success', 'Anda berhasil menghapus data!');
	} 
}
