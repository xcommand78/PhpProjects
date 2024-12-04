<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function employee() {
        return $this->belongsToMany(Employee::class,'employee__roles','role_id');
    }
}
