<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    public function father() {
        return $this->belongsTo(Father::class);
    }
}
