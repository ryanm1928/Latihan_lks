<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poll;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::all();
        return view("mg_polls.index", compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mg_polls.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $poll = new \App\Models\Poll;
        $poll->title = $request->title;
        $poll->description = $request->description;
        $poll->deadline = $request->deadline;
        $poll->created_by = auth()->user()->id;
        $poll->save();

        foreach($request->choice as $strChoice) {
            $choice = new \App\Models\Choice;
            $choice->choice = $strChoice;
            $choice->poll_id = $poll->id;
            $choice->save();
        }

        return redirect(route('manage-polls.index'))->with("success","Poll berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $poll = Poll::find($id);
        $choicenum = $request->choicenum ?? count($poll->choices);
        
        return view('mg_polls.edit', compact('poll', 'choicenum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::find($id);
        $poll->delete();
        return redirect(route('manage-polls.index'))->with('success',"Data berhasil dihapus");
    }
}
