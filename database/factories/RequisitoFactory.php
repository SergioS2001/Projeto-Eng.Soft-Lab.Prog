<?php

namespace Database\Factories;
use App\Models\Sala;
use App\Models\Edificio;
use App\Models\Requisito;
use App\Models\Utilizador;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
define('HOUR_FORMAT11', "H:i:s");
define('DATA_FORMAT11', "Y-m-d H:i:s");
class RequisitoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $d=DB::table('salas')->get();
        $f=DB::table('Utilizadors')->get();
        if($d==null){
            \App\Models\Sala::factory(5)->create();
        }
        if($f==null){
            \App\Models\Utilizador::factory(5)->create();
        }

        $id=Sala::all()->random()->id;
        $sala = DB::table('salas')->where('id',$id)->first();
        $edificio = DB::table('edificios')->where('id',$sala->id_edificio)->first();
        $re0=Carbon::parse($edificio->date_in)->addHour(random_int(0,2))->format(HOUR_FORMAT11);
        $now5=Carbon::parse(now())->addDay(5)->format('Y-m-d');
        $n2=Carbon::parse($now5 . $re0)->format(DATA_FORMAT11);
        $re2=Carbon::parse($n2)->addHour(2);

        return [
                 'id_Utilizador'=>Utilizador::all()->random()->id,
                 'id_Sala'=>$id,
                 'date_in'=> $n2,
                 'date_out'=> $re2,
             ];

    }
    protected $model = Requisito::class;

}
