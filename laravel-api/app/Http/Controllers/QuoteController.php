<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Error;

class QuoteController extends Controller
{
  public function add(Request $request)
  {
    $quote = new Quote;
    $quote->conversion_id = $request->conversionId;
    $quote->currency = $request->currency;
    $quote->country = $request->country;

    $swop_base_url = 'https://swop.cx/rest/rates';
    $swop_api_key = getenv('SWOP_API_KEY');
    $request_url = "$swop_base_url?base_currency=$request->baseCurrency";

    $curl = curl_init("$request_url&quote_currencies=$quote->currency&api-key=$swop_api_key");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $res = json_decode(curl_exec($curl));
    curl_close($curl);

    $quote->rate = $res[0]->quote;
    $quote->save();
    
    error_log($quote);

    return $quote;
  }
}

/*
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
    */
