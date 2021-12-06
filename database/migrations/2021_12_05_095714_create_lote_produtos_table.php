<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained();
            $table->char('codigo',6)->unique();
            $table->date('dataFabricacao');
            $table->unsignedInteger('quantidadeProduto')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote_produtos');
    }
}
