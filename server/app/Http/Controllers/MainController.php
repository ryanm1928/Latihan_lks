<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function userPolls(Request $request)
    {
        # code...
    }

    public function managePolls()
    {
        # code...
    }
}
