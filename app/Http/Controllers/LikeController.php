<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Like;
use App\Photo;

use Auth;

class LikeController extends Controller {

// Views

	// View page to read all likes.

	public function viewReadAll(){

		$authUser = Auth::user();

		$likes = Like::where('user_id', '=', $authUser->id)
			->latest('id')
			->get();

		// foreach($likes as $like){
		// 	$id = $like->photo_id;
		// 	$photo = Photo::findOrFail($id);
		// }

		return view('likes.viewReadAll')
			->with('likes', $likes)
			->with('authUser', $authUser);
			// ->with('photo', $photo);

	}

// Actions

	// Create a like in the database.

	public function actionCreate(Requests\CreateLikeRequest $request){

		$like = new Like($request->all());

		$photo = Photo::findOrFail($request->input('photo_id'));

		$like = $photo->likes()->save($like);

		Auth::user()->likes()->save($like);

		return redirect('/photos');
		
	}
	
}