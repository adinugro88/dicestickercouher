<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers;

class Cabang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer(){ 
        return $this->hasOne(Customers::class); 
    }
}
