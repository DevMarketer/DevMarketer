<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaraFlash;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      LaraFlash::snackbar('Testing 000')->priority(10);
      LaraFlash::info('Testing 111')->priority(5);
      LaraFlash::success('Testing Success')->priority(1);
      LaraFlash::danger('Testing 555')->priority(3);
      return view('home');
    }
}
