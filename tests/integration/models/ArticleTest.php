<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{

	 /**
	  * When you are working with integration tests, you will usually be creating records on the fly.
	  * Simply by adding DatabaseTransactions to your classes, it will automatically wrap any database calls within 
	  * a transaction and rollback after the test is completed. Keeping your world the same everytime.
	  */
	 use DatabaseTransactions;
	 
	 /**
	  * @test
	  */
	 function it_fetches_trending_articles()
	 {
		  /**
			* Assert that each test has the same world. Below we are creating model records each time.
			* This will cause the DB to unnecessarily grow very large and the test will have a different assertion value
			* in this case everytime. We must keep the "world" the same each time.
			*/
		  // Given
		  factory(\App\Article::class, 2)->create();
		  factory(\App\Article::class)->create(['reads' => 10]);
		  $mostPopular = factory(\App\Article::class)->create(['reads' => 20]);
		  
		  // When
		  $articles = \App\Article::trending();
		  
		  // Then
		  $this->assertEquals($mostPopular->id, $articles->first()->id);
		  $this->assertCount(3, $articles);
	 }
}