<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    public $table = 'type_service';
    public $timestamps = true;

    public $fillable = [
        'title'
    ];

    use HasFactory;
}
