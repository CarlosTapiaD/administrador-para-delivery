<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('strNombre');
            $table->string('strDescripcion');
            $table->integer('intVisible');//0 no, 1 si
            $table->decimal('dcPrecio', $precision = 8, $scale = 2);
            $table->string('urlImg');
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id');
    $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
