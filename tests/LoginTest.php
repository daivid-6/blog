<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
  public function testLogin()
  {

      $this->visit('login')
           ->type('','name')
           ->type('123456','password')
           ->press('登陆')
           ->seePageIs('login');
  }

    public function testLogin4()
    {

        $this->visit('login')
            ->type('小明','name')
            ->type('','password')
            ->press('登陆')
            ->seePageIs('login');
    }

  public function testLogin2()
  {
      $arr=['name'=>'小明1','password'=>123456];
      $this->visit('login')
           ->type('小明','name')
           ->assertArraySubset(['name'=>'小明1'],$arr,true,'用户名不存在');
  }

    public function testLogin3()
    {
        $arr=['name'=>'小明1','password'=>'123456'];
        $this->visit('login')
            ->type('小明','name')
            ->type('123456','password')
            ->assertArraySubset(['name'=>'小明1','password'=>'123456'],$arr,true,'密码错误');
    }

}
