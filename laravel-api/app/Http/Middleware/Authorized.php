<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Authorized
{
  public function handle(Request $request, Closure $next)
  {
    if(!$request->headers->has('Authorization')) return abort(401);
    
    // not ideal
    $user = User::where(
      'auth_token', $request->header('Authorization')
    )->first();

    if(!$user) return abort(403);

    return $next($request);
  }
}
