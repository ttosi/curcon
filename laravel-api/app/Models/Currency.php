<?php

namespace App\Models;

class Currency extends BaseModel
{
  protected $table = 'currency_code';

  protected $fillable = [
    'country',
    'country_code',
    'currency',
    'currency_code'
  ];
}
