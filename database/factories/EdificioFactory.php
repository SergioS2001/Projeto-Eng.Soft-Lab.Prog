<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Edificio;
define("DATA_FORMAT9","Y-m-d H:i:s");
define("HOUR_FORMAT9","H:i:s");
class EdificioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Edificio::class;
    public function definition()
    {

        return [
            'Nome'=>$this->faker->name,
            'Piso_min'=>$this->faker->numberBetween(-20,0),
            'Piso_max'=>$this->faker->numberBetween(0,20),
            'date_in'=>function(){
$h=$this->faker->time(HOUR_FORMAT9);
while($h<'20:00:00'&& $h>'5:00:00'){
    $h=$this->faker->time(HOUR_FORMAT9);
}
return$h=$this->faker->time(HOUR_FORMAT9);
            },
            'date_out'=>'20:00:00',
            'Morada' => $this->faker->address(),
        ];
    }
}
