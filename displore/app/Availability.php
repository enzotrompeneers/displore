<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model
{
    use SoftDeletes;

    protected $dates = [
    	'date',
    	'start_hour',
    	'end_hour'
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
