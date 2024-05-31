<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Persona::create([
            'id' => 1,
            'nombres' => 'SUPER',
            'apellidos' => 'ADMINISTRADOR',
            'numero_documento' => '123456',
        ]);
        $adminUser = User::create([
            'id' => 1,
            'name' => '@eladmin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'persona_id' => $admin->id,
            'vip' => 1,
        ]);
        $adminUser->syncRoles(['ADMINISTRADOR', 'CLIENTE']);
        $dj = Persona::create([
            'nombres' => 'SOY',
            'apellidos' => 'DJ',
            'numero_documento' => '456789',
        ]);

        $djUser = User::create([
            'id' => 2,
            'name' => '@soydj',
            'email' => 'dj@dj.com',
            'password' => Hash::make('123456'),
            'persona_id' => $dj->id,
            'vip' => 1,
        ]);
        $djUser->syncRoles(['DJ', 'CLIENTE']);
    }
}
