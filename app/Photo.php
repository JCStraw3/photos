<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	// Databse table used by the model.

	protected $table = 'photos';

	// Attributes that are mass assignable.

	protected $fillable = [
		'title',
		'description',
		'private',
		'image',
	];

	// A photo belongs to a user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// A photo has many tags.

	public function tags(){
		return $this->belongsToMany('App\Tag');
	}

	// A photo has many comments.

	public function comments(){
		return $this->hasMany('App\Comment');
	}

	// A photo has many likes.

	public function likes(){
		return $this->hasMany('App\Like');
	}
	
}