<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id','category_id','name','slug','excerpt','body','status'
    ];

    protected $dates = ['created_at'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function scopeisPublish()
    {
        return $this->where('status', 'publish');
    }

    public function scopefindSlug($query, $slug)
    {
        return $query->where('slug',$slug)->first();
    }

    public function getColorStatusAttribute()
    {
        return $this->status === 'publish' ? 'success' : 'warning' ;
    }
}
