<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string( 'order' , 3 )->nullable()->default( NULL );
            $table->json( 'cover' )->nullable()->default( NULL );
            $table->json( 'file' )->nullable()->default( NULL );
            $table->string( 'title' , 100 )->nullable()->default( NULL );
            $table->boolean( 'elim' )->default( false );
            
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
        Schema::dropIfExists('documentaciones');
    }
}
