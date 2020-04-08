<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
            return redirect()->back();
        }
    }
}
