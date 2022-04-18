<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disccats', function (Blueprint $table) {
            $table->id();
			$table->integer('discid')->unsigned();
            $table->integer('catid')->unsigned();
            $table->timestamps();
        });
		
		Schema::table('disccats', function($table) {
      		$table->foreign('discid')->references('id')->on('discountts')->onDelete('cascade');
   		});
		
		Schema::table('disccats', function($table) {
      		$table->foreign('catid')->references('id')->on('cats')->onDelete('cascade');
   		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disccats');
    }
}
