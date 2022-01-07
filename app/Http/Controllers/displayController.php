<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


class displayController extends Controller
{
    function display()
    {      
         // foreach for else  $data=User::where('id',8);
           $data=User::all();
        // $data=User::where('id',8);
           // dd($data);
         return view('detail',['data'=>$data]);
    }
    function insertcache()
    {
         
      //$view=Cache::put('name','Saurabh');
      //  $view=Cache::get('name','Saurabh');
      //  dd($view);

      // if(Cache::has('name','saurabh'))
      // {
      //   dd("hello");
      // }

        //Cache::set('items','electronics');

      //echo Cache::set('name',User::all());
      //echo Cache::get('name');
      // $value=Cache::remember('name',10, function () {
      //   return User::all()->get();
      // });
      // echo "$value";

      $value = Cache::put('name','Hemant Choudhary');
          echo"$value";
       Log::info('The system is down!');
    }
}