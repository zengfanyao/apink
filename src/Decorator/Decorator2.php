<?php
/**
 * 被装饰者基类
 */
interface Component
{
    public function operation();
}
/**
 * 具体被装饰者类
 */
class ConcreteComponent implements Component{
    public function operation(){
        echo "加了被装饰者";
    }
}
/**
 * 装饰者基类
 */
abstract class Decorator implements Component
{
    private $component;
    public function __construct($component)
    {
        $this->component=$component;
    }
    public function operation()
    {
        $this->component->operation();
    }
}
class ConcreteDecoratorA extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }
    public function operation()
    {
        parent::operation();
        $this->addOperationA();//新加的操作
    }
    public function addOperationA()
    {
        echo "又加了A个性化装饰";
    }
}
class ConcreteDecoratorB extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }
    public function operation()
    {
        parent::operation();
        $this->addedOperationB();
    }
    public function addedOperationB()
    {
        echo "又加了B个性化装饰";
    }
}
$decoratorA=new ConcreteDecoratorA(new ConcreteComponent());
$decoratorA->operation();
$decoratorB=new ConcreteDecoratorB($decoratorA);
$decoratorB->operation();

?>