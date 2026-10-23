<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (! Schema::hasColumn('usuarios', 'Nombre')) {
                $table->string('Nombre')->nullable();
            }
            if (! Schema::hasColumn('usuarios', 'ApellidoP')) {
                $table->string('ApellidoP')->nullable();
            }
            if (! Schema::hasColumn('usuarios', 'Amaterno')) {
                $table->string('Amaterno')->nullable();
            }
            if (! Schema::hasColumn('usuarios', 'CorreoElectronico')) {
                $table->string('CorreoElectronico')->nullable()->unique();
            }
        });
    }

    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (Schema::hasColumn('usuarios', 'CorreoElectronico')) {
                $table->dropUnique(['CorreoElectronico']);
            }
            $columns = array_values(array_filter([
                Schema::hasColumn('usuarios', 'Nombre') ? 'Nombre' : null,
                Schema::hasColumn('usuarios', 'ApellidoP') ? 'ApellidoP' : null,
                Schema::hasColumn('usuarios', 'Amaterno') ? 'Amaterno' : null,
                Schema::hasColumn('usuarios', 'CorreoElectronico') ? 'CorreoElectronico' : null,
            ]));
            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
