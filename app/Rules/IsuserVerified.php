<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class IsuserVerified implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         //($attribute);
       // dd($value);
        $user=User::where('email',$value)->first();
       // dd($user);
        if(empty($user)){
            return false;
        }
        if(empty($user->verfied)){
            return true;
      
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'your email is not verified';
    }
}
