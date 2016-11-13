<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email','password','api_token','gender'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password','created_at','updated_at','id','images','location'
    ];
    // build the relation to diffrent themes
    // public function lectures()
    // {
    //     return $this->morphedByMany('App\Post', 'taggable');
    // }
    /**
     * 获取分配该标签的所有视频
     */
    // public function Sports()
    // {
    //     return $this->morphedByMany('App\Video', 'taggable');
    // }

    
}
