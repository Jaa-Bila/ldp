<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partc extends Model
{
    protected $fillable = [
        'id_batch',
        'name',
        'ttl',
        'nik',
        'pddk',
        'id_itn',
        'notel',
        'email',
        'size',
        'addr'
    ];

    public static function search($query)
{
    return empty($query) ? static::query()
            : static::where('partcs.name', 'like', '%'.$query.'%')
                ->orWhere('itns.name', 'like', '%'.$query.'%')
                ->orWhere('batches.name', 'like', '%'.$query.'%');

}
    use HasFactory;
}
