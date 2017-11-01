<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model 
{
    use SoftDeletes;
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'products.title' => 10,
            'products.description' => 6,
            'products.category' => 6
        ]
    ];

    protected $table = 'products';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function reviews()
    {
        return $this->hasMany('App\ProductReview');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function availabilities()
    {
        return $this->hasMany('App\Availability');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}