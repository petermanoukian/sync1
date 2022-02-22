<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCompuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function(Blueprint $table) 
	    {
			$table->bigInteger('userid')->unsigned()->after('id');
	    });
		
		
		Schema::table('companies', function($table) {
      		$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
   		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
