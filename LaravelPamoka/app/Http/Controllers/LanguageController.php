<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \config;

class LanguageController extends Controller
{
    public function switch($language)
    {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $localeFromURL = $uri_segments[3];
        if (in_array($localeFromURL, config('app.locales'))){
            app()->setLocale($localeFromURL);
        }
        return redirect()->back();
    }
}

    // public function switch($language)
    // {
    //     app()->setLocale($language);
        
    //     return redirect()->route('drivers.index');
    // }