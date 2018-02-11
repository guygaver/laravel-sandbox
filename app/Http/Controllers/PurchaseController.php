<?php
/**
 * Example use case
 *
 * Check Out Item (feature)
 *
 * 1. Cashier swipes product over scanner
 * 2. Price and description of item, as well as current subtotal, appear on display facing customer. As well as display
 * of cashier
 * 3. Price and description are printed on receipt.
 * 4. System emits an audible "acknowledgement" tone to tell the cashier that the UPC code was correctly read
 */

/**
 * When you have a domain event that contains multiple steps it is sometimes good to wrap the logic within a 
 * use case. 
 * 
 * For steps like publishing a post or saving a form this is mostly overkill so know when you need to have a usecase and when you dont.
 * 
 * Within the usecase class you can handle whatever logic needs to happen
 */
namespace App\Http\Controllers;

use App\Jobs\PurchasePodcast;
use Illuminate\Http\Request;

use App\Http\Requests;

class PurchaseController extends Controller
{

	 public function store()
	 {
//		  PurchasePodcast::perform();
		  
		  dispatch(new PurchasePodcast);

		  return 'done';
	 }
}