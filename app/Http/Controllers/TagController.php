<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;

use Auth;

class TagController extends Controller {

// Views

	// View the page to create a new tag.

	public function viewCreate(){

		$user = Auth::user();

		return view('tags.viewCreate')
			->with('user', $user);

	}

	// View the page to read all tags.

	public function viewReadAll(){

		$user = Auth::user();

		$tags = Tag::orderBy('name', 'asc')->get();

		return view('tags.viewReadAll')
			->with('tags', $tags)
			->with('user', $user);

	}

	// View the page to read one tag.

	public function viewReadOne($id){

		$user = Auth::user();

		$tag = Tag::findOrFail($id);

		return view('tags.viewReadOne')
			->with('tag', $tag)
			->with('user', $user);

	}

	// View the page to update a tag.

	public function viewUpdate($id){

		$user = Auth::user();

		$tag = Tag::findOrFail($id);

		return view('tags.viewUpdate')
			->with('tag', $tag)
			->with('user', $user);

	}

// Actions

	// Create a new tag in the database.

	public function actionCreate(Requests\CreateTagRequest $request){

		$tag = new Tag($request->all());

		$tag->save();

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully created a tag.');

		return redirect('tags');

	}

	// Update an existing tag in the database.

	public function actionUpdate($id, Requests\UpdateTagRequest $request){

		$tag = Tag::findOrFail($id);

		$tag->update($request->all());

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully updated a tag.');

		return redirect('/tags/'.$tag->id);

	}

	// Delete a tag from the database.

	public function actionDelete(){

	}
	
}