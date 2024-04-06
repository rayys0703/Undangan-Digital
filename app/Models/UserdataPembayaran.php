<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class UserdataPembayaran extends Model
{
    protected $table = "userdata_pembayaran";

    protected $fillable = ['users_id', 'template_id', 'tanggal_pemesanan', 'jumlah_tagihan', 'metode_pembayaran', 'status', 'gambar'];

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }
}