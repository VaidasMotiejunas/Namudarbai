<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function switch(string $language): RedirectResponse
    {
        if (session('locale')) {
            session()->forget('locale');
        }
        
        session()->put('locale', $language);

        return redirect()->back();
    }
}