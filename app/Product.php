<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'product_id', 'product_name', 'description', 'price', 'order_id', 'picture', 'pic_name', 'pic_type', 'pic_tmp_name', 'pic_size'
    ];
}
