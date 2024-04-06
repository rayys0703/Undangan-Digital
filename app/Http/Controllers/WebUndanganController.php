<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\UserDataAcara;
use App\Models\UserdataTemplate;
use App\Models\UserdataPembayaran;
use App\Models\UserdataKomentar;
use App\Models\AudioTemplate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class WebUndanganController extends Controller
{
    public function index($id)
    {
        return view('template.' . $id);
    }

    public function play($id)
    {
        //$data = UserDataAcara::where('users_id', $userId)->first();
        $data = DB::table('userdata_template')
            ->join('userdata_acara', 'userdata_template.users_id', '=', 'userdata_acara.users_id')
            ->select(
                'userdata_template.id', 
                'userdata_template.templates_id', 
                'userdata_template.users_id as id_user',
                'userdata_template.foto_cover', 
                'userdata_template.foto_pria', 
                'userdata_template.foto_wanita',
                'userdata_template.teks_konten_1',
                'userdata_template.teks_konten_2',
                'userdata_template.teks_konten_3',
                'userdata_template.teks_konten_4',
                'userdata_template.teks_konten_5',
                'userdata_template.teks_konten_6',
                'userdata_template.teks_konten_7',
                'userdata_template.teks_konten_8',
                'userdata_template.audio', 
                'userdata_template.status', 
                'userdata_template.link', 
                'userdata_acara.*',
            )
            ->where('userdata_template.link', $id)
            ->first();

        $id_template = $data->templates_id;
        
        $rekening = DB::table('tamu_hadiah')
        ->where('users_id', $data->id_user)
        ->get();

        $audio = DB::table('audio_template')
        ->where('name', $data->audio)
        ->first();

        if ($data) {
            // Check if userdata_komentar exists
            $userdataKomentarExists = DB::table('userdata_komentar')
                ->where('users_id', $data->id_user)
                ->where('templates_id', $data->templates_id)
                ->exists();
    
            if ($userdataKomentarExists) {
                $ucapan = DB::table('userdata_komentar')
                    ->where('users_id', $data->id_user)
                    ->where('templates_id', $data->templates_id)
                    ->get();

                return view('template.' . $id_template, compact('data', 'ucapan', 'rekening', 'audio'));
            } else {
                return view('template.' . $id_template, compact('data', 'rekening', 'audio'));
            }
        } else {
            return redirect()->back()->with('error', 'Data not found');
        }
    } 

    public function postComment(Request $request)
    {
        // Validasi request
        $request->validate([
            'users_id' => 'required|integer',
            'templates_id' => 'required|integer',
            'name' => 'required|string',
            'address' => 'required|string',
            'status' => 'required|in:Hadir,Tidak hadir',
            'content' => 'required|string',
        ]);

        // Menyimpan komentar ke dalam tabel userdata_komentar
        $comment = UserDataKomentar::create([
            'users_id' => $request->input('users_id'),
            'templates_id' => $request->input('templates_id'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Ucapan berhasil terkirim.');
    }

    public function create($id)
    {
        $userId = Auth::user()->id;
        $data = UserDataAcara::where('users_id', $userId)->first();
        $dataTemplate = UserdataTemplate::where('users_id', $userId)->where('templates_id', $id)->first();
        $cekTemplateFree = Template::where('price', 0)->where('id', $id)->first();
        $cekPembayaran = UserDataPembayaran::where('users_id', $userId)->where('template_id', $id)->where('status', 'Selesai')->first();
        $audio = AudioTemplate::get();

        if ($cekTemplateFree || (!$cekTemplateFree && $cekPembayaran)) {
            if (!$dataTemplate) {
                $newDataTemplate = new UserdataTemplate();
                $newDataTemplate->users_id = $userId;
                $newDataTemplate->templates_id = $id;
                $newDataTemplate->save();
                $dataTemplate = UserdataTemplate::where('users_id', $userId)->where('templates_id', $id)->first();
            }
            //return view('template.buat_' . $id, compact('data', 'dataTemplate', 'id'));
            return view('template.buat_1', compact('data', 'dataTemplate', 'id', 'audio'));
        }

        return redirect()->back()->with('success', 'Tidak ditemukan');
    }
}
