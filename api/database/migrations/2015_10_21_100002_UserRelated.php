<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRelated extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('user_first_name');
                        $table->string('user_last_name');
                        $table->integer('user_age')->unsigned();
                        $table->integer('user_gender');
                        $table->string('user_email')->unique();
                        $table->string('user_password');
                        $table->string('user_mobile')->unique();
                        $table->unsignedInteger('user_role');
                        $table->unsignedInteger('user_status');
			$table->timestamps();
		});
                
                Schema::table('user',function(Blueprint $table){
                   $table->foreign('user_role')->references('id')->on('role')->onDelete('cascade');
                   $table->foreign('user_status')->references('id')->on('status')->onDelete('cascade');
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
