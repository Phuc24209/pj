<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    use HasFactory;
    protected $table = 'issue';
    protected $fillable = ['id', 'id_product_detail','id_admin', 'id_warehouse', 'date_issue', 'quantity'];
}
