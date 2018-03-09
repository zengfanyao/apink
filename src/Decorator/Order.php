<?php
abstract class Goods
{
    abstract function getPrice();
    abstract function getName();
}
/**
 * 装饰者基类
 */
abstract class  Decorator extends Goods 
{
    public $goods=null;
    public function __construct(Goods $goods)
    {
        $this->goods=$goods;
    }
}
/**
 * 基本商品
 */
class BaseGoods extends Goods
{
    public function getPrice()
    {
        return 0.5;
    }
    public function getName()
    {
        return "base goods";
    }
}
class SugareDecorator extends Decorator
{
    public function getPrice()
    {
        return $this->goods->getPrice()+0.5;
    }
    public function getName()
    {
        return $this->goods->getName(). 'add sugare';
    }
}
class MilkDecorator extends Decorator
{
    public function getPrice()
    {
        return $this->goods->getPrice() + 0.5;
    }
    public function getName()
    {
        return $this->goods->getName().' add milk';
    }
}
$basegoods=new BaseGoods();
$basegoods=new SugareDecorator($basegoods);
print_r($basegoods->getPrice());
print_r($basegoods->getName());

$basegoods=new MilkDecorator($basegoods);
print_r($basegoods->getPrice());
print_r($basegoods->getName());

?>