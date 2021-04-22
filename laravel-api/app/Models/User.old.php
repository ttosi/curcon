<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'user';
  
  protected $fillable = [
    'email',
    'password',
    'auth_token',
    'created'

  ];

  // The attributes that should be hidden for arrays.
  protected $hidden = [
    'password',
    'auth_token'
  ];
}
