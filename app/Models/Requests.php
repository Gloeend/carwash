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
        'service',  'id_mmc', 'id_client', 'id_user'
    ];


    public function mmc()
    {
        return $this->belongsTo(Mmc::class, 'id_mmc');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function archive()
    {
        $this->status = 'Отклонен';
        $this->save();
    }
}
