<?php

namespace App\Models;

class Currency extends BaseModel
{
  protected $table = 'currency';

  public $incrementing = false;

  protected $fillable = [
    'code',
    'name'
  ];
}
