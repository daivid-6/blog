<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Home\LoginController;
/*class LoginController
{
    public function doSomething()
    {

    }

}*/
class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   /* public function testUser()
    {
       $stub=$this->getMockBuilder('loginConcrete')
                  ->getMock();
       $value=['name'=>'小明','password'=>'123456'];
       //指定行为
        $stub->method('finds')
             ->will($this->returnValue($value));
        $this->assertEquals(['name'=>'小明'],$stub->finds('小明'));

    }*/

   public function testMap()
   {
       $stub=$this->getMock('LoginController',['doSomething']);
       //创建映射
       $map=array(
           array('name','小明')
       );
       $stub
            ->method('doSomething')
            ->will($this->returnValueMap($map));
       $this->assertEquals('小明',$stub->doSomething('name'));
   }

    public function testCallback()
    {
        $stub=$this->getMock('LoginController',['doSomething']);
        function foo($str)
        {
            return "$str$str";
        }
        //配置桩件
        $stub->method('doSomething')
             ->will($this->returnCallback('foo'));

        $this->assertEquals('foofoo',$stub->doSomething('foo'));
    }


   /* public function testError()
    {
        $stub=$this->getMock('LoginController',['doSomething']);
      //配置桩件 抛出异常
        $stub->method('doSomething')
             ->will($this->throwException(new Exception));
        $stub->doSomething();

    }*/










}

