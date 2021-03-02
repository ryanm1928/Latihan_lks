<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;

class MainController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function userPolls(Request $request)
    {
        
    }

    public function managePolls()
    {
        $polls = Poll::all();

        return view("mg-polls.index", compact('polls'));
    }
}
