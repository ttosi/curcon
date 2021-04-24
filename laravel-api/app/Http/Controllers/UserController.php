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

    // user not found, unauthorized 
    if (!$user) return response()->json(false);

    // success, create auth token
    $auth_token = bin2hex(openssl_random_pseudo_bytes(16));

    // update user with token
    User::where('id', $user['id'])->update(['auth_token' => $auth_token]);

    return response()->json([
      'id' => $user['id'],
      'auth_token' => $auth_token
    ]);
  }

  public function logout($id)
  {
  }
}
