<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;

class SearchController extends Controller {

	public function actionSearch(Request $request){

		$query = Request::input('search');

		$results = Photo::where('name', 'LIKE', '%' .$query. '%')->get();

		return view('search')->with('results', $results);

	}
	
}