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

        // If there's no language set, set it to the default fallback language
        if (!\Session::has('language')) {
            \Session::put('language', \Config::get('app.fallback_locale'));
            \App::setLocale(\Config::get('app.fallback_locale'));
            \Session::save();
        }

        // Laravel handles language in a non persistent way, we have to 'remind' laravel what the language is.
        else {
            \App::setLocale(\Session::get('language'));
        }

        return $next($request);
    }
}
