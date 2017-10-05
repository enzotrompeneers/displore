<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReview extends Model 
{

    protected $table = 'product_reviews';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}