<?php
/**
 * 在不必改变原类文件和使用继承的情况下，动态地扩展一个对象的功能。它是通过创建一个包装对象，也就是装饰来包裹真实的对象。
 */
/**
 * Coffee基类
 */
abstract class Coffee
{
    /**
     * 返回价格
     */
    public abstract function getPrice();
    /**
     * 返回名字
     */
    public abstract function getName();
}

class SimpleCoffee extends Coffee 
{
    public function getPrice()
    {
        return 10;
    }
    public function getName()
    {
        return "simple Coffee";
    }
}
abstract class Decorator extends Coffee 
{
    public $coffee;
    public function __construct(Coffee $coffee)
    {
        $this->coffee=$coffee;
    }
}
class MilkDecorator extends Decorator
{
    public function __construct(Coffee $coffee)
    {
        parent::__construct($coffee);
    }
    public function getPrice()
    {
        return $this->coffee->getPrice()+10;
    }
    public function getName()
    {
        return $this->coffee->getName().'加了牛奶';
    }
}

class SugarDecorator extends Decorator
{
    public function __construct(Coffee $coffee)
    {
        parent::__construct($coffee);
    }
    public function getPrice()
    {
        return $this->coffee->getPrice()+5;
    }
    public function getName()
    {
        return $this->coffee->getName()."加了糖";
    }
}
$mcoffee=new SimpleCoffee();
print_r($mcoffee->getPrice());
$mcoffee=new MilkDecorator($mcoffee);
print_r($mcoffee->getPrice());
print_r($mcoffee->getName());

$mcoffee=new SugarDecorator($mcoffee);
print_r($mcoffee->getPrice());
print_r($mcoffee->getName());


?>