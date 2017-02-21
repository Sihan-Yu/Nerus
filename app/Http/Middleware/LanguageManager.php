<?php

namespace App\Http\Middleware;

use Closure;

class LanguageManager
{
    /**
     * Handles the language switching if no language is set.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!\Session::has('language')) {
            \Session::put('language', \Config::get('app.fallback_locale'));
            \Session::save();
        }

        return $next($request);
    }
}
