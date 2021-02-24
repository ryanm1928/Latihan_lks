<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Poll;
use App\Models\User;
use App\Models\Choice;
use App\Models\Vote;
class PollController extends Controller
{
    public function create_user(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->division_id =  $request->division;

        $user->save();

    }


    public function create_poll(Request $request)
    {
        
        

        $data = new Poll;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->deadline = $request->deadline;
        $data->choice  = $request->choice;

        $data->save();



    }

    public function login(Request $request)
    {
        $data = $request->only('username','password');
        if($token  = auth('api')->attempt($data))
        {
            return response()->json([
                "massage" => "login succes",
                "token" => $token

            ],200);
        }else{
            return response()->json([
                "massage" => "login fails"
            ],400);
        }
        
    }

    public function create_vote(Request $request)
    {

        // dd($request->all());
        $user = auth()->user()->id;

        $data = new Poll;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->deadline  = $request->deadline;
        $data->created_by = $user;
        // $data->choice = $request->choice;
        $data->save();

        foreach($request->choice as $choice) {
            $data2 = new Choice;
            $data2->choice = $choice;
            $data2->poll_id = $data->id;
            $data2->save();
        }
        // $data2 = new Choice; 
        // $data2->
        return response()->json([
            "msg" => "succes",
            "data" => $data,
            "choice" => $data2

        ]);

    }

    public function vote($poll_id, $choice_id)
    {
        
        if(!auth('api')->user())
        {
            return response()->json([
                "msg" => "your not user"
            ]);
            
        }
        elseif(auth()->user()->role == "admin")
        {

            return response()->json([
                "msg" => "Your admin can not to choice"
            ]);
        }
        else{
            $cekVote = Vote::where('poll_id', $poll_id)
                ->where('user_id', auth()->user()->id)
                ->count();

              $poll = Poll::find($poll_id);
                $now = time();
                $deadline = strtotime($poll->deadline); 
              $dead = $deadline - $now ;
            if($dead < 0)
            {
                return response()->json([
                    "msg" => "time is over"
                ]);

            }
            elseif($cekVote == 1)
            {
                return response()->json([
                    "msg" => "You have choicen"
                ]);
            }else{
                $vote = new Vote;
                $user = auth()->user();
               $division = $user->division->id;
               $vote->choice_id = $choice_id;
               $vote->poll_id = $poll_id;
               $vote->user_id = $user->id;
               $vote->division_id = $division;

               $vote->save();

               return response()->json([
                   'msg' => 'Success for vote'


               ]);


            }

        }
    }

    public function getpoll($poll_id)
    {
        $poll = Poll::find($poll_id);
        
        $poll->choices = $poll->choices;
        
        $result = [
            "id"            =>  $poll->id,
            "title"         =>  $poll->title,
            "description"   =>  $poll->description,
            "deadline"      =>  $poll->deadline,
            "created_by"    =>  $poll->created_by,
            "creator"       =>  $poll->creator->username,
            "choices"       =>  $poll->choices,
            "result"        =>  [],
            "votes"         =>  $poll->votes
        ];
        

        return response()->json($result);
    }
}