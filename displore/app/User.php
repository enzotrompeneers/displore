<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = array('salt');

    public function Users()
    {
        return $this->hasMany('Product', 'user_id');
    }

}