<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Authorized
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    // not ideal
    $user = User::where(
      'auth_token', $request->header('Authorization')
    )->first();

    if(!$user) return abort(403);

    return $next($request);
  }
}
