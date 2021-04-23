<?php

namespace App\Models;

class Quote extends BaseModel
{
  protected $table = 'quote';

  protected $fillable = [
    'conversion_id',
    'rate',
    'currency',
    'country',
    'quote_date',
    'created'
  ];

  public function conversion()
  {
    return $this->belongsTo('App\Models\Conversion');
  }
}
