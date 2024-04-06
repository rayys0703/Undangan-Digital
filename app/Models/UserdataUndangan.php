<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserdataUndangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'total_undangan',
        'undangan_dilihat',
        'total_ucapan',
    ];
    
    protected $table = 'userdata_undangan';
    // ...
}
