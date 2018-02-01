<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \config;

class LanguageController extends Controller
{
    public function switch($language)
    {
  
        if (in_array($language, config('app.locales'))){
            app()->setLocale($language);
        }
        return redirect()->back();
    }
}

    // public function switch($language)
    // {
    //     app()->setLocale($language);
        
    //     return redirect()->route('drivers.index');
    // }