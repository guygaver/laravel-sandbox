<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/phpunit')
             ->see('Laravel 5');
    }

	 public function testClickToRedirect()
	 {
		  $this->visit('/phpunit-click')
				->click('Click Me')
				->seePageIs('/phpunit-redirect')
		  		->see("You've been clicked punk");
	 }
}
