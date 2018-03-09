<?php
/**
 * 工厂模式
 */
interface people
{
    function jinhun();
}
class man implements people 
{
    public function jinhun()
    {
        echo("送玫瑰，送戒指");
    }
}
class women implements people
{
    public function jinhun()
    {
        echo "穿婚纱";
    }
}
/**
 * 此处是与简单工厂区别本质所在，将对象的创建抽象成一个接口
 */
interface createMan
{
    function create();
}
class FactoryMan implements createMan
{
    public function create()
    {
        return new man();
    }
}
class FactoryWomen implements createMan
{
    public function create()
    {
        return new women();
    }
}
/**
 * test
 */
class Client{
    function test()
    {
        $factory=new FactoryMan();
        $man=$factory->create();
        $man->jinhun();

        $factory = new FactoryWomen();
        $man = $factory->create();
        $man->jinhun();

    }
}
$client=new Client();
$client->test();
?>