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
    public $cost =2.5;

    public function cost()
    {
        return $this->cost ;
    }
}

/**
 * Class Dressing
 * 装饰
 */
class Dressing
{
    public function cost(Express $express)
    {
        return $express;
    }
}

class Whip extends Dressing
{


    public function cost(Express $express)
    {
//        $express->cost();
        $express->cost = $express->cost + 0.1;
        return $express;

    }
}

class  Moca extends Dressing
{


    public function cost(Express $express)
    {
//        $express->cost();
        $express->cost = $express->cost + 0.5;
        return $express;
    }
}

$coffee = new Express();

$coffee = (new Moca())->cost($coffee);

$coffee = (new Moca())->cost($coffee);

$coffee = (new Whip())->cost($coffee);
print_r($coffee->cost);

?>