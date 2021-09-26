<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag'];
    
    public function posts() #this to create the relationship
    {
        // return $this->belongsTo(Post::class, 'user_id');  #u belong to Post
        // or
        return $this->belongsToMany('App\Models\Post');  #u belong to Post 
    }
}
