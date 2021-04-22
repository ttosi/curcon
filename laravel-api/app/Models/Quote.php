<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
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
