<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table='ratings';

    protected $fillable=['podcast_id','user_id','rating'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
