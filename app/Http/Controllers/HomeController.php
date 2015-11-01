<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class HomeController extends Controller {

	public function viewHome(){

		// Check to see if user is logged in.

		$user = Auth::user();

		// If user is not logged in, return home page.

		if(!$user){
			return view('viewHome');
		}

		// If user is logged in, redirect to photos page.

		return redirect('photos');
	}
	
}