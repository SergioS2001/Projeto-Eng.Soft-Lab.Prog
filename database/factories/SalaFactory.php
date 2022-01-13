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
        $d=DB::table('edificios')->get();
if($d==null){
    \App\Models\Edificio::factory(5)->create();
}
       $id=Edificio::all()->random()->id;
       $Piso_Min = DB::table('edificios')->where('id',$id)->first();
     $res=random_int($Piso_Min->Piso_min,$Piso_Min->Piso_max);
        return [
            'Area'=>$this->faker->numberBetween(1,200),
            'Piso'=>$res,
            'id_edificio'=>  $id ,
            'type'=>$this->faker->text(40),
            'Descricao'=>$this->faker->text(120),
        ];
    }



}
