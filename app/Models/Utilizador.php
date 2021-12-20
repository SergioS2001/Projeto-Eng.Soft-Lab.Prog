<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Utilizador extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Email',
        'Password',
        'Email_veril',
    ];
    public function Requisitos()
    {
    	return $this->hasMany(Requisito::class);
    }

}
