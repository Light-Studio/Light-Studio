<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use Laravel\Scout\Searchable;
use TCG\Voyager\Traits\HasRelationships;

class Post extends Model
{
    use Searchable;
    use Resizable;
    use HasRelationships;


    public function searchableAs()
    {
        return config('scout.prefix').'posts';
    }

public function toSearchableArray()
{
  /**
   * Load the categories relation so that it's available
   *  in the laravel toArray method
   */
  $this->tags;

  return $this->toArray();
}


    const PUBLISHED = 'PUBLISHED';

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->id;
        }

        parent::save();
    }

    public function authorId()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'author_id', 'id');
    }

    /**
    public function category()
    {
    return $this->belongsTo('App\User');
    }

     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}