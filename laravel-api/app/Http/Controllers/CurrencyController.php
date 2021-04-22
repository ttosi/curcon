<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class CurrencyController extends Controller
{
  public function list()
  {
    return response(
      Currency::all(),
      200
    );
  }
}
