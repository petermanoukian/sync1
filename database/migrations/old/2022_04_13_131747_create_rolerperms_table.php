<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolerpermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolerperms', function (Blueprint $table) {
            $table->id();
			$table->integer('rolercatid')->unsigned();
			$table->integer('rolerid')->unsigned();
            $table->timestamps();
        });
		
		Schema::table('rolerperms', function($table) {
      		$table->foreign('rolercatid')->references('id')->on('rolercats')->onDelete('cascade');
   		});
		Schema::table('rolerperms', function($table) {
      		$table->foreign('rolerid')->references('id')->on('rolers')->onDelete('cascade');
   		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolerperms');
    }
}
