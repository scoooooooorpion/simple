<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
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
        $locale = $request->route('locale');

        if (in_array($locale, ['en', 'hy', 'ru'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }

        return $next($request);
    }
}
