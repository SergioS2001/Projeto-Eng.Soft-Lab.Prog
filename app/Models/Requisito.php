<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;
    public function utilizador()
    {
    	return $this->belongsTo(Utilizador::class);
    }
    public function Salas()
    {
    	return $this->belongsTo(Sala::class);
    }
}
