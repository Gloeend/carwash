<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mark extends Model
{
    public $table = 'mark';
    public $timestamps = true;

    public $fillable = [
        'title'
    ];

    use HasFactory;

    public function models()
    {
        return $this->belongsToMany(Models::class);
    }
}
