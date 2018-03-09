<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\HasRelationships;

class enTag extends Model
{

	use	HasRelationships;


    protected $table = 'en_tags';

    protected $fillable = ['slug', 'name'];


     public function posts()
    {
        return $this->belongsToMany('App\enPost');

    }

    public function getRouteKeyName(){


        return 'name';
    }

}
