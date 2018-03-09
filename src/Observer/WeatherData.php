<?php

/**
 * 主题接口
 */
interface  Subject
{
    //注册观察者
    public function registerObserver(Observer $o);
    //删除观察者
    public function removeObserver(Observer $o);
    //当主题发生状态变化是，此方法被调用，以通知所有的观察者
    public function notifyObserver();

}

interface Observer
{
    public function update($temp,$humidity,$pressure);
}

interface DisplayElement
{
    public function display();
}

class WeatherData implements Subject
{
    public $arrList=[];
    public $humidity;
    public $temperature;
    public $pressure;

    public function __construct()
    {
    }

    public function registerObserver(Observer $o)
    {
        // TODO: Implement registerObserver() method.
        $this->arrList[]=$o;
    }
    public function removeObserver(Observer $o)
    {
        // TODO: Implement removeObserver() method.
        if ($k=array_search($o,$this->arrList))
        {
           unset($this->arrList[$k]);
        }
    }
    public function notifyObserver()
    {
        // TODO: Implement notifyObserver() method.
        foreach ($this->arrList as $v)
        {
            $v->update($this->temperature,$this->humidity,$this->pressure);
        }
    }
    public function setMeasurements($temperature,$humidity,$pressure)
    {
        $this->temperature=$temperature;
        $this->humidity=$humidity;
        $this->pressure=$$pressure;

    }
    
}
class CurrewntConditionDisplay implements Observer,DisplayElement
{
    private $temperature;
    private $humidity;
    private $weatherData;
    
    public function __construct($weatherData)
    {
        $this->weatherData=$weatherData;
        $this->weatherData->registerObserver($this);
    }

    public function display()
    {
        print_r("数据");
    }
    public function update($temp,$humidity,$pressure)
    {
        # code...
        $this->temperature=$temp;
        $this->humidity=$humidity;
        $this->display();
    }
}