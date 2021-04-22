<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
  protected $table = 'conversion';

  protected $fillable = [
    'user_id',
    'currency_id',
    'amount',
    'created'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function currency()
  {
    return $this->belongsTo('App\Currency');
  }

  public function quotes()
  {
    return $this->hasMany('App\Quote');
  }
}
