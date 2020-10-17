<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['product_name','purchase_price','sales_price','photo'];


    
}
