<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/6
 * Time: 下午4:08
 */

namespace Apink\TecentsdkCos;
use \Apink\TecentsdkCos\Request;
use function hash_hmac;
use function strtolower;
use function time;
use function urldecode;

class Signature
{
    private $secretId=null;
    private $secretKey=null;


    public function __construct($secretId,$secretKey)
    {
        $this->secretId=$secretId;
        $this->secretKey=$secretKey;
    }
    public function signRequest(Request $request)
    {
        $signTime=((string)(time()-60)).';'.((string)(time()+3600));
        $httpString=strtolower($request->getMethod()).'\n'.urldecode($request->getUrl())
            .'\n\nhost='.$request->getHost().'\n';
        $sha1edHttpString=sha1($httpString);
        $stringToSign="sha1\n$signTime\n$sha1edHttpString\n";
        $signKey=hash_hmac('sha1',$signTime,$this->secretKey);
        $signature=hash_hmac('sha1',$stringToSign,$signKey);
        $authorization = 'q-sign-algorithm=sha1&q-ak='. $this->secretId .
            "&q-sign-time=$signTime&q-key-time=$signTime&q-header-list=host&q-url-param-list=&" .
            "q-signature=$signature";

        $request->setHeader('Authorization',$authorization);
    }

}