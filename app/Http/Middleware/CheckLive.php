<?php

namespace App\Http\Middleware;

use Closure;

class CheckLive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (null === $request->session()->get('statusLive')) {
            
                if ($request->query('accepted', false)) {
                    $request->session()->put(['statusLive' => true]);
                } else {
                    return redirect(route('home.welcome'));
                }
            
        }
        return $next($request);
    }
}
