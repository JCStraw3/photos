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

		$authUser = Auth::user();

		$tags = Tag::all();

		return view('photos.viewCreate')
			->with('tags', $tags)
			->with('authUser', $authUser);

	}

	// View all photos.

	public function viewReadAll(){

		$authUser = Auth::user();

		$photos = Photo::latest('id')->get();

		return view('photos.viewReadAll')
			->with('photos', $photos)
			->with('authUser', $authUser);
	}

	// View a single photo page.

	public function viewReadOne($id){

		$authUser = Auth::user();

		$photo = Photo::findOrFail($id);

		return view('photos.viewReadOne')
			->with('photo', $photo)
			->with('authUser', $authUser);

	}

	// View photo edit page.

	public function viewUpdate($id){

		$authUser = Auth::user();

		$photo = Photo::findOrFail($id);

		$tags = Tag::all();

		return view('photos.viewUpdate')
			->with('photo', $photo)
			->with('tags', $tags)
			->with('authUser', $authUser);

	}

// Actions

	// Create a photo and save to the database.

	public function actionCreate(Requests\CreatePhotoRequest $request){

		$photo = new Photo($request->all());

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

			return redirect('/photos');
		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');

			return redirect('/photos');
		}

		$destinationPath = 'uploads';

		$extension = $request->file('image')->getClientOriginalExtension();

		$fileName = Uuid::generate(4).'.'.$extension;

		$request->file('image')->move($destinationPath, $fileName);

		$photo->image = $fileName;

		Auth::user()->photos()->save($photo);

		$tags = $request->input('tags');

		$photo->tags()->attach($tags);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully created a photo.');

		return redirect('photos');

	}

	// Update a photo in the database.

	public function actionUpdate($id, Requests\UpdatePhotoRequest $request){

		$authUser = Auth::user();

		$photo = Photo::where('user_id', '=', $authUser->id)
			->findOrFail($id);

		$photo->update($request->all());

		$tags = $request->input('tags');

		$photo->tags()->sync($tags);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully updated a photo.');

		return redirect('/photos/'.$photo->id);

	}

	// Delete a photo from the database.

	public function actionDelete($id){

		$authUser = Auth::user();

		$photo = Photo::where('user_id', '=', $authUser->id)
			->findOrFail($id);

		$photo->delete($photo);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully deleted a photo.');

		return redirect('photos');

	}	

}