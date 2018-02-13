<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Something
{
    public function doSomething()
    {
        return 'foo';
    }
}
class StubTest extends TestCase
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

    public function testSome()
    {
        $stub=$this->getMockBuilder('Something')
                   ->getmock();
        //制定行为
        $stub->method('doSomething')
             ->willReturn('haha');
        //期望行为
        $this->assertEquals('haha',$stub->doSomething());
    }

    //参数作为结果返回
    public function argument()
    {
        $stub=$this->getMockBuilder('Something')
                   ->getMock();
        $stub->method('daSomething')
             ->will(returnArgument(0));

        $this->assertEquals('b',$stub->doSomething('a','b'));
    }

}
