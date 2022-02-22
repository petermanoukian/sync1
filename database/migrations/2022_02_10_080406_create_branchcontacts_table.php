<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchcontacts', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('userid')->unsigned();
			$table->integer('typebranchid')->unsigned();
			$table->integer('compid')->unsigned();
			$table->integer('subcompid')->unsigned();
			$table->integer('branchid')->unsigned();
			$table->string('name', 255);
			$table->string('mobile', 255)->nullable();
			$table->string('phone', 255)->nullable();
			$table->text('address')->nullable();
            $table->timestamps();
        });
		
			Schema::table('branchcontacts', function($table) {
				$table->foreign('typebranchid')->references('id')->on('typebranches')->onDelete('cascade');
			});
			
			Schema::table('branchcontacts', function($table) {
				$table->foreign('compid')->references('id')->on('companies')->onDelete('cascade');
			});

			Schema::table('branchcontacts', function($table) {
				$table->foreign('subcompid')->references('id')->on('subcompanies')->onDelete('cascade');
			});
			
			Schema::table('branchcontacts', function($table) {
				$table->foreign('branchid')->references('id')->on('branches')->onDelete('cascade');
			});
			
			Schema::table('branchcontacts', function($table) {
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
        Schema::dropIfExists('branchcontacts');
    }
}
