<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{

	 /**
	  * Run the migrations.
	  *
	  * @return void
	  */
	 public function up()
	 {
		  Schema::create('likes', function(Blueprint $table) {
				$table->integer('user_id');
				$table->integer('likeable_id')->unsigned();
				$table->string('likeable_type');
				
				// this is a solid way to insure that something will only be liked a by a person one time
				$table->primary(['user_id', 'likeable_id', 'likeable_type']);
				$table->timestamps();
		  });
	 }

	 /**
	  * Reverse the migrations.
	  *
	  * @return void
	  */
	 public function down()
	 {
		  Schema::dropIfExists('likes');
	 }
}
