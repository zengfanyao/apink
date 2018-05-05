<?

interface Coffee
{
    public function cost();
}

/**
 * Class Express
 * 原本基础类
 */
class Express implements Coffee
{
    public $cost = 2.5;

    public function cost()
    {
        return $this->cost;
    }
}

/**
 * Class Dressing
 * 装饰
 */
class Dressing
{
    public function cost(Express $express, Closure $closure)
    {
//        var_dump('dress');
        return $express;
    }
}

class Whip extends Dressing
{

    public function cost(Express $express, Closure $closure)
    {
//        var_dump('whip');
        $express->cost = $express->cost + 0.1;
        return $closure($express);
    }
}

class  Moca extends Dressing
{
    public function cost(Express $express, Closure $closure)
    {
//        var_dump('moca');
        $express->cost = $express->cost + 0.5;
        return $closure($express);
    }
}

/**
 *
 *
 */
$coffee = new Express();

$func = function ($coffee, $func, $dress) {
    return $dress->cost($coffee, $func);
};


$fuc = function ($fuc, $dressing) use ($fun) {
    return $fun;
};
$fuc0 = function ($coffee) {
    return $coffee;
};
$fucn =array_reduce([(new Moca()),(new Moca()),(new Whip())],$fuc,$fuc0);
$coffee = $fucn($coffee);
print_r($coffee->cost());


?>


