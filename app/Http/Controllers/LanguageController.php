<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function setLanguage($language)
    {

        $allowedLanguages = \Config::get('app.locales');

        if (in_array($language, $allowedLanguages)) {
            \Session::put('language', $language);
            \Session::save();
        }

        // Returns the user to the last page
        return back();

    }

}
