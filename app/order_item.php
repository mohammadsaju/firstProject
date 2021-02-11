<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }
}
