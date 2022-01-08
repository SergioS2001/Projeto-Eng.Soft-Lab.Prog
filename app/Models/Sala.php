<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Sala extends Model
{

    use HasFactory,Sortable;


    protected $fillable = [
        'id',
        'id_edificio',
        'Piso',
        'Type',
        'Descricao'
    ];
    public $sortable = [   'id',
    'id_edificio',
    'Area',
    'Piso',
    'Type',
    'Descricao'];
    public function Requisitos()
    {
    	return $this->hasMany(Requisito::class);
    }
    public function Edificios()
    {
    	return $this->belongsTo(Edificio::class);
    }


}
