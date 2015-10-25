<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	// Database used by the model.

	protected $table = 'comments';

	// Attributes that are mass assignable.

	protected $fillable = [
		'comment',
	];

	// A comment belongs to a user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// A comment belongs to a photo.

	public function photo(){
		return $this->belongsTo('App\Photo');
	}
	
}