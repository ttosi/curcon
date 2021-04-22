<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
  protected $table = 'currency';

  public $incrementing = false;

  protected $fillable = [
    'code',
    'name'
  ];

  public function conversions()
  {
    return $this->hasMany('App\Conversion');
  }

  public function quotes()
  {
    return $this->hasMany('App\Quote');
  }
}
