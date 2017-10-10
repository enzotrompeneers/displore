<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    public $timestamps = true;

    use SoftDeletes;

    public function product()
    {
    	return $this->hasOne('Product')
    }

    public function user()
    {
        return $this->hasOne('User');
    }
}
