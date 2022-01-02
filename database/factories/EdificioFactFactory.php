<?php

namespace Database\Factories;

use App\Models\Edificio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EdificioFactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nome'=>$this->faker->name,
            'Piso_min'=>$this->faker->numberBetween(-20,0),
            'Piso_max'=>$this->faker->numberBetween(0,20),
            'data_in'=>$this->faker->time("H:i:s",'10:00:00'),
            'data_out'=>'20:00:00',
            'Morada' => $this->faker->address(),
        ];
    }
    protected $model = Edificio::class;
}
