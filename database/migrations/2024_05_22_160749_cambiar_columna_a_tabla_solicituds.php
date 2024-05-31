<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        DB::table('solicituds')->whereNull('status')->update(['status' => '2']);
        // Cambiar el tipo de la columna a VARCHAR temporalmente
        Schema::table('solicituds', function (Blueprint $table) {
            $table->string('status', 100)->change(); // Cambiar 50 según sea necesario
        });

        // Actualizar los valores existentes
        DB::table('solicituds')->where('status', '0')->update(['status' => 'RECHAZADO']);
        DB::table('solicituds')->where('status', '1')->update(['status' => 'ACEPTADO']);
        DB::table('solicituds')->where('status', '2')->update(['status' => 'EN ESPERA']);

        // Cambiar el tipo de la columna a ENUM
        Schema::table('solicituds', function (Blueprint $table) {
            $table->enum('status', ['ACEPTADO', 'RECHAZADO', 'EN ESPERA', 'CANCELADO'])->default('EN ESPERA')->change(); // Cambiar 50 según sea necesario
        });
        // DB::statement("ALTER TABLE solicituds MODIFY status ENUM('ACEPTADO', 'RECHAZADO', 'EN ESPERA', 'CANCELADO') DEFAULT 'EN ESPERA'");
    }

    public function down()
    {
        // Revertir el cambio de tipo de la columna a VARCHAR temporalmente
        Schema::table('solicituds', function (Blueprint $table) {
            $table->string('status', 50)->nullable()->change(); // Cambiar 50 según sea necesario
        });

        // Revertir los valores a booleano si es necesario
        DB::table('solicituds')->where('status', 'RECHAZADO')->update(['status' => 0]);
        DB::table('solicituds')->where('status', 'ACEPTADO')->update(['status' => 1]);
        DB::table('solicituds')->where('status', 'EN ESPERA')->update(['status' => null]);

        // Revertir el tipo de la columna a booleano
        Schema::table('solicituds', function (Blueprint $table) {
            $table->boolean('status')->nullable()->change();
        });
    }
};
