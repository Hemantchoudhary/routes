<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = [
        'name', 'user_id', 'address','date_of_birth',
    ];
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
