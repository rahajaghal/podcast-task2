<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable=['name','image','description','user_id','approved','active'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
