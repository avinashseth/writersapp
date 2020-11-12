<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function user() {

        return $this->belongsTo(User::class);

    }
    public function getCreatedAtAttribute($string) {

        return date("F jS, Y", strtotime($string));

    }

    public function comments() {

        return $this->hasMany(Comment::class);

    }
    
    function setPostSlugAttribute($string) {

        $this->attributes['post_slug'] = \Str::slug($string);

    }
}
