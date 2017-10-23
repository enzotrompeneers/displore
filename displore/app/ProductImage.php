<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model 
{

    protected $table = 'product_images';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }

}