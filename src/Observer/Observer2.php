<?php
/**
 * 其实观察者模式这是一种较为容易去理解的一种模式吧，它是一种事件系统，意味  
  *着这一模式允许某个类观察另一个类的状态，当被观察的类状态发生改变的时候，  
  *观察类可以收到通知并且做出相应的动作;观察者模式为您提供了避免组件之间 
  *紧密耦合的另一种方法 
 */

 /**
  * 抽象主题角色
  */
interface Subject{
    //添加一个新的观察者对象
    public function attach(Observer $observers);
    //删除一个已经注册过得观察者对象
    public function detach(Observer $observers);
    //通知所有已经注册过得观察者对象
    public function notifyObservers();
}
/**
 * 具体主题角色
 */
class ConcreteSubject implements Subject{
    private $_observers;
    public function __construct(){
        $this->_observers=[];
    }
    public function attach(Observer $observers){
        array_push($this->_observers,$observers);
    }
    public function detach(Observer $observers){
        $index=array_search($observers,$this->_observers);
        if ($index===FALSE || !array_key_exists($index,$this->_observers)){
            return FALSE;
        }
        unset($this->_observers[$index]);
        return TRUE;
    }
    public function notifyObservers(){
        if (!is_array($this->_observers)){
            return FALSE;
        }
        foreach ($this->_observers as $key => $observers) {
            # code...
            $observers->update();
        }
    }
    public function getObject()
    {
        return $this->_observers;
    }
}
interface Observer{
    public function update();
}
class ConcreteObserver implements Observer{
    private $_name;
    public function __construct($name){
        $this->_name=$name;
    }
    public function update()
    {
        echo('observer'.$this->_name." has notified\n");
    }
}
$subject=new ConcreteSubject();
$observer1=new ConcreteObserver("观察者1");
$observer2=new ConcreteObserver("观察者2");
$subject->attach($observer1);
$subject->attach($observer2);
$subject->notifyObservers();
print_r('-----------------------');
if ($subject->detach($observer1))
{
    echo 'success';
}else 
{
    echo "failed";
}
print_r($subject->getObject());
$subject->notifyObservers();
?>