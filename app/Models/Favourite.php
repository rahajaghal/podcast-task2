<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table='favourites';
    protected $fillable=['podcast_id','user_id'];
    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
