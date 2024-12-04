<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $fillable = [
        'name',
        'age',
        'wife',
    ];

    public function children(){
        return $this->hasMany(Child::class,'father_id','id');
    }

}
