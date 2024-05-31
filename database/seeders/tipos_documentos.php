<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipos_documentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_documentos')->insert([
            'id' => 1,
            'nombre' => 'CC',
            'descripcion' => 'Cedula de ciudadania',
            'status' => 1,
        ]);

        DB::table('tipos_documentos')->insert([
            'id' => 2,
            'nombre' => 'TI',
            'descripcion' => 'tarjeta de identidad',
            'status' => 1,
        ]);

        DB::table('tipos_documentos')->insert([
            'id' => 3,
            'nombre' => 'PP',
            'descripcion' => 'Pasaporte',
            'status' => 1,
        ]);

        DB::table('tipos_documentos')->insert([
            'id' => 4,
            'nombre' => 'RC',
            'descripcion' => 'registro civil',
            'status' => 1,
        ]);
    }
}
