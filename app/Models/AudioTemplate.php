<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class AudioTemplate extends Model
{
    protected $table = "audio_template";

    protected $fillable = ['name','file'];
}