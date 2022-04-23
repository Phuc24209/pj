<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class wareHouse extends Model
{
    protected $table = 'warehouse';
    protected $fillable = ['id','name','address','avatar','status'];
}
