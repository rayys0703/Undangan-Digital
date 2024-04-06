<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserdataKomentar extends Model
{
    protected $fillable = [
        'templates_id',
        'users_id',
        'name',
        'address',
        'content',
        'status',
    ];
    
    protected $table = 'userdata_komentar';
}
