<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/13
 * Time: 下午3:31
 */
abstract class Toy
{
    public abstract function openMouth();
    public abstract function closeMouth();
    //为红枣遥控公司控制接口增加doMouthOpen();
    public abstract function doMouthOpen();
    //为红枣公司增加doMouthClose();
    public abstract function doMouthClose();
}

class Dog extends Toy
{
    public function openMouth()
    {

    }
    public function closeMouth()
    {

    }
    //增加的方法
    public function doMouthOpen()
    {
        $this->doMouthOpen();
    }
    //增加的方法
    public function doMouthClose()
    {
        $this->doMouthClose();
    }
}