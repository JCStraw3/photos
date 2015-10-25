<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller {

	public function viewReadOne($id){

		$user = User::findOrFail($id);

		return view('user.viewReadOne')
			->with('user', $user);

	}

	public function viewUpdate($id){

		$user = User::findOrFail($id);

		return view('user.viewUpdate')
			->with('user', $user);

	}

	public function actionUpdate($id, Requests\UpdateUserRequest $request){

		$user = User::findOrFail($id);

		$user->update($request->all());

		return redirect('/user/'.$id);

	}
	
}