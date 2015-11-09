<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;
use App\Tag;
use App\User;

use Auth;
use Uuid;

class PhotoController extends Controller {

// Views

	// View the create photo page.

	public function viewCreate(){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find all tags in database.

		$tags = Tag::all();

		// Return view with variables.

		return view('photos.viewCreate')
			->with('tags', $tags)
			->with('authUser', $authUser);

	}

	// View all photos.

	public function viewReadAll(){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find photos in database.

		$photos = Photo::latest('id')->get();

		// foreach($photos as $photo){
		// 	$id = $photo->user_id;
		// 	$user = User::findOrFail($id);
		// }

		// foreach($photos as $photo){
		// 	$comments = $photo->comments;
		// 	foreach($comments as $comment){
		// 		$userId = $comment->user_id;
		// 		$commentUser = User::findOrFail($userId);
		// 	}
		// }

		// Return view with variables.

		return view('photos.viewReadAll')
			->with('photos', $photos)
			->with('authUser', $authUser);
			// ->with('user', $user)
			// ->with('commentUser', $commentUser);
	}

	// View a single photo page.

	public function viewReadOne($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find photo in database.

		$photo = Photo::findOrFail($id);

		// Return view with variables.

		return view('photos.viewReadOne')
			->with('photo', $photo)
			->with('authUser', $authUser);

	}

	// View photo edit page.

	public function viewUpdate($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find photo in database.

		$photo = Photo::findOrFail($id);

		// Find the photo's user in database, set to variable.

		$userId = $photo->user_id;

		$user = User::findOrFail($userId);

		// Find all tags in database.

		$tags = Tag::all();

		// Return view with variables.

		return view('photos.viewUpdate')
			->with('photo', $photo)
			->with('tags', $tags)
			->with('authUser', $authUser)
			->with('user', $user);

	}

// Actions

	// Create a photo and save to the database.

	public function actionCreate(Requests\CreatePhotoRequest $request){

		// Create a new model and populate it with the request.

		$photo = new Photo($request->all());

		// Check to see if image exists and is valid
		// Redirect with flash message if not.

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

			return redirect('/photos');
		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');

			return redirect('/photos');
		}

		// Set destination path.

		$destinationPath = 'uploads';

		// Set extension.

		$extension = $request->file('image')->getClientOriginalExtension();

		// Set file name.

		$fileName = Uuid::generate(4).'.'.$extension;

		// Move file to destination path.

		$request->file('image')->move($destinationPath, $fileName);

		// Set file name as photo's image.

		$photo->image = $fileName;

		// Save photo.

		Auth::user()->photos()->save($photo);

		// Attach tags to photo.

		$tags = $request->input('tags');

		$photo->tags()->attach($tags);

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully created a photo.');

		return redirect('photos');

	}

	// Update a photo in the database.

	public function actionUpdate($id, Requests\UpdatePhotoRequest $request){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find photo in database.

		$photo = Photo::where('user_id', '=', $authUser->id)
			->findOrFail($id);

		// Update photo in database.

		$photo->update($request->all());

		// Sync tags to photo.

		$tags = $request->input('tags');

		$photo->tags()->sync($tags);

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully updated a photo.');

		return redirect('/photos/'.$photo->id);

	}

	// Delete a photo from the database.

	public function actionDelete($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find photo in database.

		$photo = Photo::where('user_id', '=', $authUser->id)
			->findOrFail($id);

		// Delete photo from database.

		$photo->delete($photo);

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully deleted a photo.');

		return redirect('photos');

	}	

}