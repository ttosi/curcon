<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversion;

class ConversionController extends Controller
{
  public function get($id)
  {
    return response(
      Conversion::where('id', $id)->with('quotes')->get(),
      200
    );
  }

  public function listByUser($user_id)
  {
    return response(
      Conversion::where('user_id', $user_id)->with('quotes')->get(),
      200);
  }

  public function create(Request $request)
  {
  }

  public function update(Request $request)
  {
  }

  public function delete($id)
  {
  }
}
