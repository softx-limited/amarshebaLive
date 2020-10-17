<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable=['account_name'];


    public function accountInfo(Type $var = null)
    {
       return $this->hasMany(AccountHistory::class,'account_id','id');
    }
}
