<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where()
 * @method static find()
 */
class Models extends Model
{
    public $table = 'model';
    public $timestamps = true;
    public $fillable = [
        'title'
    ];

    use HasFactory;

    /**
     * Get all of the comments for the Models
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mmc()
    {
        return $this->hasMany(Mmc::class, 'id_model', 'id');
    }
}
