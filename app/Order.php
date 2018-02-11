<?php

namespace App;

class Order
{

	 protected $products = [];

	 public function add($product)
	 {
		  array_push($this->products, $product);
	 }

	 public function products()
	 {
		  return $this->products;
	 }

	 public function total()
	 {
		  return array_reduce($this->products, function($total, $product) {
		  	 return $total + $product->price;
		  });
	 }
}