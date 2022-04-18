<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatProd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
		
		Schema::table('prods', function($table) {
      		$table->foreign('catid')->references('id')->on('cats')->onDelete('cascade');
   		});
		

		
		Schema::table('prods', function($table) {
      		$table->foreign('subcatid')->references('id')->on('subcats')->onDelete('cascade');
   		});
		
		Schema::table('prods', function($table) {
      		$table->foreign('subsubcatid')->references('id')->on('subsubcats')->onDelete('cascade');
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
