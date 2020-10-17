<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['customer_name','customer_email','customer_mobile','customer_address'];
}
