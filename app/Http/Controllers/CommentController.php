<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Photo;

use Auth;

class CommentController extends Controller {

// Actions

	// Create a comment.

	public function actionCreate(Requests\CreateCommentRequest $request){

		$comment = new Comment($request->all());

		$photo = Photo::findOrFail($request->input('photo_id'));

		$comment = $photo->comments()->save($comment);

		Auth::user()->comments()->save($comment);

		return redirect('/photos');

	}
	
}