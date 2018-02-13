<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Subject
{
    protected $observer=array();
    public function attach(Observer $observe)
    {
        $this->observer[]=$observe;
    }
    public function doSomething()
    {
        //通知观察者
        $this->notify('something');
    }
    public function notify($str)
    {
        foreach($this->observer as $observer){
            $observer->update($str);
        }
    }
    public function doSomethingBad()
    {
        foreach($this->observer as $observer){
            $observer->reportError(42,'something bad happened',$this);
        }
    }
}
class Observer
{
    public function update($str)
    {

    }
    public function reportError($code,$message)
    {

    }
}
//测试
class MockTest extends TestCase
{
   public function testMock()
   {
      //获取Observer的mock 并进行预期和配置
       $stub=$this->getMockBuilder('Observer')
                  ->setMethods(['update'])
                  ->getMock();
       $stub->expects($this->once())
            ->method('update');

       //实例化subject 对象去调用方法触发update()方法
       $object=new Subject();
       $object->attach($stub);
       $object->notify('something');

   }
 //数组方式约束参数
    public function testWith()
    {
        $mock=$this->getMockBuilder('Observer')
                   ->setMethods(['reportError'])
                   ->getmock();
        $mock->expects($this->exactly(2))
             ->method('reportError')
             ->withConsecutive(array($this->equalTo('foo'),$this->greaterThan(0)),
                               array($this->equalTo('gg'),$this->greaterThan(0))
                              );
        $mock->reportError('foo',22);
        $mock->reportError('gg',22);
    }


}
