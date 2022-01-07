<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usereducation extends Model
{
    use SoftDeletes;
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('Age',function(Builder $builder){

    //         return $builder->where('age','>','10');
    //     });
   // }
   public function scopeAge($query)
   {
        return $query->where('age','>',10);
   }
}
