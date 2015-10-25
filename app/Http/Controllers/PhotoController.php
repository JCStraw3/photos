<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;

use Auth;
use Uuid;

class PhotoController extends Controller {

// Views

	// View the create photo page.

	public function viewCreate(){

		$user = Auth::user();

		return view('photos.viewCreate')
			->with('user', $user);

	}

	// View all photos.

	public function viewReadAll(){

		$user = Auth::user();

		$photos = Photo::latest('id')->get();

		return view('photos.viewReadAll')
			->with('photos', $photos)
			->with('user', $user);
	}

	// View a single photo page.

	public function viewReadOne(){

	}

	// View photo edit page.

	public function viewUpdate(){

	}

// Actions

	// Create a photo and save to the database.

	public function actionCreate(Requests\CreatePhotoRequest $request){

		$photo = new Photo($request->all());

		$destinationPath = 'uploads';

		$extension = $request->file('image')->getClientOriginalExtension();

		$fileName = Uuid::generate(4).'.'.$extension;

		$request->file('image')->move($destinationPath, $fileName);

		$photo->image = $fileName;

		Auth::user()->photos()->save($photo);

		return redirect('photos');

	}

	// Update a photo in the database.

	public function actionUpdate(){

	}

	// Delete a photo from the database.

	public function actionDelete(){

	}	

}