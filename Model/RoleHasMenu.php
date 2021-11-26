<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasMenu extends Model
{
    protected $table = "m_has_role";

    public function singleRole(){
        return $this->hasOne(RoleModel::class, 'id', 'id_role');
    }

    public function singleMenu(){
        return $this->hasOne(MenuModel::class, 'id', 'id_menu');
    }
}
