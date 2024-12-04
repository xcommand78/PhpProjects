<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chipset extends Model
{
    public function  phone() {
        return $this->belongsToMany(chipset::class,"hardware","chipset_id","id");
    }
}

