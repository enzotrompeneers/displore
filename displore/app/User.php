<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

    protected $table = 'users';
    public $timestamps = true;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'password'
    ];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany('Product');
    }

}