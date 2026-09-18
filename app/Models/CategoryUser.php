<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{   
    public $table='category_user';
    protected $fillable=['user_id','category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
