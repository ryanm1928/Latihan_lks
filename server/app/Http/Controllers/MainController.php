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
        $user = auth()->user();
        $polls = Poll::where('deadline', ">=", date("Y-m-d"))
                ->with(['votes' => function($query) use($user) {
                    $query->where('user_id', $user->id);
                }])
                ->whereDoesntHave('votes', function($query) use($user) {
                    $query->where("user_id", $user->id);
                })
                ->get();
        return view('pages.polls-agenda', [
            "polls"  => $polls  
        ]);
    }

    public function takePoll($id)
    {
        $poll = Poll::findOrFail($id);

        return view('pages.poll-take', [
            "poll"  => $poll
        ]);
    }


    public function submitPoll(Request $request, $id)
    {
        dd($request->all());
    }
}
