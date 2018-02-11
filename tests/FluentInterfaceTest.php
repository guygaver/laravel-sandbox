<?php

class FluentInterfaceTest extends TestCase
{

	 public function testBasicExample()
	 {
		  $result = $this->call();

		  $this->assertContains('needle', $result);
	 }

	 protected function visit()
	 {
		  // perform an action
		  
		  return $this;
	 }

	 protected function see()
	 {
		  return $this;
	 }
}