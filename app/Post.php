<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
  
    protected $fillable = [
        'title', 'description', 'user_id'
    ];


    /**
     * here if the user is capital it makes problem?
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
