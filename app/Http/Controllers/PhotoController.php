<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;
use App\Tag;

use Auth;
use Uuid;

class PhotoController extends Controller {

// Views

	// View the create photo page.

	public function viewCreate(){

		$user = Auth::user();

		$tags = Tag::all();

		return view('photos.viewCreate')
			->with('tags', $tags)
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

	public function viewReadOne($id){

		$user = Auth::user();

		$photo = Photo::findOrFail($id);

		return view('photos.viewReadOne')
			->with('photo', $photo)
			->with('user', $user);

	}

	// View photo edit page.

	public function viewUpdate($id){

		$user = Auth::user();

		$photo = Photo::findOrFail($id);

		$tags = Tag::all();

		return view('photos.viewUpdate')
			->with('photo', $photo)
			->with('tags', $tags)
			->with('user', $user);

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

		$tags = $request->input('tags');

		$photo->tags()->attach($tags);

		return redirect('photos');

	}

	// Update a photo in the database.

	public function actionUpdate($id, Requests\UpdatePhotoRequest $request){

		$user = Auth::user();

		$photo = Photo::where('user_id', '=', $user->id)
			->findOrFail($id);

		$photo->update($request->all());

		$tags = $request->input('tags');

		$photo->tags()->sync($tags);

		return redirect('/photos/'.$photo->id);

	}

	// Delete a photo from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$photo = Photo::where('user_id', '=', $user->id)
			->findOrFail($id);

		$photo->delete($photo);

		return redirect('photos');

	}	

}