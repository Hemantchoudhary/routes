<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usereducation;
class Retrivecontroller extends Controller
{
    // public function retrive()
    // {
    //       $allusers=User::all();
    //       foreach($allusers as $alluser){
    //         echo $alluser->name;
    //       }

    //  }
    // public function retrive()
    // {
    //     $alluser=User::orderBy('name','desc')->all();
        
    // }
    //   public function retrive()
    //   {
    //       $alluser=usereducation::where('name','salman')->first();
    //       $allusers = $alluser->fresh();
    //       echo " $allusers";
    //   }
    // public function retrive()
    // {
    //     $alluser=usereducation::findorfail(1);
        
    //     echo " $alluser";
    // }
    //  public function retrive()
    // {
    //     $alluser=usereducation::findorfail(1);
        
    //     echo " $alluser";
    // }
    // public function retrive()
    // {
    //   $alluser=usereducation::firstOrCreate(['name' => 'Flight 10']);
    // }
    // public function retrive()
    // {
    //   $alluser=usereducation::find(3);
    //   $alluser->delete();
    //   if ($alluser->trashed()) {
    //     echo "HEllo";
    //   }
   // }
    // public function retrive()
    // {
    //     $alluser=usereducation::withTrashed()->get();
    //     echo"$alluser";

    // }
    //    public function retrive()
    // {
    //     $alluser=usereducation::withTrashed()
    //     ->where(['name', 'salman'])
        
    //     ->restore();

    // }
    //  public function retrive()
    //  {
    //      $alluser=Usereducation::all();
    //       echo "$alluser";

    //  }
    public function retrive()
     {
         $alluser=Usereducation::age()->get();
          echo "$alluser";

     }
    
}

