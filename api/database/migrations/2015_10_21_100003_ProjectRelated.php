<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectRelated extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_type', function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name');
                    $table->text('description');
		});
                
                Schema::create('project',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('project_name');
                    $table->unsignedInteger('project_type');
                    $table->unsignedInteger('project_status');
                    $table->text('project_description');
                });
                
                Schema::table('project',function(Blueprint $table){
                    $table->foreign('project_type')->references('id')->on('project_type')->onDelete('cascade');
                    $table->foreign('project_status')->references('id')->on('status')->onDelete('cascade');
                });
                
                Schema::create('project_members',function(Blueprint $table){
                    $table->increments('id');
                    $table->unsignedInteger('project_id');
                    $table->unsignedInteger('user_id');
                    $table->unsignedInteger('user_type');
                    $table->unsignedInteger('user_status');
                });
                
                Schema::table('project_members',function(Blueprint $table){
                    $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
                    $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
                    $table->foreign('user_type')->references('id')->on('role')->onDelete('cascade');
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
		
	}

}
