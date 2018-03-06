<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/6
 * Time: 下午3:49
 */
namespace  Apink;

use function print_r;

class  TecentsdkCos
{
    private $secretId;
    private $secretKey;
    private $timeout;
    private $request;
    private $signature;
    public function __construct($config)
    {
        $this->secretId=$config['secretId'];
        $this->secretKey=$config['secretKey'];
        $this->request=new \Apink\TecentsdkCos\Request($config['host']);
        $this->signature=new \Apink\TecentsdkCos\Signature($this->secretId,$this->secretKey);
    }


    public function getSignature()
    {
        $this->signature->signRequest($this->request);
    }

    public function getObject($uri,$httpMethod)
    {
        $this->request->setUrl($uri);
        $this->request->setMethod($httpMethod);
        self::getSignature();

        $this->request->curlHttp();
        print_r($this->request->getResult());

    }
}