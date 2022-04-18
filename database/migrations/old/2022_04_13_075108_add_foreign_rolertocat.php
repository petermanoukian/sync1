<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignRolertocat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rolers', function(Blueprint $table) 
	    {
			$table->bigInteger('catid')->unsigned()->after('id');
	    });
		Schema::table('rolers', function($table) {
      		$table->foreign('catid')->references('id')->on('rolercats')->onDelete('cascade');
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
