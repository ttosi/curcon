<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
  protected $table = 'quote';

  protected $fillable = [
    'conversion_id',
    'currency_id',
    'rate',
    'quote_date',
    'created'
  ];

  public function currency()
  {
    return $this->belongsTo('App\Currency');
  }

  public function conversion()
  {
    return $this->belongsTo('App\Conversion');
  }
}
