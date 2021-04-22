<?php

namespace App\Models;

class Quote extends BaseModel
{
  protected $table = 'quote';

  protected $fillable = [
    'conversion_id',
    'currency',
    'rate',
    'quote_date',
    'created'
  ];

  public function conversion()
  {
    return $this->belongsTo('App\Models\Conversion');
  }
}
