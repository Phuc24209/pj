<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageProduct extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = ['id', 'image', 'id_product'];
}
