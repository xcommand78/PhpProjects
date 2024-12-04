<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
