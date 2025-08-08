<?php


namespace Database\Factories;

use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuariosFactory extends Factory
{
    // Conecta a factory ao seu model
    protected $model = Usuarios::class;

    public function definition()
    {

        $senhaTexto = $this->faker->password(8, 16);

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => Hash::make($senhaTexto),
            'recrutador' => $this->faker->randomElement(['sim', 'não']),
        ];
    }
}