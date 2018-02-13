<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //关联数据表
    protected $table='user';
    public function getList($name){

        return $this->where('name',"{$name}")->first();
    }
    //添加数据
    public function inserts($num='')
    {
        $re=$this->insert(['name'=>"小明{$num}",'class'=>"{$num}",'password'=>md5(123456)]);
        if($re){
            return '成功';
        }else{
            return '失败';
        }
    }
}
