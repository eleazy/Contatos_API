<?php

namespace Database\Factories;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    protected $model = Contato::class;

    public function definition()
    {
        $telefone = $this->faker->phoneNumber;
        $celular = $this->faker->phoneNumber;
        $data_nascimento = $this->faker->dateTimeBetween('-70 years', '-20 years')->format('Y-m-d');

        return [
            'nome' => $this->faker->firstName,
            'sobrenome' => $this->faker->lastName,
            'data_nascimento' => $data_nascimento,
            'telefone' => $telefone,
            'celular' => $celular,
            'email' => $this->faker->unique()->safeEmail,   
                     
        ];
    }
}
