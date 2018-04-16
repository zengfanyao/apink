<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/19
 * Time: 下午3:25
 */

namespace Apink\Factory\Connector;


class ConnectionFactory
{
    public function __construct() {

    }
    protected function createConnection($driver) {
        switch ($driver) {
            case 'mysql':
                break;
        }
    }
}