<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Photo;

use Auth;
use Uuid;

class UserController extends Controller {

// Views

	// View all users.

	public function viewReadAll(){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find all users in the database.

		$users= User::all();

		// Return view with variables.

		return view('user.viewReadAll')
			->with('authUser', $authUser)
			->with('users', $users);

	}

	// View a user's profile page as the user.

	public function viewReadOne($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find the user in the database.

		$user = User::findOrFail($id);

		// If logged in user does not own profile, return error.

		if($authUser->id !== $user->id){
			return view('errors.403');
		}

		$photos = Photo::where('user_id', '=', $user->id)
			->latest('id')
			->paginate(12);

		// Return view with variables.

		return view('user.viewReadOne')
			->with('authUser', $authUser)
			->with('user', $user)
			->with('photos', $photos);

	}

	// View a user's profile page as not the user.

	public function viewReadOnePublic($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find the user in the database.

		$user = User::findOrFail($id);

		$photos = Photo::where('user_id', '=', $user->id)
			->where('private', '=', 0)
			->latest('id')
			->paginate(12);

		// Return view with variables.

		return view('user.viewReadOnePublic')
			->with('authUser', $authUser)
			->with('user', $user)
			->with('photos', $photos);

	}

	// View the user edit page.

	public function viewUpdate($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find the user in the database.

		$user = User::findOrFail($id);

		// If logged in user does not own photo, return error.

		if($authUser->id !== $user->id){
			return view('errors.403');
		}

		// Return view with variables.

		return view('user.viewUpdate')
			->with('authUser', $authUser)
			->with('user', $user);

	}

// Actions

	// Update the user table in the database.

	public function actionUpdate($id, Requests\UpdateUserRequest $request){

		// Set logged in user into a variable.

		$authUser = Auth::user();

		// Find the user in the database.

		$user = User::findOrFail($id);

		// Check to see if user profile belongs to logged in user
		// If not, redirect with flash message

		if($authUser->id !== $user->id){
			\Session::flash('flash_message', 'You are not authorized to edit this profile.');

			return redirect('/user/'.$id);
		}

		// Save user in the database.

		$user->update($request->all());

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully updated your user profile.');

		return redirect('/user/'.$id);

	}

	// Upload an image.

	public function actionUploadImage($id, Requests\UploadImageRequest $request){

		// Set logged in user into a variable.

		$authUser = Auth::user();

		// Find the user in the database.

		$user = User::findOrFail($id);

		// Check to see if user profile belongs to logged in user
		// If not, redirect with flash message.

		if($authUser->id !== $user->id){
			\Session::flash('flash_message', 'You are not authorized to edit this profile.');

			return redirect('/user/'.$id);
		}

		// Check to see if image is exists and is valid
		// If not, redirect with flash message.

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

			return redirect('/user/'.$id);
		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');

			return redirect('/user/'.$id);
		}

		// Set destination path.

		$destinationPath = 'uploads';

		// Set extension.

		$extension = $request->file('image')->getClientOriginalExtension();

		// Set file name.

		$fileName = Uuid::generate(4).'.'.$extension;

		// Move file to destination path.

		$request->file('image')->move($destinationPath, $fileName);

		// Set file name as user's image.

		$user->image = $fileName;

		// Save user.

		$user->save();

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully uploaded a user photo.');

		return redirect('/user/'.$id);

	}
	
}