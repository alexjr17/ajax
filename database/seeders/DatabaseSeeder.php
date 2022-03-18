<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $carpeta = 'images';
        Storage::disk('public')->deleteDirectory($carpeta);
        Storage::disk('public')->makeDirectory($carpeta);
        $this->call(EmpleadoSeeder::class);
    }
}
