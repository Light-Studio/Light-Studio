<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\HasRelationships;

class Tag extends Model
{

	use	HasRelationships;


    protected $table = 'tags';

    protected $fillable = ['slug', 'name'];


     public function posts()
    {
        return $this->belongsToMany('App\Post');

    }

    public function getRouteKeyName(){


        return 'name';
    }

}
