<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $table = 'client';
    public $fillable = [
        'phone', 'fio'
    ];


    public function request()
    {
        return $this->belongsTo(Request::class, 'id_client');
    }
}
