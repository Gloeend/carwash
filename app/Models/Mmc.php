<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mmc extends Model
{
    public $table = 'mmc';
    public $timestamps = true;
    public $fillable = [
        'id_model', 'id_class', 'id_mark'
    ];


    use HasFactory;

    public static function getSortedModels($id)
    {
        $obMmcs = static::where(['id_mark' => $id])->get();
        $obModels = [];
        foreach ($obMmcs as $ind => $obMmc) {
            $obModels[] = Models::where(['id' => $obMmc->id_model])->first();
        }
        return $obModels;
    }

    public function model()
    {
        return $this->belongsTo(Models::class, 'id_model');
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class, 'id_mark');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'id_class');
    }
}
