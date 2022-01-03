<?php

namespace Database\Factories;

use App\Models\Utilizador;
use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPUnit\Framework\returnSelf;

class UtilizadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Utilizador::class;
    public function definition()
    {
        return [
            'Nome'=>$this->faker->name(),
            'Type'=>function(){
$t=random_int(0,2);
switch($t){
case 0:
    return 'Aluno';
    break;
    case 1:
        return 'Docente';
        break;
        case 2:return 'Admin';
        break;
        default:
        return 'Aluno';
    break;
}


            },
            'Email'=>$this->faker->safeEmail(),
            'Password'=>$this->faker->password(8,16),

        ];
    }


}
