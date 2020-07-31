<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nombre_proyecto');
            $table->decimal('saldo_contable',9,2);
            $table->string('entidad_solicitante');
            $table->string('contratista');
            $table->decimal('monto_contratado',9,2);
            $table->date('inicio_obra');
            $table->date('fin_obra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
