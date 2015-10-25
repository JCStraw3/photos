<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller {

	public function viewReadAll(){
		return view('photos.viewReadAll');
	}
	
}