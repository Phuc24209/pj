<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nameProduct extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['id', 'id_type', 'name', 'descrip'];
}
