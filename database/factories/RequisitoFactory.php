<?php

namespace Database\Factories;
use App\Models\Sala;
use App\Models\Edificio;
use App\Models\Requisito;
use App\Models\Utilizador;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RequisitoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $id=Sala::all()->random();
        $date_in = DB::select('select date_in from edificios where id=?',[$id->id_edificio]);
        $date_out = DB::select('select date_out from edificios where id=?',[$id->id_edificio]);
             return [
                 'id_Utilizador'=>Utilizador::all()->random()->id,
                 'id_Sala'=>$id->id,
                 'date_in'=> $date_in,
                 'date_out'=> $date_in,
             ];

    }
    protected $model = Requisito::class;

}
