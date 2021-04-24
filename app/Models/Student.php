<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $fillable = ['name', 'surname', 'email', 'phone'];

    public function grades(){
        return $this->hasMany('App\Models\Grade');
    }
}
