<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productDetail extends Model
{
    use HasFactory;
    protected $table = 'product_detail';
    protected $fillable = ['id','id_product','id_size','id_color','id_brand','id_warehouse','quantity','price'];
}
