<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // CREAR ROLES
        $administrador = Role::create(['name' => 'ADMINISTRADOR']);
        $cliente = Role::create(['name' => 'CLIENTE']);
        $dj = Role::create(['name' => 'DJ']);

        // CREAR PERMISOS
        $hacerSolicitudes = Permission::create(['name' => 'HACER SOLICITUDES']);
        $adquirirMembresia = Permission::create(['name' => 'ADQUIRIR MEMBRESIA']);
        $gestionarSolicitudes = Permission::create(['name' => 'GESTIONAR SOLICITUDES']);
        $gestionarDJ = Permission::create(['name' => 'GESTIONAR DJ']);
        $gestionarClientes = Permission::create(['name' => 'GESTIONAR CLIENTES']);
        $gestionarMembresia = Permission::create(['name' => 'GESTIONAR MEMBRESIA']);

        // ASIGNAR PERMISOS A ROLES
        $administrador->givePermissionTo(
            $gestionarClientes,
            $gestionarDJ,
            $gestionarMembresia,
        );
        $cliente->givePermissionTo(
            $hacerSolicitudes,
            $adquirirMembresia,
        );
        $dj->givePermissionTo(
            $gestionarSolicitudes,
        );
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
