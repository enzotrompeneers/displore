<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = false;

    public function Product()
    {
        return $this->hasMany('Product_Image', 'product_id');
    }

}