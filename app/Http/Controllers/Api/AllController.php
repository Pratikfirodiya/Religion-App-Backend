<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\Occasion;
use App\Models\Religion;
use App\Models\Image;
use App\Models\Subreligions;
class AllController extends Controller
{
    public function storeddata(Request $request)
    {
        $name = Festival::all();
        foreach ($name as $name) {
            if($request->fid==$name->festival_id)
            {
                         try{
                            
                            $festival=new Subreligions;
                            $festival->festival_id=$name->festival_id;
                            $festival->subreligion_name=$request->name;
                            $festival->festival_desc=$request->desc;
                            $festival->festival_procedure=$request->steps;
                            $festival->save();
                            return response()->json([
                                                'success'=>true,
                                                'message'=>'stored',
                                                 'data'=>$festival
                                            ]);
                                              }  catch(Exception $e)
                                         {
                                             return response()->json([
                                                 'success'=>false,
                                                 'message'=>$e
                                             ]);
            }
        }
    }
}
public function storeimages(Request $request)
{
    if($request->name=="festivals")
    {
    if($request->sr!=null)
    {
        $name = Festival::all();
        foreach ($name as $name) {
            if($request->fid==$name->festival_id)
            {
                         try{
                            
                            $image=new Image;
                            $image->festival_id=$name->festival_id;
                            $image->religion_id=$name->religion_id;
                            $image->image_url=$request->url;
                    
                            $image->save();
                            return response()->json([
                                                'success'=>true,
                                                'message'=>'stored',
                                                 'data'=>$image
                                            ]);
                                              }  catch(Exception $e)
                                         {
                                             return response()->json([
                                                 'success'=>false,
                                                 'message'=>$e
                                             ]);
            }
        }
    }
}

}
if($request->name=="occasions")
{
    if($request->sr!=null)
    {
        $name = Occasion::all();
        foreach ($name as $name) {
            if($request->fid==$name->occasion_id)
            {
                         try{
                            
                            $image=new Image;
                            $image->occasion_id=$name->occasion_id;
                            $image->religion_id=$name->religion_id; 
                            $image->image_url=$request->url;
                    
                            $image->save();
                            return response()->json([
                                                'success'=>true,
                                                'message'=>'stored',
                                                 'data'=>$image
                                            ]);
                                              }  catch(Exception $e)
                                         {
                                             return response()->json([
                                                 'success'=>false,
                                                 'message'=>$e
                                             ]);
            }
        }
    }
}
    else
    {

    }
}

}
public function storearticles(Request $request)
{
    if($request->type=="Occasion")
    {
    $name = Religion::all();
    foreach ($name as $name) {
        if($request->rname==$name->religion_name)
        {
                     try{
                        
                        $occasion=new Occasion;
                        $occasion->religion_id=$name->religion_id;
                        $occasion->occasion_name=$request->name;
                        $occasion->occasion_desc=$request->desc;
                        $occasion->occasion_procedure=$request->steps;
                        $occasion->save();
                        return response()->json([
                                            'success'=>true,
                                            'message'=>'stored',
                                             'data'=>$occasion
                                        ]);
                                          }  catch(Exception $e)
                                     {
                                         return response()->json([
                                             'success'=>false,
                                             'message'=>$e
                                         ]);
        }
    }
}
}
}
}
