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
    $conversions = Conversion::where('user_id', $user_id)->with('quotes')->orderBy('created', 'desc')->get();

    // need to refactor
    //  1. Makes 1 request for each currency rate
    //  2. Doesn't update DB with current rate,
    //     would be good to cache the rate and only
    //     make request if > 1 day old
    //  3. This business logic should be refactored
    //     to its own service class
    $swop_base_url = 'https://swop.cx/rest/rates';
    $swop_api_key = getenv('SWOP_API_KEY');

    foreach ($conversions as $conversion) 
    {
      $request_url = "$swop_base_url?base_currency=$conversion->currency";
      foreach ($conversion->quotes as $quote) 
      {
        $curl = curl_init("$request_url&quote_currencies=$quote->currency&api-key=$swop_api_key");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = json_decode(curl_exec($curl));
        $quote->rate = $res[0]->quote;

        curl_close($curl);
      }
    }

    return response($conversions, 200);
  }

  // post:conversion - create conversion
  public function create(Request $request)
  {
    $conversion = new Conversion;
    $conversion->user_id = $request->userId;
    $conversion->currency = $request->currency;
    $conversion->country = $request->country;
    $conversion->amount = 1.00;
    $conversion->save();

    return response()->json($conversion->id);
  }

  // delete:conversion/{id} - delete conversion
  public function delete($id)
  {
    $conversion = Conversion::where('id', $id)->with('quotes')->first();
    foreach ($conversion->quotes as $quote) 
    {
      $quote->delete();
    }
    $conversion->delete();

    return response(200);
  }
}
