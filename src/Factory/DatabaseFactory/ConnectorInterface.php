<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/19
 * Time: 下午3:13
 */

namespace Apink\Factory\Connector;


interface ConnectorInterface
{
    public function connect(array $config);
}