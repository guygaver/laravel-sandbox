<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotification;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

	 public function index(Request $request)
	 {
		  // Handling simple jobs is easy just dispatch
		  $job = new SendNotification("HOwdy");
		  $this->dispatch($job);

		  return 'done';
	 }
}
