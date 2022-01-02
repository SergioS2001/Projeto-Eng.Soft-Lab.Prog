<?php

namespace Database\Factories;

use App\Models\Edificio;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
class SalaFactFactory extends Factory
{
    protected $model =  Sala::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'Area'=>$this->faker->numberBetween(1,200),
            'Piso'=>function(){
               $ed =Edificio::pluck('id')->random();
              $ed2=  DB::table('edificios')->where('id',$ed)->get();
            return random_int($ed2->Piso_min,$ed2->Piso_max);

            },
            'id_edificio'=> Edificio::pluck('id')->random(),
            'type'=>$this->faker->text,

        ];
    }


}
