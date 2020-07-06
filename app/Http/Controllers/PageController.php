<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('index');
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
        $this->validate($request, [
            'event' => 'required|string|max:191',
            'place' => 'required|string',
            'photo' => 'required',
            'caption' => 'required|string'
        ]);
        if($request->isMethod('post')){
            $addpicture = new Gallery;
            $addpicture->event=$request['event'];
            $addpicture->place=$request['place'];
            //check for current photo
            $currentPhoto = $addpicture->photo;
            //Upload Image
            if($request->photo != $currentPhoto){
                $imgUpload =  time().'.'.$request->photo->extension(); 
                $request->photo->move(public_path('images/gallery'), $imgUpload);
                //upload to the db using the merge function
                $addpicture->photo = $imgUpload;

                //delete old photo if user updates their gallery picture
                $oldPhoto = public_path('images/gallery').$currentPhoto;
                if (file_exists($oldPhoto)) {
                    @unlink($oldPhoto);
                }

            }
            $addpicture->caption=$request['caption'];

            //echo "<pre>";print_r($addpicture);die;

            $addpicture->save();
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
