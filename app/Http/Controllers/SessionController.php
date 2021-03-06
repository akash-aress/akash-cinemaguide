<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Session_Times;
use Illuminate\Http\Request;

class SessionController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cinema_id)
    {
        $movies = Movies::all();
        return view('session_times.create',compact('movies', 'cinema_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'date_time' => 'required',
            'cinema_id' => 'required',
        ]);

        $session_times = new Session_Times();
        $session_times->movie_id = $request->movie_id;
        $session_times->cinema_id = $request->cinema_id;
        $session_times->date_time = date("Y-m-d H:i:s", strtotime($request->date_time));
        $session_times->save();
        return redirect()->route('cinemas.show',$request->cinema_id)->with('success','Movie show added to cinema successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinemas  $cinema
     * @return \Illuminate\Http\Response
     */
    public function edit($session_id, $cinema_id)
    {
        $session_times = Session_Times::find($session_id);
        $movies = Movies::all();
        return view('session_times.edit',compact('movies', 'session_times', 'session_id', 'cinema_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinemas  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session_Times $session_time)
    {
        $request->validate([
            'movie_id' => 'required',
            'date_time' => 'required',
            'cinema_id' => 'required',
        ]);

        $session_time->movie_id = $request->movie_id;
        $session_time->cinema_id = $request->cinema_id;
        $session_time->date_time = date("Y-m-d H:i:s", strtotime($request->date_time));
        $session_time->save();
    
        return redirect()->route('cinemas.show',$request->cinema_id)->with('success','Movie show updated to cinema successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinemas  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session_Times $session_time)
    {
        $cinema_id = $session_time->cinema_id;
        $session_time->delete();
        return redirect()->route('cinemas.show',$cinema_id)
                        ->with('success','Movies show deleted successfully');
    }
}
