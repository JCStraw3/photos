<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Photo;

use Auth;

class CommentController extends Controller {

// Views

	// View all comments by a specific user.

	public function viewReadAll(){

		$user = Auth::user();

		$comments = Comment::where('user_id', '=', $user->id)
			->latest('id')
			->get();

		return view('comments.viewReadAll')
			->with('comments', $comments)
			->with('user', $user);

	}

	// View page to edit a comment.

	public function viewUpdate($id){

		$user = Auth::user();

		$comment = Comment::findOrFail($id);

		return view('comments.viewUpdate')
			->with('comment', $comment)
			->with('user', $user);

	}

// Actions

	// Create a comment in the database.

	public function actionCreate(Requests\CreateCommentRequest $request){

		$comment = new Comment($request->all());

		$photo = Photo::findOrFail($request->input('photo_id'));

		$comment = $photo->comments()->save($comment);

		Auth::user()->comments()->save($comment);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully commented on a photo.');

		return redirect('/photos');

	}

	// Uodate a comment in the database.

	public function actionUpdate($id, Requests\UpdateCommentRequest $request){

		$user = Auth::user();

		$comment = Comment::where('user_id', '=', $user->id)
			->findOrFail($id);

		$comment->update($request->all());

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully updated your comment.');

		return redirect('/photos');

	}

	// Delete a comment from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$comment = Comment::where('user_id', '=', $user->id)
			->findOrFail($id);

		$comment->delete($comment);

		return redirect('/photos');

	}
	
}