<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChartTamu extends Model
{
    use HasFactory;
    protected $table = 'userdata_komentar';

    public static function countByKehadiran()
    {
        $activeUserId = Auth::id(); // Mendapatkan ID user yang saat ini aktif

        return [
            'hadir' => self::where('users_id', $activeUserId)->where('status', 'Hadir')->count(),
            'tidak_hadir' => self::where('users_id', $activeUserId)->where('status', 'Tidak hadir')->count(),
        ];
    }
}
