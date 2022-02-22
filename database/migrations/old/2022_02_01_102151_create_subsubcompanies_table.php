<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubcompanies', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('userid')->unsigned();
			$table->string('name', 255);
			$table->integer('compid')->unsigned();
			$table->integer('subcompid')->unsigned();	
            $table->timestamps();
        });
		
		
		Schema::table('subsubcompanies', function($table) {
      		$table->foreign('compid')->references('id')->on('companies')->onDelete('cascade');
   		});
		
		Schema::table('subsubcompanies', function($table) {
      		$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
   		});
		
		Schema::table('subsubcompanies', function($table) {
      		$table->foreign('subcompid')->references('id')->on('subcompanies')->onDelete('cascade');
   		});
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsubcompanies');
    }
}
