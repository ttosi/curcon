<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function login(Request $request)
  {
    // fetch user
    $user = User::where([
      ['email', $request['email']],
      ['password', hash('sha256', $request['password'])]
    ])->first();

      echo $request->header('Authorization');

    // return unauthorized if user not found
    if(!$user) return abort(401);

    // success, create auth token
    $auth_token = bin2hex(openssl_random_pseudo_bytes(16));

    // update user with token
    User::where('id', $user['id'])
      ->update(
        ['auth_token' => $auth_token]
      );

    return response()->json([
      'email' => $user['email'],
      'auth_token' => $auth_token
    ]);
  }

  public function logout($id)
  {
  }
}
