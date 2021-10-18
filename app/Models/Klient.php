<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klient extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','doljnost','name','last_name','adress','phone','data_registr'];

    public function dogovor() {
        return $this->hasMany(Dogovor::class,'id','id');
    }
    public function orderdogovr() {
        return $this->hasMany(OrderDogovor::class,'id','id');
    }
}
