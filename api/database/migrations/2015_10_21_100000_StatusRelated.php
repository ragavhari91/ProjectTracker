<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatusRelated extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('status',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->text('description');
                    $table->timestamps();
                });
                
                Schema::create('status_group',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->text('description');
                    $table->timestamps();
                });
                
                Schema::create('status_mapping',function(Blueprint $table){
                    $table->increments('id');
                    $table->unsignedInteger('status_id');
                    $table->unsignedInteger('status_group_id');
                });
                
                Schema::table('status_mapping',function(Blueprint $table){
                    $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
                    $table->foreign('status_group_id')->references('id')->on('status_group')->onDelete('cascade');
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
