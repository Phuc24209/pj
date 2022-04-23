<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    use HasFactory;
    protected $table = 'receipt';
    protected $fillable = ['id', 'id_product_detail','id_admin', 'id_warehouse', 'id_supplier','quantity'];
}
