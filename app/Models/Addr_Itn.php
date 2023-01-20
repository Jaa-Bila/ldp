<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addr_Itn extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'itn_id'
    ];
}
