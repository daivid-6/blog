<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JsonTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    //测试json
    public function jsonTests()
    {
        $this->get('json')
             ->seeJson([
                 'code'=>'10001'
             ]);
    }

    public function testJson()
    {
        $this->get('/json')
             ->seeJsonEquals([
                 'data'=>['name'=>'小明1','class'=>'1'],
                 'message'=>'正确',
                 'code'=>'10001'
             ]);
    }
    //测试session 不懂
    public function testSession()
    {
        $this->withSession(['foo'=>'bar'])
             ->visit('/');
    }

}
