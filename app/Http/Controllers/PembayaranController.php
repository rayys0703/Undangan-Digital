<?php

namespace App\Http\Controllers;

use App\Models\UserdataPembayaran;
use App\Models\Template;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PaymentNotification;
use App\Notifications\PaymentNotificationSuccess;
use Illuminate\Support\Facades\Notification;

use function PHPUnit\Framework\isEmpty;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        //$pembayaran = UserdataPembayaran::latest()->paginate(5);
        $pembayaran = UserDataPembayaran::join('template', 'userdata_pembayaran.template_id', '=', 'template.id')
        ->select('userdata_pembayaran.*', 'template.name as nama_template', 'template.image as gambar_template')
        ->where('userdata_pembayaran.users_id', $userId)
        ->latest()
        ->paginate(5);

        return view('user.pembayaran.index', compact('pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $userId = Auth::id();

        $cekData = UserDataPembayaran::where('users_id', $userId)->where('id', $id)->first();
        if ($cekData->metode_pembayaran !== null || $cekData->gambar !== null) {
            return redirect()->route('pembayaran.index')->with('success', 'Anda sudah membayar template ini.');
        }

        $pembayaran = UserDataPembayaran::join('template', 'userdata_pembayaran.template_id', '=', 'template.id')
        ->select('userdata_pembayaran.*', 'template.name as nama_template')
        ->where('userdata_pembayaran.users_id', $userId)
        ->where('userdata_pembayaran.id', $id)
        ->first();

        return view('user.pembayaran.create', compact('pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $userId = Auth::id();
        
        $request->validate([
            'metode_pembayaran' => 'required|in:DANA,GOPAY,SHOPEEPAY',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file gambar pembayaran
        $imageName = $id . time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images/pembayaran'), $imageName);

        // Update kolom metode_pembayaran dan gambar pada data pembayaran
        UserdataPembayaran::where('users_id', $userId)
            ->where('id', $id)
            ->update([
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'gambar' => 'images/pembayaran/' . $imageName,
            ]);

        $user = Auth::user();
        Notification::route('mail', 'rayyarr73@gmail.com')->notify(new PaymentNotification());

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil bayar template. Hubungi admin untuk konfirmasi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserdataPembayaran $pembayaran)
    {
        return view('pembayaran.show', compact('gambar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserdataPembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('gambar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserdataPembayaran $pembayaran): RedirectResponse
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'template' => 'required|string|max:255',
            'tanggal_pemesanan' => 'required|datetime',
            'jumlah_tagihan' => 'required|unsignedBigInteger',
            'metode_pembayaran' => 'required|string|max:255',
            'gambar' => 'required|varchar',
        ]);

        // Dapatkan ID template
        $pembayaranId = $pembayaran->id;

        // Simpan nama file gambar sebelumnya
        $previousImage = $pembayaran->gambar;

        // Update data template tanpa memperbarui gambar jika tidak ada perubahan
        $pembayaran->update([
            'nama_pemesan' => $request->input('nama_pemesan'),
            'template' => $request->input('template'),
            'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
            'jumlah_tagihan' => $request->input('jumlah_tagihan'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'gambar' => $request->input('gambar')
        ]);

        // Periksa apakah ada file gambar baru diupload
        if ($request->hasFile('gambar')) {
            // Hapus file gambar sebelumnya jika ada
            if ($previousImage) {
                $imagePath = public_path('gambar' . $previousImage);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Pindahkan file gambar baru dan update nama file
            $imageName = $pembayaranId . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path('gambar'), $imageName);
            $pembayaran->update(['gambar' => $imageName]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil memperbarui gambar.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserdataPembayaran $pembayaran)
    {
        // Hapus file gambar sebelumnya jika ada
        $previousImage = $pembayaran->gambar;
        if ($previousImage) {
            $imagePath = public_path('gambar' . $previousImage);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil menghapus gambar.');
    }

    public function beliTemplate($templateId)
    {
        $userId = Auth::id();
        $template = Template::find($templateId);

        if (!$template || $template->price == 0) {
            // Handle error or redirect as needed
            return redirect()->back()->with('error', 'Tidak dapat melakukan pembelian template ini.');
        }

        // Tambahkan atau update data ke userdata_pembayaran
        $userDataPembayaran = UserDataPembayaran::updateOrCreate(
            ['users_id' => $userId, 'template_id' => $templateId],
            ['tanggal_pemesanan' => now(), 'jumlah_tagihan' => $template->price]
        );

        // Tambahkan log atau pesan sukses jika diperlukan

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil memasukkan ke keranjang.');
    }

    // Untuk ADMIN

    public function transaksi(){
        $transaksi = UserDataPembayaran::join('template', 'userdata_pembayaran.template_id', '=', 'template.id')->join('users', 'userdata_pembayaran.users_id', '=', 'users.id')
        ->select(
            'userdata_pembayaran.*', 
            'users.name as nama_user',
            'users.email as email_user',
            'template.name as nama_template',
            'template.image',
            )
        ->whereNotNull('userdata_pembayaran.metode_pembayaran')
        ->whereNotNull('userdata_pembayaran.gambar')
        ->latest()
        ->paginate(5);

        return view('admin.transaksi.index', compact('transaksi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function transaksi_proses(Request $request)
    {
        $id = $request->input('id');

        $cekData = UserDataPembayaran::where('id', $id)->first();
        if ($cekData->status == 'Selesai') {
            return redirect()->route('transaksi')->with('success', 'Anda sudah mengkonfirmasi pembayaran ini.');
        }

        UserdataPembayaran::where('id', $id)
            ->update([
                'status' => 'Selesai',
            ]);

        $user = Auth::user();
        Notification::route('mail', $user->email)->notify(new PaymentNotificationSuccess());

        return redirect()->route('transaksi')->with('success', 'Berhasil konfirmasi pembayaran.');
    }
}
