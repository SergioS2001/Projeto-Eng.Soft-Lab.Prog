<?php

namespace App\Models;

use Database\Factories\EdificioFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Edificio extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        'id',
        'Nome',
        'Piso_min',
        'Piso_max',
        'date_in',
        'date_out',
        'Morada'
    ];
    public $sortable = ['id', 'Nome', 'Piso_min', 'Piso_max','date_in','date_out','Morada',];
    public function Salas()
    {
    	return $this->hasMany(Sala::class);
    }
    protected static function newFactory()
    {
        return new EdificioFactory();
    }

}
