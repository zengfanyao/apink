<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/16
 * Time: 下午12:13
 */

namespace Apink\Observer\laravelEvent;


abstract  class ServiceProvider
{
    protected $app;

    public static $publicshes = [];

    public function __construct($app)
    {
        $this->app = $app;
    }
}