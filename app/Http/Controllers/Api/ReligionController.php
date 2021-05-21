<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Models\Festival;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ( Religion::where('religion_name', $request->name )->first()) {

            return response()->json([
                'success'=>false,
                'message'=>'already exists'
            ]);
        }
        try {
        $religion=new Religion;
        $religion->religion_name=$request->name;
        $religion->religion_desc=$request->desc;
        $religion->imageurl=$request->url;
        $religion->save();
        return response()->json([
            'success'=>true,
            'message'=>'stored'
        ]);
          }  catch(Exception $e)
     {
         return response()->json([
             'success'=>false,
             'message'=>$e
         ]);

     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function show(Religion $religion)
    {
        $religion =Religion::all();
     //   Festival::query()->truncate();
        return response()->json([
        "success" => true,
        "message" => "religion List",
        "data" => $religion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function edit(Religion $religion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Religion $religion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion)
    {
        //
    }
}
