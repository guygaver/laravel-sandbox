<?php

namespace App;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

	 /**
	  * The filter scope will have an apply method which will build upon the query builder
	  * and add the extra queries if they exist in the filters class
	  */
	 
	 public function scopeFilter($query, QueryFilter $filters)
	 {
		  return $filters->apply($query);
    }
}
