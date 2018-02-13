<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //关联表
    protected $table='user';
    //字段 create_time  update_time
    public $timestamps=false;
    //关联关系
    public function user()
    {
        return $this->hasMany('App\Model\Article','user_id','id');
    }
}
