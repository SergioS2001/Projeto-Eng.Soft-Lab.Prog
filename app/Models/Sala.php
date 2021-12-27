<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{

    use HasFactory;


    protected $fillable = [
        'id',
        'id_edificio',
        'Piso',
        'Type',
        'Descricao',
    ];
    public function Requisitos()
    {
    	return $this->hasMany(Requisito::class);
    }
    public function Edificios()
    {
    	return $this->belongsTo(Edificio::class);
    }


}
