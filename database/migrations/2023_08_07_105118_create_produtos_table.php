<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('prd_id');
            $table->string('prd_nome')->unique();
            $table->string('prd_descricao',255);
            $table->timestamps();

            // foreignkey reference marcas
            $table->unsignedBigInteger('mrc_id');
            $table->foreign('mrc_id')
                ->references('mrc_id')
                ->on('marcas');
				
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
