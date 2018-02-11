<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 *
 * Controllers will extend Controller which has higher level functionality
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    public function home()
	 {
		  $people = ['Taylor', 'Matt', 'Jeffrey'];

		  // Laravel has multiple ways of returning view variables shown below
		  return view('welcome', ['people' => $people]);
		  //	 return view('welcome')->with('people', $people);
		  //	 return view('welcome', compact('people'));
	 }

	 public function about()
	 {
		  return view('pages.about');
	 }
}
