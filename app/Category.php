<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','body'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopefindIdSlug($query, $slug)
    {
        return $query->where('slug', $slug)->pluck('id')->first();
    }
}
