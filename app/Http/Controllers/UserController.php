<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Auth;
use Uuid;

class UserController extends Controller {

// Views

	// View the user profile page.

	public function viewReadOne($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find the user in the database.

		$user = User::findOrFail($id);

		// Set user's photos into variable.

		$photos = $user->photos;

		// Return view with variables.

		return view('user.viewReadOne')
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