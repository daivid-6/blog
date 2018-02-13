<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='article';

    public $timestamps=false;

    //定义关系多对一
    public function article()
    {
        return $this->belongsTo('App\Model\User','id','user_id');
    }
}
