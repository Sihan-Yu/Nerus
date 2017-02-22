<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{

    /**
     * Sets and checks if the language is allowed. Will send the user back to the last page they visited.
     *
     * @param $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLanguage($language)
    {

        if (in_array($language, \Config::get('app.locales'))) {
            \Session::put('language', $language);
            \Session::save();
        }

        // Returns the user to the last page they have visited
        return back();

    }

}
