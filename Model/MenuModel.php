<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = "m_menu";

    public function hasRole(){
        return $this->hasMany(RoleHasMenu::class, 'id_menu', 'id');
    }
}
