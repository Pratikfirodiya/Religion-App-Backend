<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request){
            $cred=$request->only(['email','password']);
    //        $email=$request->email;
    //        $password=$request->password;
    //    if(auth::attempt(['email' => $email, 'password' => $password]))
    //    {
        if(!$token=auth()->attempt($cred))
        {
            return response()->json([
                'success'=>false,
                 'message'=>'user does not exists'
                
            ]);
        }
        return response()->json([
            'success'=>true,
            'token'=>$token,
   //         'user'=>Auth::user()
           'user'=>Auth::user() 
        ]);
       }
     
       
    
    public function register(Request $request)
    {
    
        if (User::where('email', $request->email )->first()) {
        return response()->json([
            'success'=>false,
            'message'=>'user exists'
        ]); 
     }
     $encryptedPass=Hash::make($request->password);
     $user=new User;
     try{
         $user->firstname=$request->firstname;
         $user->number=$request->number;
         $user->email=$request->email;
         $user->password=$encryptedPass;
         $user->save();
         return $this->login($request);

     }catch(Exception $e)
     {
         return response()->json([
             'success'=>false,
             'message'=>$e
         ]);

     }
    }
    public function getallusers()
    {
        $user =User::all();
 
 return response()->json([
 "success" => true,
 "message" => "User List",
 "data" => $user
 ]);
    }
}
