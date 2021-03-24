<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    public $table = 'service';
    public $timestamps = true;

    use HasFactory;

    public $fillable = [
        'title', 'price', 'id_type_service'
    ];

    public static function sortTypes()
    {
        $obTypes = TypeService::all();
        $arResult = [];
        foreach ($obTypes as $ind => $obType) {
            $arResult[] = static::where(['id_type_service' => $obType->id])->get();
        }
        return $arResult;
    }

    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'id_type_service');
    }
}
