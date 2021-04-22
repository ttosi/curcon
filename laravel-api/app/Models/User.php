<?php

namespace App\Models;

class User extends BaseModel
{
  protected $table = 'user';
  const UPDATED_AT = null;

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
