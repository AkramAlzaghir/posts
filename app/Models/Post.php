<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //to call soft delet library

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $date = ['deleted_at']; //soft delete work based on dates
    protected $fillable =
    [
        'user_id', 'title', 'content', 'photo', 'slug'
    ];

    public function user() #this to create the relationship
    {
        // return $this->belongsTo(User::class, 'user_id');  #u belong to user based on the user id
        // or
        return $this->belongsTo('App\Models\User', 'user_id');  #u belong to user based on the user id
    }
    public function getFeaturedAttribute($photo){
        return asset($photo);
    }

    public function tag() #this to create the relationship
    {
        // return $this->belongsTo(Tag::class);  #u belong to Post
        // or
        return $this->belongsToMany('App\Models\Tag');  #u belong to tag 
    }
}
