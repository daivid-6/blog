<?php

namespace App\Http\Controllers\Info;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Inter\userInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserOrmController extends Controller implements userInterface
{
   static public $ob;
   public function __construct()
   {
       return self::$ob=new Article();
   }


   public function inserts($num)
   {
       $object=self::$ob;
       $object->id=null;
       $object->user_id=$num;
       $object->article_name='php'.$num;
       $re=$object->save();
       if($re){
           echo '添加成功';
       }else{
           echo '添加失败';
       }
   }
   public function deletes($num)
   {
        $delrow=self::$ob->where('id',$num)->delete();
       if($delrow){
           echo '删除成功';
       }else{
           echo '删除失败';
       }
   }
   public function updates($num)
   {
       $object=self::$ob->find($num);
       $object->user_id=$num;
       $re=$object->save();
       if($re){
           return '更新成功';
       }else{
           return '更新失败';
       }
   }
   public function selects($num)
   {
      $re=self::$ob->find($num);
      echo "这里是orm实现<br />";
      return "作者id:".$re->user_id."--文章：".$re->article_name;
   }
}
