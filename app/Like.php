<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	// Database used by the model.

	protected $table = 'likes';

	// Attributes that are mass assignable.

	protected $fillable = [

	];

	// A like belongs to a user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// A like belongs to a photo.

	public function photo(){
		return $this->belongsTo('App\Photo');
	}
	
}