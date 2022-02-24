<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubcats', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('userid')->unsigned();
			$table->string('name', 255);
			$table->integer('catid')->unsigned();
			$table->integer('subcatid')->unsigned();	
            $table->timestamps();
        });
		
		Schema::table('subsubcats', function($table) {
      		$table->foreign('catid')->references('id')->on('cats')->onDelete('cascade');
   		});
		
		Schema::table('subsubcats', function($table) {
      		$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
   		});
		
		Schema::table('subsubcats', function($table) {
      		$table->foreign('subcatid')->references('id')->on('subcats')->onDelete('cascade');
   		});
		
		
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsubcats');
    }
}
