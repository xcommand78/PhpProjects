<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function role() {
        return $this->belongsToMany(Role::class,'employee__roles','employee_id','id');
    }
}
