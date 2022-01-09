<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Requisito extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id',
        'id_Sala',
        'id_Utilizador',
        'date_in',
        'date_out'
    ];
    public $sortable = [ 'id', 'id_Sala','id_Utilizador','date_in','date_out'];
    public function utilizador()
    {
    	return $this->belongsTo(Utilizador::class);
    }
    public function Salas()
    {
    	return $this->belongsTo(Sala::class);
    }
}
