<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Project extends Model
{
    use Translatable;

protected $translatable = ['title', 'body', 'slug', 'meta_description','image_title','image_alt'];

protected static function boot(){

    parent::boot();

    static::creating(function ($project) {

        $project->slug = uniqid(true);
    });
}



 public function categories()
    {
        return $this->belongsToMany('App\Category');
    }


            public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }



}
