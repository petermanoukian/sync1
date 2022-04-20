<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolerusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolerusers', function (Blueprint $table) {
            $table->id();
			$table->integer('userid')->unsigned();
			$table->integer('rolerid')->unsigned();
            $table->timestamps();
        });
		
		Schema::table('rolerusers', function($table) {
      		$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
   		});
		Schema::table('rolerusers', function($table) {
      		$table->foreign('rolerid')->references('id')->on('rolercats')->onDelete('cascade');
   		});
		
		
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolerusers');
    }
}
