<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receiptDetail extends Model
{
    use HasFactory;
    protected $table = 'receipt_detail';
    protected $fillable = ['id','id_receipt','created_at','quantity','updated_at'];
}
