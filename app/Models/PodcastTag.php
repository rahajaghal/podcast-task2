<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PodcastTag extends Model
{
    
    protected $fillable = ['podcast_id','tag_id'];
}
