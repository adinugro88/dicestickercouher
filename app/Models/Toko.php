<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voucher;
use App\Models\Customers;

class Toko extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function voucher(){ 
        return $this->hasOne(Voucher::class); 
    }

    public function customer(){ 
        return $this->hasOne(Customers::class); 
    }
}
