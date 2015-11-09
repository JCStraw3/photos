<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Photo;
use App\User;

use Auth;

class CommentController extends Controller {

// Views

	// View all comments by a specific user.

	public function viewReadAll(){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find user's comments in database.

		$comments = Comment::where('user_id', '=', $authUser->id)
			->latest('id')
			->get();

		// Find comment's user in database.

		foreach($comments as $comment){

			$id = $comment->user_id;

			$user = User::findOrFail($id);
		}

		// foreach($comments as $comment){

		// 	$id = $comment->photo_id;

		// 	$photo = Photo::findOrFail($id);
		// }

		// Return view with variables.

		return view('comments.viewReadAll')
			->with('comments', $comments)
			->with('authUser', $authUser)
			->with('user', $user);
			// ->with('photo', $photo);

	}

	// View page to edit a comment.

	public function viewUpdate($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find comment in database.

		$comment = Comment::findOrFail($id);

		// Find the comment's user in database, set to variable.

		$userId = $comment->user_id;

		$user = User::findOrFail($userId);

		// If logged in user does not own photo, return error.

		if($authUser->id !== $user->id){
			return view('errors.403');
		}

		// Return view with variables.

		return view('comments.viewUpdate')
			->with('comment', $comment)
			->with('authUser', $authUser)
			->with('user', $user);

	}

// Actions

	// Create a comment in the database.

	public function actionCreate(Requests\CreateCommentRequest $request){

		// Create a new model instance and populate it with the request.

		$comment = new Comment($request->all());

		// Find in the database the photo sent with the request.

		$photo = Photo::findOrFail($request->input('photo_id'));

		// Attach the comment to the photo.

		$comment = $photo->comments()->save($comment);

		// Save the comment in the database.

		Auth::user()->comments()->save($comment);

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully commented on a photo.');

		return redirect('/photos');

	}

	// Uodate a comment in the database.

	public function actionUpdate($id, Requests\UpdateCommentRequest $request){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find comment in database.

		$comment = Comment::where('user_id', '=', $authUser->id)
			->findOrFail($id);

		// Update comment in database.

		$comment->update($request->all());

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully updated your comment.');

		return redirect('/photos');

	}

	// Delete a comment from the database.

	public function actionDelete($id){

		// Set logged in user to a variable.

		$authUser = Auth::user();

		// Find comment in database.

		$comment = Comment::where('user_id', '=', $authUser->id)
			->findOrFail($id);

		// Delete comment from database.

		$comment->delete($comment);

		// Redirect with flash message.

		\Session::flash('flash_message', 'You have successfully deleted your comment.');

		return redirect('/photos');

	}
	
}