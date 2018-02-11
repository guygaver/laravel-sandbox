<?php

namespace App\Http\Controllers;

use App\Filters\LessonFilters;
use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{

	 /**
	  * A start is to create a scope filter under the related model. This will
	  * connect the functionality
	  * 
	  * You can abstract the filters logic into its own classes
	  */
	 
	 
	 public function get(LessonFilters $filters)
	 {
		  return Lesson::filter($filters)->get();
	 }
}
