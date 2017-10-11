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
            'products.description' => 6
        ]
    ];

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