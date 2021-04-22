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

  protected $hidden = [
    'password',
    'auth_token'
  ];

  public function conversions()
  {
    return $this->hasMany('App\Models\Conversion');
  }
}
