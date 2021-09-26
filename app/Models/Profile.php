<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile_users'; //this is because we create migration and model seperately, 
    protected $fillable = [
        'country',
        'province',
        'user_id',
        'gender',
        'facebook'
    ];
public function user() {
    //this model profile belongs to user model, the connection between them is user_id
    return $this->hasOne('App\Models\User', 'user_id');
}
}
