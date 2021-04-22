<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
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
