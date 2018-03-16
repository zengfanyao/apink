<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/15
 * Time: 下午8:37
 */
interface  shop
{
    public function buy($title);

}

class CDshop implements shop
{
    public function buy($title)
    {
        echo "购买成功";
    }
}

class Proxy implements shop
{
    public function buy($title)
    {
        $this->go();
    }
    public function go()
    {
        echo '跑去香港代购';
    }
}