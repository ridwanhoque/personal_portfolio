<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
	
	public function Category(){
		return $this->belongs_to('Category');
	}
	
}