<?php
/**
 * 程序变化的部分与不变化的部分
 * 观察者利用主题的接口向主题注册
 * 主题利用观察者接口通知观察者
 */
class Pager
{
    private $_observer=[];
    public function register(Observerable $sub)//注册观察者
    {
        # code...
        $this->_observer[]=$sub;
        print_r($this->_observer);
    }
    public function trigger()
    {
        # code...
        if (!empty($this->_observer))
        {
            foreach ($this->_observer as $key => $value) {
                # code...
                $value->update();
            }
        }
    }
}
interface Observerable
{
    public function update();
}
/**
 * 观察者1
 */
class Subscriber implements Observerable 
{
    public function update()
    {
        # code...
        echo " callback";
    }
}
/**
 * 观察者2
 */
class Subscriber1 implements Observerable
{
    public function update()
    {
        # code...
        echo "Subscirber2 update";
    }
}
/**
 * Test
 */
$pager=new Pager();
$pager->register(new Subscriber()); //向主题注册观察者
$pager->register(new Subscriber1()); //向主题注册观察者
$pager->trigger();
?>