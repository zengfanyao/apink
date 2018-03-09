<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/8
 * Time: 下午3:47
 * 抽象创建者类 子类实现里面的方法来制造产品，创建者不需要知道具体的产品
 */
 abstract  class PizzStore
{
    public final function orderPizza($type)
    {
        $pizza=$this->createPizza($type);
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
    }
    abstract function createPizza($type);
}

/**
 * 具体创造者类
 * NewYork风味的
 */
class NYPizzaStore extends PizzStore
{
    /**
     * @param $type
     * @return 工厂方法用来制造产品
     */
    public  function createPizza($type)
    {

        // TODO: Implement createPizza() method.
        if($type=='cheese')
        {
            $pizza=new NYStyleCheesePizza();
        }else if ($type=='chicago')
        {
            $pizza=new ChicagoStyleCheesePizza();
        }
        return $pizza;
    }
}


class ChinaPizzaStore extends PizzStore
{
    public function createPizza($type)
    {
        // TODO: Implement createPizza() method.
        if ($type=='cheese')
        {
            $pizza=new ChinaStyleCheesePizza();
        }
        return $pizza;
    }
}

/**
 * 产品类 工厂生产产品，对于PizzaStore来说，产品就是Pizza
 */
class Pizza
{
    public $name;
    public $dough;
    public $sauce;
    public $arr=[];

    public function prepare()
    {
        print_r('Preparing'.$this->name);
        print_r('Tossing dough');
        print_r('Adding toppings');
        foreach ($this->arr as $k=>$v)
        {
            print_r($v);
        }

    }
    public function bake()
    {
        print_r("Bake for 25 minutes at 350\n");
    }

    public function cut()
    {
        print_r("Cutting the Pizza into diagonal slices\n");
    }

    public function box()
    {
        print_r("Place pizza in offical PizzaStore box\n");
    }

    public function getName()
    {
        return $this->name;
    }
}

/**
 * 具体的产品，所有店里能实际制造的Pizza都在这里
 */
class  NYStyleCheesePizza extends Pizza
{
    public function __construct()
    {
        $this->name="NY Style Sauce and cheese Pizza";
        $this->dough="Thin crust Dough";
        $this->sauce='Marinare Sauce';
        $this->arr[0]="Grate3d Reggiano Cheese";
    }
}

class ChicagoStyleCheesePizza extends Pizza
{
    public function __construct()
    {
        $this->name="Chicago style Deep Dish Pizza";
        $this->dough="Extra Thin crust Dough";
        $this->sauce='Plum Tomato Sauce';
        $this->arr[0]="Sharedd Mozzarella Cheese";
    }
    public function cut()
    {
        print_r('Cutting the pizz int square slices');
    }
}

class ChinaStyleCheesePizza extends Pizza
{
    public function __construct()
    {
        $this->name="China style Deep Dish Pizza";
        $this->dough="Extra Thin crust Dough";
        $this->sauce='Plum Tomato Sauce';
        $this->arr[0]="Sharedd Mozzarella Cheese";
    }

    public function cut()
    {
        print_r('cut china style');
    }
}
/**
 * test
 */

$newYork=new NYPizzaStore();

$pizza=$newYork->createPizza('cheese');
$newYork->orderPizza('cheese');

print_r('---------------------------');
$chicago=$newYork->createPizza('chicago');
$newYork->orderPizza('chicago');

print_r('-------------------------');
$china=new ChinaPizzaStore();
$pizza=$china->createPizza('cheese');













