<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	public $primaryKey = 'id';

    protected $fillable = ['blog_title', 'blog_text', 'blog_posted_at', 'blog_posted_by'];
    
    CONST CREATED_AT = 'blog_created_at';

    CONST UPDATED_AT = 'blog_updated_at';

    public function categories(){
    	return $this->belongsToMany(\App\Category::class);
    }

    public function user(){
    	return $this->belongsTo(\App\User::class, 'blog_posted_by');
    }
}
