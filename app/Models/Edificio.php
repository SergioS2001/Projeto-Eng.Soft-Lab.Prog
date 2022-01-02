<?php

namespace App\Models;

use Database\Factories\EdificioFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Nome',
        'Piso_min',
        'Piso_max',
        'date_in',
        'date_out',
        'Morada',
    ];
    public function Salas()
    {
    	return $this->hasMany(Sala::class);
    }
    protected static function newFactory()
    {
        return new EdificioFactory();
    }

}
