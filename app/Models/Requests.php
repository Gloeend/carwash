<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    public $table = 'request';
    public $timestamps = true;
    public $fillable = [
        'service', 'fio', 'id_map', 'id_mmc', 'phone'
    ];


    public function mmc()
    {
        return $this->belongsTo(Mmc::class, 'id_mmc');
    }
}
