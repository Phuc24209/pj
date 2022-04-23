<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfer extends Model
{
    use HasFactory;
    protected $table = 'warehouse_transfer';
    protected $fillable = ['id', 'id_product_detail','id_admin', 'id_warehouse', 'id_warehouse_old', 'date_transfer', 'quantity'];
}
