<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcompanies', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('userid')->unsigned();
			$table->string('name', 255);
			$table->integer('compid')->unsigned();
			$table->integer('typesubcompid')->unsigned();	
            $table->timestamps();
        });
		
		Schema::table('subcompanies', function($table) {
      		$table->foreign('compid')->references('id')->on('companies')->onDelete('cascade');
   		});
		
		Schema::table('subcompanies', function($table) {
      		$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
   		});
		
		Schema::table('subcompanies', function($table) {
      		$table->foreign('typesubcompid')->references('id')->on('typesubcompanies')->onDelete('cascade');
   		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcompanies');
    }
}
