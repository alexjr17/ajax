<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Empleado::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->Name(),
            'correo' => $this->faker->email(),
            'sexo' => $this->faker->randomElement(['Hombre', 'Mujer']),
            'area' => $this->faker->randomElement([
                        'administracion', 'recursos humanos', 'desarollador', 'redes'
                    ]),
            'descripcion' => $this->faker->sentence()
        ];
    }
}
