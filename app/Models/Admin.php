<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'admin';

    protected $fillable = ['id','name', 'avartar', 'email', 'user_name', 'phone' ,'address', 'password', 'roles'];

    protected $hidden = ['password'];
    static function getAllWareHouse()
    {
        return DB::table('warehouse')->get();
    }


}
