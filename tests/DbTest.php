<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DbTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    public function testExample()
    {
        $this->assertTrue(true);
    }
    //数据库
    /*public function testDB()
    {

        $this->seeInDatabase('user',['name'=>'小明0']);
    }*/

    public function testAdd() {
        $this->visit('/insert')
             ->see('');
    }



}
