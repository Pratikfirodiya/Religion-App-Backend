<?php

namespace App\Http\Controllers\web;
use App\Models\User;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\Occasion;
use App\Models\Religion ;

class DashboarController extends Controller
{
    //
    public function getallusers()
    {
        $user =User::all();
        return view('admin.userlist')->with('user',$user);
    }
    public function showpendingarticles()
{
    $article =Article::all();
    $checkdata=false;
   foreach ($article as $article)
   { 
       if($article->status=="pending")
       {
                $articles[]=$article;
                $checkdata=true;
               
       }
    
   }
   if($checkdata==true)
   {
    return view('admin.map')->with('articles',$articles)->with('checkdata',$checkdata);
 
   }
   else{
    $articles=[];
    return view('admin.map')->with('articles',$articles)->with('checkdata',$checkdata);
   }
}
public function adddata(Request $request)
{
    
    $relgionname=$request->SelectReligion;
    $type=$request->SelectType;
    $typename=$request->TypeName;
    $desc=$request->desc;
    $steps=$request->steps;  
    $imageurl=$request->imageurl;
    if($type=="Festival")
    {
    $name = Religion::all();
        foreach ($name as $name) {
            if($relgionname==$name->religion_name)
            {
                         try{
                            
                            $festival=new Festival;
                            $festival->religion_id=$name->religion_id;
                            $festival->festival_name=$typename;
                            $festival->festival_desc=$desc;
                            $festival->festival_procedure=$steps;
                            $festival->save();
                         return back()->with('success','Added Successfully!');
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
if($type=="Occasion")
{
    $name = Religion::all();
    foreach ($name as $name) {
        if($relgionname==$name->religion_name)
        {
                     try{
                        
                        $occasion=new Occasion;
                        $occasion->religion_id=$name->religion_id;
                        $occasion->occasion_name=$typename;
                        $occasion->occasion_desc=$desc;
                        $occasion->occasion_procedure=$steps;
                        $occasion->save();
                       return back()->with('success',' Added Successfully!');
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
public function articlesupdate(Request $request,$article_id)
{
    $articleid=$article_id;
     $article =Article::all();
     foreach ($article as $article) {
         if($articleid==$article->article_id)
         {
             if($request->submit=="Approved")
             {
            Article::where('article_id', $articleid)->update(array('status' => "Approved"));
            return redirect()->back();
          
             }
             if($request->submit=="Rejected")
             {
            Article::where('article_id', $articleid)->update(array('status' => "Rejected"));
            return redirect()->back();
            
             }
        
       }
     }
}
}
