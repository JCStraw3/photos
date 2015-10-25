<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	// Database table used by the model.

	protected $table = 'tags';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// A tag has many photos.

	public function photos(){
		return $this->belongsToMany('App\Photo');
	}
	
}