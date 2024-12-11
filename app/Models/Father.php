<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    /** @use HasFactory<\Database\Factories\FatherFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'job',
        'image',
        'state',
        'food',
    ];
    public function child(){
        return $this->hasMany(Child::class,'father_id','id');
    }
}
