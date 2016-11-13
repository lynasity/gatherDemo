<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Sports extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table='Sports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'theme_name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
    // build the relationship to the its fans 
    public function fans()
    {
        return $this->morphToMany('App\User', 'subscribeable');
    }
}
