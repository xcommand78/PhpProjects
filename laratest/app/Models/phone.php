<?php

namespace App\Models;
use App\Models\chipset;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    public function  chipset() {
        return $this->belongsToMany(chipset::class,"hardware","phone_id","id");
    }
}
