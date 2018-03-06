<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/6
 * Time: 下午5:15
 */

$condig=[
    'secretId'=>'AKIDxiOq31iFTSSEkzrYx60e18yYswjH32Xn',
    'secretKey'=>'99uWt1vZy95mERO5XjfLlvqUs31lHYaM',
    'host' =>'zfy-1255516988.cosgz.myqcloud.com'
];

$client=new \Apink\TecentsdkCos($condig);
print_r($client->getObject('/1222/e135de1fa54927bb3cd499701ab87661.jpg','get'));
