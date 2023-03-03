<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\Cabang;
use App\Models\Voucher;

class Customers extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function toko(){ 
        return $this->belongsTo(Toko::class,'toko_id');
    }

    public function Cabang(){ 
        return $this->belongsTo(Cabang::class,'cabangs_id');
    }

    public function Voucher(){ 
        return $this->belongsTo(Voucher::class,'voucher_id');
    }
}
