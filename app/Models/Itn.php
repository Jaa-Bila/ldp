<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itn extends Model
{
    use HasFactory;
    public function partc(){
        return $this->hasMany('App\Models\Partc', 'id');
    }
}
