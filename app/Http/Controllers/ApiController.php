<?php

namespace App\Http\Controllers;


use App\Event;
use App\Sport;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $events = Event::all();


        foreach($events as $event){
                $sportname = Sport::find($event['sport_id']);


            $event["sport"] =  $sportname['name'];
        }

            return $events ->toJson();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ommentaire pour test le githttp://localhost/ApiAppli/public/event/2
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->toArray();


        $event = new Event;
        
        $event->user_id = $request->user_id;
        $event->sport_id=$request->sport_id;
        $event->datetime=$request->datetime;
        $event->duration=$request->duration;
        $event->participant=$request->participant;
        $event->participantmax=$request->participantmax;
        $event->place=$request->place;

        $event->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single = Event::find($id);
        return $single->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
