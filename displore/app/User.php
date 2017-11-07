<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $table = 'users';
    public $timestamps = true;

    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'password',
        'street',
        'house_nr',
        'city',
        'country',
        'paypal',
    ];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany('Product');
    }

}