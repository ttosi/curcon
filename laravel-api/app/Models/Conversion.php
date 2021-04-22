<?php

namespace App\Models;

class Conversion extends BaseModel
{
  protected $table = 'conversion';

  protected $fillable = [
    'user_id',
    'currency',
    'amount',
    'created'
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public function quotes()
  {
    return $this->hasMany('App\Models\Quote');
  }
}
