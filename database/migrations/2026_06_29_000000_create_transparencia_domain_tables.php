<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('articulos')) {
            Schema::create('articulos', function (Blueprint $table) {
                $table->id('Id');
                $table->string('Nombre')->nullable();
                $table->string('NombreArticulo', 100)->nullable();
                $table->string('EstructuraCarpeta', 100)->nullable();
                $table->string('Titulo', 100)->nullable();
            });
        }

        if (! Schema::hasTable('fraccions')) {
            Schema::create('fraccions', function (Blueprint $table) {
                $table->id('Id');
                $table->string('Nombre')->nullable();
                $table->string('EstructuraCarpeta', 100)->nullable();
                $table->unsignedBigInteger('IdArticulo')->nullable();
                $table->string('Descripcion', 700)->nullable();
                $table->string('Titulo', 100)->nullable();
                $table->integer('Consecutivo')->nullable();
            });
        }

        if (! Schema::hasTable('trimestre')) {
            Schema::create('trimestre', function (Blueprint $table) {
                $table->id('Id');
                $table->string('Nombre')->nullable();
                $table->string('NombreCorto');
            });
        }

        if (! Schema::hasTable('ponencia')) {
            Schema::create('ponencia', function (Blueprint $table) {
                $table->id('Id');
                $table->string('Nombre');
            });
        }

        if (! Schema::hasTable('tipoestrados')) {
            Schema::create('tipoestrados', function (Blueprint $table) {
                $table->id('Id');
                $table->string('Nombre');
            });
        }

        if (! Schema::hasTable('datoslinks')) {
            Schema::create('datoslinks', function (Blueprint $table) {
                $table->id('ID');
                $table->string('UrlCarpeta', 500)->nullable();
                $table->text('Link')->nullable();
                $table->text('LinklHtml')->nullable();
                $table->unsignedBigInteger('idArticuloFraccion')->nullable();
                $table->string('FechaCreacion', 50)->nullable();
                $table->string('PesoKb', 255)->nullable();
                $table->string('NombreArchivo')->nullable();
                $table->integer('Annio')->nullable();
                $table->unsignedBigInteger('idTrimestre')->nullable();
                $table->unsignedBigInteger('idArticulo')->nullable();
                $table->unsignedBigInteger('IdFraccion')->nullable();
                $table->string('IdinCiso', 10)->nullable();
                $table->boolean('mostrarentransp')->default(true);
                $table->integer('Clasificacion')->nullable();
                $table->unsignedBigInteger('idponencia')->nullable();
                $table->unsignedBigInteger('idtipoestrado')->nullable();
                $table->unsignedBigInteger('idsubcategoriahijo')->nullable();
                $table->unsignedBigInteger('idsubcategoria')->nullable();

                $table->index('Annio');
                $table->index('idArticulo');
                $table->index('IdFraccion');
                $table->index('idTrimestre');
                $table->index('Clasificacion');
            });
        }

        if (! Schema::hasTable('estrados')) {
            Schema::create('estrados', function (Blueprint $table) {
                $table->id('Id');
                $table->integer('annio')->nullable();
                $table->string('nombrearchivo')->nullable();
                $table->unsignedBigInteger('idtipoestrado')->nullable();
                $table->text('link')->nullable();
                $table->unsignedBigInteger('idponencia')->nullable();
                $table->date('fecha')->nullable();
                $table->timestamps();

                $table->index('idtipoestrado');
                $table->index('idponencia');
                $table->index('fecha');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('estrados');
        Schema::dropIfExists('datoslinks');
        Schema::dropIfExists('tipoestrados');
        Schema::dropIfExists('ponencia');
        Schema::dropIfExists('trimestre');
        Schema::dropIfExists('fraccions');
        Schema::dropIfExists('articulos');
    }
};
