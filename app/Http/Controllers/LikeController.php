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

		$user = Auth::user();

		$likes = Like::where('user_id', '=', $user->id)
			->latest('id')
			->get();

		return view('likes.viewReadAll')
			->with('likes', $likes)
			->with('user', $user);

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