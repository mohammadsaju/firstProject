<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'brand_id',
        'product_slug',
        'product_code',
        'product_price',
        'product_quantity',
        'short_describtion',
        'long_describtion',
        'image_one',
        'image_two',
        'image_three',
        'status'
    ];
}