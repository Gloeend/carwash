<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public $table = 'class';
    public $timestamps = true;
    public $fillable = [
        'price'
    ];
}
