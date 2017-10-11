<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{
    use SoftDeletes;
    use Searchable;

    protected $table = 'products';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function images()
    {
        return $this->hasMany('ProductImage');
    }

    public function reviews()
    {
        return $this->hasMany('ProductReview');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

}