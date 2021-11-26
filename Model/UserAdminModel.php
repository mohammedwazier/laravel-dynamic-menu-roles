<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdminModel extends Model
{
    protected $table = "a_useradmin";
    protected $primaryKey = "id_user";
    public $timestamps = false;

    public function unorData(){
        return $this->hasOne(OPDModel::class, 'id_unor', 'id_unor');
    }
}
