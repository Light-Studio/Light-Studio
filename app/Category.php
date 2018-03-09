<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
	use Translatable;

	protected $translatable = ['name'];

     public function projects()
    {
        return $this->belongsToMany('App\Project');

    }

    public function getRouteKeyName(){

        return 'name';
    }

}
