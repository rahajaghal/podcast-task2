<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PodcastTag extends Model
{
    public $table="podcast_tag";
    protected $fillable = ['podcast_id','tag_id'];
}
