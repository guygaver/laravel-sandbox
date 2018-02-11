<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToLesson extends Migration
{

	 /**
	  * Run the migrations.
	  *
	  * @return void
	  */
	 public function up()
	 {
		  Schema::table('lessons', function(Blueprint $table) {
				$table->integer('views')->nullable();
				$table->integer('likes')->nullable();
				$table->string('difficulty')->nullable();
				$table->text('body')->nullable();
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
