<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Uuid;

class UserController extends Controller {

// Views

	// View the user profile page.

	public function viewReadOne($id){

		$user = User::findOrFail($id);

		return view('user.viewReadOne')
			->with('user', $user);

	}

	// View the user edit page.

	public function viewUpdate($id){

		$user = User::findOrFail($id);

		return view('user.viewUpdate')
			->with('user', $user);

	}

// Actions

	// Update the user table in the database.

	public function actionUpdate($id, Requests\UpdateUserRequest $request){

		$user = User::findOrFail($id);

		$user->update($request->all());

		return redirect('/user/'.$id);

	}

	// Upload an image.

	public function actionUploadImage($id, Requests\UploadImageRequest $request){

		$user = User::findOrFail($id);

		$destinationPath = 'uploads';

		$extension = $request->file('image')->getClientOriginalExtension();

		$fileName = Uuid::generate(4).'.'.$extension;

		$request->file('image')->move($destinationPath, $fileName);

		$user->image = $fileName;

		$user->save();

		return redirect('/user/'.$id);

	}
	
}