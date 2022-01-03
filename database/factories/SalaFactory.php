<?php

namespace Database\Factories;

use App\Models\Edificio;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SalaFactory extends Factory
{
    protected $model =  Sala::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {

       $id=Edificio::all()->random()->id;
       $Piso_Min = DB::statement('select Piso_min from edificios where id=?',[$id]);
       $Piso_max = DB::statement('select Piso_max from edificios where id=?',[$id]);
     $res=random_int($Piso_Min,$Piso_max);
        return [
            'Area'=>$this->faker->numberBetween(1,200),
            'Piso'=>$res,
            'id_edificio'=>  $id ,
            'type'=>$this->faker->text(40),
            'Descricao'=>$this->faker->text(120),
        ];
    }



}
