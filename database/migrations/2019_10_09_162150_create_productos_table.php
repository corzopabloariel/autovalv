<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('familia_id')->nullable()->default(NULL);
            $table->string( 'order' , 5 )->nullable()->default( NULL );
            $table->json( 'file' )->nullable()->default( NULL );
            $table->json( 'content' )->nullable()->default( NULL );
            $table->string( 'title' , 100 )->nullable()->default( NULL );
            $table->boolean( 'elim' )->default( false );

            $table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}
