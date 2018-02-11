<?php

namespace App\Filters;

/**
 * Now with the foundation and abstraction set up for filters,
 * we are able to create a filter method for each potential filter.
 * This allows us to do any complex relationship and pivot style queries
 * without bloating a trait or some other place
 */
class LessonFilters extends QueryFilter
{

	 /**
	  * Popular lessons
	  * 
	  * @param string $order
	  * @return mixed
	  */
	 public function popular($order = 'desc')
	 {
	 	 return $this->builder->orderBy('views', $order);
	 }

	 /**
	  * Lesson difficulty 
	  * 
	  * @param $level
	  * @return mixed
	  */
	 public function difficulty($level)
	 {
		  return $this->builder->where('difficulty', $level);
	 }
	 
	 
}