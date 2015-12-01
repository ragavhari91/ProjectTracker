<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forgotpassword extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
            
              Schema::create('forgotpassword', function(Blueprint $table)
                {
                     $table->increments('id');
                     $table->string('email');
                     $table->string('code');
                     $table->timestamps();
                     
                });
                
              Schema::table('forgotpassword',function(Blueprint $table){  
                      $table->foreign('email')->references('user_email')->on('user');
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
