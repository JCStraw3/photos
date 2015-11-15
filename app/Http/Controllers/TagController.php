<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use App\Photo;

use Auth;

class TagController extends Controller {

// Views

	// View the page to create a new tag.

	public function viewCreate(){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Return view with variables.

		return view('tags.viewCreate')
			->with('authUser', $authUser);

	}

	// View the page to read all tags.

	public function viewReadAll(){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find all tags in database.

		$tags = Tag::orderBy('name', 'asc')->get();

		// Return view with variables.

		return view('tags.viewReadAll')
			->with('tags', $tags)
			->with('authUser', $authUser);

	}

	// View the page to read one tag's public photos.

	public function viewReadOne($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find tag in database.

		$tag = Tag::findOrFail($id);

		// Set tag photos into variable.

		$photos = $tag->photos;

		// Return view with variables.

		return view('tags.viewReadOne')
			->with('tag', $tag)
			->with('photos', $photos)
			->with('authUser', $authUser);

	}

	// View the page to read one tag's public and private photos.

	public function viewReadOneAll($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find tag in database.

		$tag = Tag::findOrFail($id);

		// Set tag photos into variable.

		$photos = $tag->photos;

		// Return view with variables.

		return view('tags.viewReadOneAll')
			->with('tag', $tag)
			->with('photos', $photos)
			->with('authUser', $authUser);

	}

	// View the page to update a tag.

	public function viewUpdate($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find tag in database.

		$tag = Tag::findOrFail($id);

		// Return view with variables.

		return view('tags.viewUpdate')
			->with('tag', $tag)
			->with('authUser', $authUser);

	}

// Actions

	// Create a new tag in the database.

	public function actionCreate(Requests\CreateTagRequest $request){

		// Create a new model instance and populate it with the request.

		$tag = new Tag($request->all());

		// Save tag in database.

		$tag->save();

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully created a tag.');

		return redirect('tags');

	}

	// Update an existing tag in the database.

	public function actionUpdate($id, Requests\UpdateTagRequest $request){

		// Find tag in database.

		$tag = Tag::findOrFail($id);

		// Update tag in database.

		$tag->update($request->all());

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully updated a tag.');

		return redirect('/tags/'.$tag->id);

	}

	// Delete a tag from the database.

	public function actionDelete(){

	}
	
}