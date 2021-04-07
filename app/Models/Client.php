<?php

namespace App\Models;

use App\Models\Requests;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $table = 'client';
    public $fillable = [
        'phone', 'fio'
    ];

    public function requests()
    {
        return $this->hasMany(Requests::class, 'id_client', 'id');
    }
}
