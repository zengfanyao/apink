<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/13
 * Time: 下午3:08
 */
abstract class Toy
{
    public abstract function openMouth();
    public abstract function closeMouth();
}
class Dog extends Toy
{
    public function openMouth()
    {
        // TODO: Implement openMouth() method.
        echo "Dog open Mouth\n";

    }
    public function closeMouth()
    {
        // TODO: Implement closeMouth() method.
        echo "Dog close Mouth\n";

    }


}
class Cat extends Toy
{
    public function openMouth()
    {
        // TODO: Implement openMouth() method.
        echo "Cat open Mouth\n";
    }
    public function closeMouth()
    {
        // TODO: Implement closeMouth() method.
        echo "Cat close Mouth\n";
    }
}
/**
 * 目标红枣遥控公司
 */
interface  RedTarget
{
    public function doMouthOpen();
    public function doMouthClose();
}

interface GreenTarget
{
    public function operateMouth($type=0);
}

class RedAdapter implements RedTarget
{
    private $adapter;
    public function __construct(Toy $adapter)
    {
        $this->adapter=$adapter;
    }
    public function doMouthOpen()
    {
        // TODO: Implement doMouthOpen() method.
        $this->adapter->openMouth();
    }
    public function doMouthClose()
    {
        // TODO: Implement doMouthClose() method.
        $this->adapter->closeMouth();
    }
}
class GreenDapter implements GreenTarget
{
    private $adapter;
    public function __construct(Toy $adapter)
    {
        $this->adapter=$adapter;
    }
    public function operateMouth($type = 0)
    {
        // TODO: Implement operateMouth() method.
        if ($type)
        {
            $this->adapter->openMouth();
        }else
        {
            $this->adapter->closeMouth();
        }
    }
}
class TestDriver
{
    public function run()
    {
        $adapter_dog=new Dog();
        echo "给狗套上红枣适配器";
        $adapter_red = new RedAdapter(($adapter_dog));
        $adapter_red->doMouthOpen();
        $adapter_red->doMouthClose();
        echo "给狗套上绿枣适配器";
        $adapter_green = new GreenDapter($adapter_dog);
        $adapter_green->operateMouth(1);
        $adapter_green->operateMouth(0);

    }
}