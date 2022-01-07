<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if(Auth::check())
            {
              
                return redirect()->intended('dashboard');
            }
            return $next($request);
           
        // if (Auth::guard($guard)->check()) {
        //    // return view('Dashboard');
        //       //return redirect('/dashboard');
        // }

        // if(!session()->has('Loggeduser') && ($request->path() !='form' && $request->path() !='RegisterForm')){
        //        return redirect()->route('Login');
        //  }
        // if (Auth::guard($guard)->check()) {
           
          
        // return $next($request);
        //       //return redirect('/dashboard');
        // }

         
    //     if(session()->has('Loggeduser') && ($request->path() =='form' || $request->path() =='RegisterForm')){
    //         //return redirect('/dashboard');
    //         //return redirect()->route('dashboard');
    //          return back();
    //  }
         
    }
}
