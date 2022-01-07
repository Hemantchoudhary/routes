<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use App\Http\Requests\CustomValidation;
use App\Http\Requests\CustomValidationRegister;
use App\Mail\RegistertionEmail;
use Illuminate\Http\Request;
//use App\Admin;
use App\User;
use App\Jobs\SendEmailJob;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMAil;


class AuthController extends Controller
{

    function LoginForm()
    {
        return view('LoginForm');
    }
    function RegisterForm()
    {
        return view('RegisterForm');
    }
    function Dashboard()
    {
        
        return view('Dashboard');
    }

    function Save(CustomValidationRegister $request)
    {
        $validated = $request->validated();
        //dd($request->all());
        // return $request->input();
        //controller validation
        // $request->validate([
        //     'Email' => 'required|email|unique:users',
        //     'Password' => 'required|min:5|max:8',
        // ]);

        //insert Data
        $User = new User;
        $User->name = $request->Name;
        $User->email = $request->Email;
        $User->password = Hash::make($request->Password);
        $User->email_verification_code = Str::random(40);
        $User->save();
        //Email Verification
       // $myEmail = 'suryanshjaat1998@gmail.com';
       // Mail::to($request->Email)->send(new RegistertionEmail());

        //Verification email
         Mail::to($request->Email)->send(new EmailVerificationMAil($User));

        if ($User->save()) {
            return back()->with('success', 'data has been submiited');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function Check(CustomValidation $request)
    {
         

       // $validated = $request->validated();
        //controller side validation
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:5|max:8',
        // ]);
        //$details['email']= $request->email;
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
                 $user=auth()->user();
                 // dd($user['email']);
                
                SendEmailJob::dispatchNow($user);

                 return redirect()->intended('dashboard');
        } else {
            return back()->with('fail', 'We do not trecognize your email or password');;
        }
        // using table or Model
        // $admin = Admin::where('email', '=', $request->Email)->first();
        // if (!$admin) {

        //     return back()->with('fail', 'We do not trecognize your email');
        // } else {
        //     if (Hash::check($request->Password, $admin->password)) {
        //         $request->session()->put('Loggeduser', $admin->id);
        //         return redirect('/dashboard');
        //     } else {
        //         return back()->with('fail', 'your password is incoorect');
        //     }
        //}

    }
    function Logout()
    {
        Auth::logout();
        return redirect()->route('Welcome');
    }
    function verify_email($verification_code)
    {
         // dd($verification_code);
         //$User = User::where('id',3)->first();
        
          $User = User::where('email_verification_code',$verification_code)->first();
         //dd($User);
        // $User=\app\Model\User::User::where('email_verification_code','$verification_cod
          // dd($User);
        if (!$User) {

            return redirect()->route('Register')->with('fail', 'invalid url');
        } else {

            if ($User->verified) {
                return redirect()->route('Login')->with('success', 'you are already verfied');
            } else {
            
                $User->verified = 1;
               // $User->email_verified_at = \Carbon\Carbon::now();
                $User->save();
            }
            return redirect()->route('Login')->with('success', 'your email is verfied now you can login');
        }
    }
}
