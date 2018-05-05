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
    public $cost=2.5;

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
 * Test
 */
$coffee = new Express();
/**
 * @param $coffee
 * @param $func
 * @param $dress
 * @return mixed
 * 调用cost方法
 */
$func = function ($coffee, $func, $dress) {
    return $dress->cost($coffee, $func);
};
/**
 * @param $coffee
 * @return mixed
 * 返回一个对象
 */
$func0 = function ($coffee) {
    return $coffee;
};
$dress = new Moca();
$func1 = function ($coffee) use ($func0, $dress, $func) {
    return $func($coffee, $func0, $dress);
};
$dress = new Moca();
$func2 = function ($coffee) use ($func1, $dress, $func) {
    return $func($coffee, $func1, $dress);
};

$dress = new Whip();
$func3 = function ($coffee) use ($func2, $dress, $func) {
    return $func($coffee, $func2, $dress);
};
$coffee = $func3($coffee);

var_dump($coffee->cost());
?>


