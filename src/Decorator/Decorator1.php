<?php
/**
 * Beverage 相当于一个组件
 */
abstract class Beverage{
    private $descration='unknown beverage';
    /**
     * Get the value of descration
     */ 
    public function getDescration()
    {
        return $this->descration;
    }
    public abstract function cost();
}
/**
 * 装饰者类
 */
abstract class CondimentDecorator  extends Beverage{

    public function cost()
    {
        return 0.05;
    }
}
/*
 * 饮料
 */
class Espresso extends Beverage{
    public $descration=null;
    public function __construct(){
        $this->descration="Espresso";
    }
    public function cost(){
        return 1.99;
    }
}
class HouseBlend extends Beverage{
    public $descration=null;
    public function __construct(){
        $this->descration="House Blend Coffee";
    }
    public function cost(){
        return 0.89;
    }
}

class Decaf extends Beverage{
        public $descration=null;
    public function __construct(){
        $this->descration="Deaf";
    }
    public function cost(){
        return 1.05;
    }
}
class Mocha extends CondimentDecorator{
    public $beverage=null;
    public function __construct(Beverage $beverage)
    {
        $this->beverage=$beverage;
    }
    public function getDescration()
    {
       return $this->beverage->getDescration()+',Mocha';
    }
    public function cost()
    {
        return 0.20+ $this->beverage->cost();
    }
}
class Soy extends CondimentDecorator
{
    public $beverage=null;
    public function __construct(Beverage $beverage)
    {
        $this->beverage=$beverage;
    }
    public function getDescration()
    {
        return $this->beverage->getDescration();
    }
    public function cost()
    {
        return 0.5+$this->beverage->cost();
    }
}

$HouseBlend=new HouseBlend();
$espress=new Espresso($HouseBlend);
print_r($espress->getDescration());
$beverage=new Mocha($HouseBlend);
$beverage=new Soy($HouseBlend);

?>