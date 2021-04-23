<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversion;

class ConversionController extends Controller
{
  // get:conversion/{id} - get conversion
  public function get($id)
  {
    return response(
      Conversion::where('id', $id)->with('quotes')->get(),
      200
    );
  }

  // get:conversion/user/{user_id} - list conversions by user
  public function listByUser($user_id)
  {
    error_log("here i am");
    return response(
      Conversion::where('user_id', $user_id)->with('quotes')->get(),
      200);
  }

  // post:conversion - create conversion
  public function create(Request $request)
  {
  }

  // update:conversion - update conversion
  public function update(Request $request)
  {
  }

  // delete:conversion/{id} - delete conversion
  public function delete($id)
  {
  }
}
