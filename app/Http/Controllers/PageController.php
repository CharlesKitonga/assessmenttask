<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Address;
use App\Gallery;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch address
        $getAddress = Address::with('event','galleries')->get();
        $getAddress = json_decode(json_encode($getAddress));


        //fetch all events that are already in the db & display them in the modal 
        $events = Event::get();
        //echo "<pre>";print_r($events);die;

        $events_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($events as $evt){
            $events_dropdown .= "<option value='".$evt->id."'>".$evt->name."</option>";
        }
        // Events drop down end //

        /*Places' Dropdown code Start
            fetch all places that are already in the db & display them in the modal
        */
 
        $places = Address::get();
        //echo "<pre>";print_r($places);die;

        $places_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($places as $plc){
            $places_dropdown .= "<option value='".$plc->id."'>".$plc->name_place."</option>";
        }
        // Places' drop down end //

        return view('index', compact('getAddress', 'events','events_dropdown','places_dropdown'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        // $this->validate($request, [
        //     'name' => 'required|string|max:191',
        //     'event_id' => 'sometimes|integer',
        //     'address' => 'required|string',
        //     'photo' => 'required',
        //     'caption' => 'required|string'
        // ]);
        if($request->isMethod('post')){
            //add the event first
            if (empty($request['event_id'])) {
                $addEvent = new Event;
                $addEvent->name = $request['name'];
                $addEvent->save();
            }

            //then add the place the event is taking place & the event id
            if (empty($request['address_id'])) {
                $addPlace = new Address;
                if ($request['event_id']) {
                    $addPlace->event_id=$request['event_id'];
                }else{
                    $addPlace->event_id=$addEvent->id;
                }
                $addPlace->name_place = $request['address'];
                $addPlace->save();
            }

            //pick the event id together with the rest of the data
            $addpicture = new Gallery;
            if ($request['event_id']) {
                $addpicture->event_id=$request['event_id'];
            }else{
                $addpicture->event_id=$addEvent->id;
            }

            if ($request['address_id']) {
                $addpicture->address_id=$request['address_id'];
            }else{
                $addpicture->address_id=$addPlace->id;
            }

            $photo=array();
            //Upload Image
            if($files = $request->photo){
                foreach ($files as $file) {
                    $imgUpload =  time().'.'.$file->extension(); 
                    $file->move(public_path('images/gallery'), $imgUpload);
                    //upload to the db using the merge function
                    $addpicture->photo = $imgUpload;
                }

            }
            $addpicture->caption=$request['caption'];

            //echo "<pre>";print_r($addpicture);die;

            $addpicture->save();
            return redirect()->back();
        }
        
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
