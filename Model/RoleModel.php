<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class RoleModel extends Model
{
    protected $table = "m_role";

    public function manyMenu(){
        return $this->hasMany(RoleHasMenu::class, 'id_role', 'id')->whereRaw(DB::raw("id_menu in (select id from m_menu)"));
    }
}
