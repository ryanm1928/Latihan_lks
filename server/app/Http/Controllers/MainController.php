<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Poll, Vote};

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
        $user = auth()->user();
        $vote = new Vote;
        $vote->choice_id = $request->choice;
        $vote->user_id = $user->id;
        $vote->poll_id = $id;
        $vote->division_id = $user->division_id;

        if($vote->save()) {
            return redirect(route('user-polls.index'));
        } else {
            abort(402);
        }
    }

    public function resultPoll($id)
    {
        $user = auth()->user();
        $poll = Poll::where('id',$id)
                    ->with(['votes' => function($query) use($user) {
                        $query->where('user_id', $user->id);
                    }])
                    ->first();
        return view('pages.poll-result', [
            "poll"  => $poll
        ]);
    }
}
