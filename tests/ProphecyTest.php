<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProphecyTest extends TestCase
{

	 /**
	  * A basic test example.
	  *
	  * @return void
	  */
	 public function testExample()
	 {
		  $this->assertTrue(true);
	 }

	 /**
	  * @test
	  */
	 public function test_something()
	 {
		  $directive = $this->prophesize(BladeDirective::class);

		  $directive->foo('bar')->shouldBeCalled()->willReturn('foobar');

		  // Fetch the underlying object being prophesized
		  $response = $directive->reveal()->foo('bar');

		  $this->assertEquals('foobar', $response);
	 }

	 /**
	  * @test
	  */
	 public function it_normalizes_a_string_for_the_cache_key()
	 {
		  $cache = $this->prophesize(RussianCache::class);
		  $directive = new BladeDirective($cache->reveal());

		  $cache->has('cache-key')->shouldBeCalled();

		  $directive->setUp('cache-key');
	 }

	 /**
	  * @test
	  */
	 public function it_normalizes_an_array_for_the_cache_key()
	 {
		  $cache = $this->prophesize(RussianCache::class);
		  $directive = new BladeDirective($cache->reveal());

		  $item = ['foo', 'bar'];

		  $cache->has(md5('foobar'))->shouldBeCalled();

		  $directive->setUp($item);
	 }

	 /**
	  * @test
	  */
	 public function guys_prophecy_test()
	 {
		  $keys = $this->prophesize(CarKeys::class);
		  $car = new Car($keys->reveal());
		  
		  $keys->turn()->shouldBeCalled();
		  
		  $car->turnOn();
	 }
}

class CarKeys
{

	 public function turn()
	 {
		  var_dump('turning car keys');
	 }
}

class Car
{

	 /**
	  * @var CarKeys
	  */
	 private $keys;

	 public function __construct(CarKeys $keys)
	 {
		  $this->keys = $keys;
	 }

	 public function turnOn()
	 {
		  $this->keys->turn();
	 }
}

class ModelStub
{

	 public function getCacheKey()
	 {
		  return 'stub-cache-key';
	 }
}

class BladeDirective
{

	 /**
	  * @var RussianCache
	  */
	 private $cache;

	 public function __construct(RussianCache $cache)
	 {
		  $this->cache = $cache;
	 }

	 public function setUp($key)
	 {
		  $this->cache->has(
				$this->normalizeKey($key)
		  );
	 }

	 public function foo()
	 {
		  return 'foobar';
	 }

	 private function normalizeKey($item)
	 {
		  if ( is_object($item) && method_exists($item, 'getCacheKey') ) {
				return $item->getCacheKey();
		  }

		  if ( is_array($item) ) {
				return md5(implode($item));
		  }

		  return $item;
	 }
}

class RussianCache
{

	 public function has()
	 {

	 }
}