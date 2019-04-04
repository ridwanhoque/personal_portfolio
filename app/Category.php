<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Category extends Model
{
    protected $fillable = ['name','description','flag'];
	
	public function projects(){
		return $this->hasMany('App\Project');
	}
	
	
}
