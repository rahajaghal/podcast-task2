<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $fillable=['title','podcast','podcast_duration','category_id','channel_id','size','approved','reported'];
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function favourites()
    {
        return $this->hasMany(Favourite::class,'podcast_id');
    }
    public function ratings()
{
    return $this->hasMany(Rating::class);
}
}
