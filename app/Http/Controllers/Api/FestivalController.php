<?php

namespace App\Http\Controllers\Api;
use App\Models\Festival;
use App\Models\Occasion;
use App\Models\Image;
use App\Models\Subreligions;
use App\Models\Religion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function storedfestivaldata(Request $request)
    {
        $name = Religion::all();
        foreach ($name as $name) {
            if($request->rname==$name->religion_name)
            {
                         try{
                            
                            $festival=new Festival;
                            $festival->religion_id=$name->religion_id;
                            $festival->festival_name=$request->name;
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
public function storedoccasiondata(Request $request)
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
public function fetchreligion(Request $request)
{
    $name = Religion::all();
    foreach ($name as $name) {
        if($request->rname==$name->religion_name)
        {
            $relid=$name->religion_id;
        }
}
$festival =Festival::all();
 
foreach($festival as $festival)
{
    if($festival->religion_id==$relid)
    {
        $alldata[]=$festival;
        $subreligions=Subreligions::all();
        foreach($subreligions as $subreligions)
        {
            if($subreligions->festival_id==$festival->festival_id)
            {
                $sub[]=$subreligions;
            }
        }
        $image=Image::all();
        foreach($image as $image)
        {
            if($image->festival_id==$festival->festival_id&&$image->religion_id==$festival->religion_id)
            {
                $images[]=$image;
            }
        }
        $image=Image::all();
        foreach($image as $image)
        {
            if($image->festival_id==$festival->festival_id&&$image->religion_id==null)
            {
                $subimages[]=$image;
            }
        }


    }
}

    $occasion =Occasion::all();
    foreach($occasion as $occasion)
{
    if($occasion->religion_id==$relid)
    {
        $alldata1[]=$occasion;
        $image=Image::all();
        foreach($image as $image)
        {
            if($image->occasion_id==$occasion->occasion_id&&$image->religion_id==$occasion->religion_id)
            {
                $images1[]=$image;
            }
        }
    }
}
return response()->json([
    "success" => true,
    "message" => " List",
    "festivaldata" => $alldata,
     "occasiondata"=>$alldata1,
     "Festivalimages"=>$images,
     "Occasionimages"=>$images1,
    ]);

}
}
