<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function menu(){
        return $this->hasOne(MainMenu::class,'role_id','id');
    }

    public function sub_menu(){
        return $this->hasOne(SubMenu::class,'role_id','id');
    }

    public function permissions(){
        return $this->hasOne(Permission::class,'role_id','id');
    }
}
