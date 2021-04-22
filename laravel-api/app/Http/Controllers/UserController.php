<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function login(Request $request)
  {
  }

  // {
  // }

  public function update(Request $request)
  {
  }

  public function logout($id)
  {
    error_log("logout ${id}");
    $user = User::find($id);
    error_log($user);
  }

  // public function delete($id)
  // {
  // }
}
