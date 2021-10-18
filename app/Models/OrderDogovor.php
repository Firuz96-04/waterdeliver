<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDogovor extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = [];

    public function dogovor() {
        return $this->belongsTo(Dogovor::class,'dogovor_id','id');
    }
    public function klient() {
        return $this->belongsTo(Klient::class,'klient_id','id');
    }
}
