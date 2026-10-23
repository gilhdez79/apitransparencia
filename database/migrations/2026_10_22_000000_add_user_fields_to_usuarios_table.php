<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Usuarios', function (Blueprint $table) {
            $table->string('Nombre')->nullable();
            $table->string('ApellidoP')->nullable();
            $table->string('Amaterno')->nullable();
            $table->string('CorreoElectronico')->nullable()->unique();
        });
    }

    public function down(): void
    {
        Schema::table('Usuarios', function (Blueprint $table) {
            $table->dropUnique(['CorreoElectronico']);
            $table->dropColumn([
                'Nombre',
                'ApellidoP',
                'Amaterno',
                'CorreoElectronico',
            ]);
        });
    }
};
