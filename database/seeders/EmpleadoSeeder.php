<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = Empleado::factory(30)->create();
        foreach ($empleados as $empleado) {
            
            image::factory(1)->create([
                'imageable_id' => $empleado->id,
                'Imageable_type' => Empleado::class
            ]);   
        }
    }
}
