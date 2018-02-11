<?php

namespace App\Tasks;

/**
 * Class Thing which represents the "task"
 * 
 * The classes below it represent the different small steps that are performed when
 * a task is needed to be done. Now you are able to loop through them and execute them 
 * step by step.
 */

class Thing
{

	 public function handle()
	 {
		  $tasks = [
				DoThis::class,
				DoThat::class,
				RunSomething::class,
				EraseSomething::class,
				FinishUp::class
		  ];

		  foreach ($tasks as $task) {
				(new $task)->handle();
		  }
	 }
}

class DoThis
{

	 public function handle()
	 {
	 	 
	 }
}

class DoThat
{

	 public function handle()
	 {

	 }
}

class RunSomething
{

	 public function handle()
	 {

	 }
}

class EraseSomething
{

	 public function handle()
	 {

	 }
}

class FinishUp
{

	 public function handle()
	 {

	 }
}