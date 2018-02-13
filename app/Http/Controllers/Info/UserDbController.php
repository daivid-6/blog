<?php

namespace App\Http\Controllers\Info;

use App\Inter\userInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserDbController extends Controller implements  userInterface
{

     //DB进行增删改查
    public function inserts($num)
    {
        $re=DB::table('article')->insertGetId(['id'=>'null','user_id'=>$num,'article_name'=>"php{$num}"]);
        echo $re;
        if($re){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }

    public function deletes($num)
    {
        $foo=DB::table('article')->where('id',$num)->delete();
        if($foo){
            echo '删除成功';
        }else{
            echo '删除失败';
        }

    }
    public function updates($num)
    {
        $re=DB::table('article')->where('id',$num)->update(['article_name'=>'all']);
        if($re){
            echo '更新成功';
        }else{
            echo '更新失败';
        }
    }
    public function selects($num)
    {
        $re=DB::table('article')->where('id',$num)->first();
        echo "这里是实现<br />";
        return "作者id:".$re->user_id."--文章：".$re->article_name;
    }

}
