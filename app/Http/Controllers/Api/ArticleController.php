<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\Occasion;
use App\Models\Religion;
use App\Models\User;
use App\Models\Article;
class ArticleController extends Controller
{
    
public function showarticlesbyid(Request $request)
{

    $userid=$request->id;
    $article = Article::all();
    foreach ($article as $article) {
        if($userid==$article->user_id)
        {
           $articles[]=$article;
        }
    }
    return response()->json([
        'success'=>true,
        'Articles'=>$articles
    ]);
}
public function showallarticles()
{
    $article =Article::all();
 
    return response()->json([
    "success" => true,
    "message" => "Article List",
    "Articles" => $article
    ]);
}
public function showpendingarticles()
{
    $article =Article::all();
   foreach ($article as $article)
   { 
       if($article->status=="pending")
       {
                $articles[]=$article;
       }
   }
   if(empty($articles))
   {
    return response()->json([
        "success" => true,
        "message"=>"No pending Articles"
        ]);
   }
   else
   {
    return response()->json([
    "success" => true,
    "message" => "Article List",
    "Articles" => $articles
    ]);
}
}
public function validatearticles(Request $request)
{
    $articleid=$request->articleid;
    $status=$request->status;   
 
     $article =Article::all();
     foreach ($article as $article) {
         if($articleid==$article->article_id)
         {
            Article::where('article_id', $articleid)->update(array('status' => $status));
                return response()->json([
                'success'=>true,
                'message'=>'stored'
            ]);
       }
     }
}
    public function storearticles(Request $request)
    {
          //Article::query()->truncate();
       $relgionname=$request->rname;
       $userid=$request->id;
       $type=$request->type;
       $typename=$request->typename;
       $desc=$request->desc;
       $steps=$request->steps;
       $imageurl=$request->imageurl;
       $id = User::all();
       foreach ($id as $id) {
           if($userid==$id->id)
           {
                    
       if($type=="Festival")
       {
        if ( Festival::where('festival_name', $typename)->first()) {

            return response()->json([
                'success'=>false,
                'message'=>'already exists'
            ]);
        }
        $name = Religion::all();
        foreach ($name as $name) {
            if($relgionname==$name->religion_name)
            {
                         try{
                            
                            $article=new Article;
                            $article->religion_name=$relgionname;
                            $article->type_name=$typename;
                            $article->type=$type;
                            $article->desc=$desc;
                            $article->procedure=$steps;
                            $article->user_id=$userid;
                            $article->image_url=$imageurl;
                            $article->status="pending";  
                            $article->save();
                            return response()->json([
                                                'success'=>true,
                                                'message'=>'stored',
                                                 'article'=>$article
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
       if($type=="Occasion")
       {
        if ( Occasion::where('occasion_name', $typename)->first()) {

            return response()->json([
                'success'=>false,
                'message'=>'already exists'
            ]);
        }
        $name = Religion::all();
        foreach ($name as $name) {
            if($relgionname==$name->religion_name)
            {
                         try{
                            
                            $article=new Article;
                            $article->religion_name=$relgionname;
                            $article->type_name=$typename;
                            $article->type=$type;
                            $article->desc=$desc;
                            $article->procedure=$steps;
                            $article->user_id=$userid;
                            $article->image_url=$imageurl;
                            $article->status="pending";  
                            $article->save();
                            return response()->json([
                                                'success'=>true,
                                                'message'=>'stored',
                                                 'article'=>$article
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
}
}
