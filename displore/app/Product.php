<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function images()
    {
        return $this->hasMany('ProductImage');
    }

    public function reviews()
    {
        return $this->hasMany('ProductReview');
    }

}