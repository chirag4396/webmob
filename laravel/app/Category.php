<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $primaryKey = 'id';

	protected $fillable = ['title'];

	public $timestamps = false;

	public function blogs(){
		return $this->belongsToMany(\App\Blog::class);
	}
}
