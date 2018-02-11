<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * This class is the base class for a filter.
 * 
 * Adding these methods allow use to extend any future filters and be able
 * to implement them within the model filters method
 */
abstract class QueryFilter
{
	 protected $request;
	 
	 protected $builder;

	 public function __construct(Request $request)
	 {
		  $this->request = $request;
	 }

	 /**
	  * Returns array of potential filters from request
	  * 
	  * @return array
	  */
	 public function filters()
	 {
		  return $this->request->all();
	 }

	 /**
	  * Loops through potential filters and calls their related method
	  * in the Filters class for the model in question
	  * 
	  * @param Builder $builder
	  * @return Builder
	  */
	 public function apply(Builder $builder)
	 {
		  $this->builder = $builder;

		  foreach ($this->filters() as $name => $value) {
				if (method_exists($this, $name)) {
					 call_user_func_array([$this, $name], array_filter([$value]));
				}
		  }
		  
		  return $this->builder;
	 }
}