<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prods', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('userid')->unsigned();
			$table->string('name', 255);
			$table->integer('compid')->unsigned();
			$table->integer('subcompid')->unsigned();
			$table->integer('subsubcompid')->unsigned()->nullable();
			$table->string('logo', 255)->nullable();
			$table->float('prix')->nullable();
			$table->text('des')->nullable();
			$table->text('dess')->nullable();
            $table->timestamps();
        });
		
		Schema::table('prods', function($table) {
      		$table->foreign('compid')->references('id')->on('companies')->onDelete('cascade');
   		});
		
		Schema::table('prods', function($table) {
      		$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
   		});
		
		Schema::table('prods', function($table) {
      		$table->foreign('subcompid')->references('id')->on('subcompanies')->onDelete('cascade');
   		});
		
		Schema::table('prods', function($table) {
      		$table->foreign('subsubcompid')->references('id')->on('subsubcompanies')->onDelete('cascade');
   		});
		
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prods');
    }
}
