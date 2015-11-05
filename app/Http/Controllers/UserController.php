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

		$authUser = Auth::user();

		$user = User::findOrFail($id);

		$photos = $user->photos;

		return view('user.viewReadOne')
			->with('authUser', $authUser)
			->with('user', $user)
			->with('photos', $photos);

	}

	// View the user edit page.

	public function viewUpdate($id){

		$authUser = Auth::user();

		$user = User::findOrFail($id);

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

		// Send flash message and redirect.

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
		// If not, redirect with flash message

		if($authUser->id !== $user->id){
			\Session::flash('flash_message', 'You are not authorized to edit this profile.');

			return redirect('/user/'.$id);
		}

		// Check to see if image is exists and is valid
		// If not, redirect with flash message

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

			return redirect('/user/'.$id);
		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');

			return redirect('/user/'.$id);
		}

		// Upload a photo and save to the database.

		$destinationPath = 'uploads';

		$extension = $request->file('image')->getClientOriginalExtension();

		$fileName = Uuid::generate(4).'.'.$extension;

		$request->file('image')->move($destinationPath, $fileName);

		$user->image = $fileName;

		$user->save();

		// Send flash message and redirect.

		\Session::flash('flash_message', 'You have successfully uploaded a user photo.');

		return redirect('/user/'.$id);

	}
	
}