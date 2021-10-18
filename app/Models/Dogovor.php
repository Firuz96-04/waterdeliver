<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dogovor extends Model
{
    use HasFactory;
    protected $fillable =['schet','client_mfo','client_inn','client_comment'];

    public function klient() {
        return $this->belongsTo(Klient::class,'client_id','id');
    }

    public function orderDogovor() {
        return $this->hasMany(OrderDogovor::class,'id','id');
    }

}
