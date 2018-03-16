<?php
/**
 * 经典的单价模式
 */
class Singleton
{
    private static $singleton=null;
    public static function getInstance()
    {
        if (self::singleton==null)
        {
            self::singleton=new Singleton();
        }else 
        {
            return self::singleton;
        }
    }
}