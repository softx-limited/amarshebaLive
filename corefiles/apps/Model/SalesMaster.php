<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalesMaster extends Model
{
    public function customer()
    {
      return  $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function products(){
        return $this->hasMany(SalesInvoice::class,'invoice_no','invoice_no');
    }
}
