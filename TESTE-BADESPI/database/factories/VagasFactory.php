<?php


namespace Database\Factories;

use App\Models\Vagas;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class VagasFactory extends Factory
{
    // Conecta a factory ao seu model
    protected $model = Vagas::class;

    public function definition()
    {


        return [
            'name' => $this->faker->name(),
            'quantidade' => $this->faker->numberBetween(1, 100),
            'tipo' => $this->faker->randomElement(['CLT', 'PJ', 'Freelancer']),
            'descrição' => $this->faker->sentence(),
            'empresa' => $this->faker->company(),
            'salario' => $this->faker->randomFloat(2, 1000, 10000),
            'recrutadorid' => 1,
        ];
    }
}