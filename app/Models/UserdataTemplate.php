<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserdataTemplate extends Model
{
    protected $fillable = [
        'templates_id',
        'users_id',
        'foto_cover',
        'foto_pria',
        'foto_wanita',
        'status',
        'link',
        'teks_konten_1',
        'teks_konten_2',
        'teks_konten_3',
        'teks_konten_4',
        'teks_konten_5',
        'teks_konten_6',
        'teks_konten_7',
        'teks_konten_8',
        'audio',
    ];
    
    protected $table = 'userdata_template';
}
