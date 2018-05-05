<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/16
 * Time: 上午10:15
 */
class LoginSubject implements SplSubject
{
    public $observer,$value,$hobby,$address;

    public function __construct()
    {
        $this->observer = new SplObjectStorage();
    }

    public function login()
    {
        $this->notify();
    }

    public function attach(SplObserver $observer)
    {
        $this->observer->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
        $this->observer->detach($observer);
    }

    public function notify()
    {

        if (!empty($this->observer)&& is_object($this->observer))
        {
            foreach ($this->observer as $k => $v)
            {
                $v->update($this);
            }
        }
    }
}
class User1Observers implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo " 我是一级用户";
    }
}
class User2Observers implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo "我是二级用户";
    }
}
class CommonObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo "我是普通用户";
    }
}

$subject = new LoginSubject();
$commonObservers = new CommonObserver();
$subject->attach($commonObservers);
$subject->attach(new User1Observers());
$subject->attach(new User2Observers());
$subject->login();
