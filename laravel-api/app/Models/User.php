<?php

namespace App\Models;

class User extends BaseModel
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
