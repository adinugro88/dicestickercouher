<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\Customers;

class Voucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toko(){ 
        return $this->belongsTo(Toko::class,'toko_id');
    }

    public function customer(){ 
        return $this->hasOne(Customers::class); 
    }
}
