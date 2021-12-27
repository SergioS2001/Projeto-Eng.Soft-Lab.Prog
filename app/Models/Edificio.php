<?php

namespace App\Models;

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
        'Morada',
    ];
    public function Salas()
    {
    	return $this->hasMany(Sala::class);
    }


}
