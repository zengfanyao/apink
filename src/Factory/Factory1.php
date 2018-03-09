<?php
interface people
{
    public function jinhun();
}
class man implements people
{
    public function jinhun()
    {
        echo "送玫瑰，送戒指";
    }
}
class  women implements people
{
    public function jinhun()
    {
        echo "穿婚纱";
    }
}

class Simplefacotry 
{
    static function createMan()
    {
        return new man();
    }
    static function createWomen()
    {
        return new women();
    }
}
$man =Simplefacotry::createMan();
$man->jinhun();
$women=Simplefacotry::createWomen();
$man->jinhun();
?>