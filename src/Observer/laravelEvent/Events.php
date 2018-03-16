<?php
namespace Apink\Observer\laravelEvent;
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/16
 * Time: 上午11:29
 * 被观察者即事件
 */
class Events
{
    public $author;
    public  function __construct()
    {
        $this->author = 'zhaohehe';
    }
}