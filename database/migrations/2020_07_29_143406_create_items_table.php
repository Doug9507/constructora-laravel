<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('tipo_operacion');
            $table->date('fecha_registro');
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->decimal('precio_unitario');
            $table->decimal('monto_total');
            $table->string('tipo_recurso');
            $table->string('proveedor');
            $table->string('tipo_comprobante');
            $table->string('numero_comprobante'); 
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
        Schema::dropIfExists('items');
    }
}
