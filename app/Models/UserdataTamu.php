<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class UserdataTamu extends Model
{
    protected $table = "userdata_tamu";

    protected $fillable = ['users_id','name','address'];
}