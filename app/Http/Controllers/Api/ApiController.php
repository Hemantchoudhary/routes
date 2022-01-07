<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\usereducation;
use App\profile;
use App\role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomValidation;
use App\Http\Requests\CustomValidationRegister;

class ApiController extends Controller
{
     public $successStatus = 200;

     public function login()
     {

          if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
               $User = Auth::User();
               $success['token'] = $User->createtoken('MyToken')->accessToken;
               return response()->json(['success' => $success], $this->successStatus);
                } else {
               return response()->json(['error' => 'Unauthorised'], 401);
                }
     }

     public function details()
     {

           if($user = Auth::user()) {
              // $userprofile = profile::where('user_id',$user->id)->first;
               //return $user->id;die;

                         //retereving data through user model
                //$userprofile = User::find($user->id)->profile;

                      //retreving data  through reverse
               // $userprofile = profile::find(1)->User;
                     //hastomany relationship
                //$usereducation=User::find($user->id)->usereducation; 
                    
                  //hasMother relationship
               //$usereducation=usereducation::find(1)->user;   

                  //hastomany relationship with where condition
              // $usereducation=User::find($user->id)->usereducation()->where('courses','B.tech')->first();  
                 //reverse of has many
                  
                       //Mant to MAny relationship
                      // $alladmin =User::find($user->id)->roles()->get()->all();
           
                        //Reverse may to manyi
               // $alladmin =role::with('users')->where('role','Admin')->get();
               //$alladmin=User::find($user->id)->roles()->where('role','Admin')->get()->all();
               //through associated model
               $alladmin=User::with('usereducation')->whereHas('usereducation',function($q){
                 $q->where('courses','like','%tech%');
               })->get();
                  // dd($alladmin);
                    //foreach
               // $user = User::find($user->id); 
               // foreach ($user->roles as $role) {
               //      echo $role;
               //  }  P
              


              // $userprofile = User::with('profile')->where('id',$user->id)->first();
               //$userprofile = User::find($user->id)->profile;

              // $alladmin=role::with('users')->where('role','Admin')->get()->all();
               //$userallinformation=User::with('profile','usereducation','roles')->find(auth()->id());
               // dd($userallinformation);
               return response()->json(['allAdmin'=>$alladmin]);
              // return response()->json(['Userallinformation' => $userallinformation], $this->successStatus);
               //return response()->json(['User verified' => $user,'Roles of a user'=> $roles,'userdetail'=>$userprofile,'userprofile'=>$userprofile,'usereducation'=>$usereducation], $this->successStatus);
                } else {
               return response()->json(['error' => 'unuthorized token'], 401);
                    }
     }
     public function register(CustomValidationRegister $request)
     {
          // $validated = $request->validated();
          // if ($validated->fails()) {
          //      return response()->json(['error' => $validated->errors()], 401);
          // }
          //inserting data and creating token  
          $input = $request->all();
          $input['password'] = Hash::make($input['password']);
          // print_r($input);
          // die;
          $User = User::create($input);
          $success['token'] = $User->createtoken('MyToken')->accessToken;
          $success['name'] = $User->name;
          return response()->json(['success' => $success], $this->successStatus);
     }
}
