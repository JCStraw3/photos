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

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find user's likes in database.

		$likes = Like::where('user_id', '=', $authUser->id)
			->latest('id')
			->get();

		// foreach($likes as $like){
		// 	$id = $like->photo_id;
		// 	$photo = Photo::findOrFail($id);
		// }

		// Return view with variables.

		return view('likes.viewReadAll')
			->with('likes', $likes)
			->with('authUser', $authUser);
			// ->with('photo', $photo);

	}

// Actions

	// Create a like in the database.

	public function actionCreate(Requests\CreateLikeRequest $request){

		// Create a new model instance and populate it with the request.

		$like = new Like($request->all());

		// Find in the database the photo sent with the request.

		$photo = Photo::findOrFail($request->input('photo_id'));

		// Attach the like to the photo.

		$like = $photo->likes()->save($like);

		// Save the like in the database.

		Auth::user()->likes()->save($like);

		// Redirect.

		return redirect('/photos');
		
	}
	
}