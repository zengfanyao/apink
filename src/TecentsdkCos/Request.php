<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 18/3/6
 * Time: 下午4:18
 */

namespace Apink\TecentsdkCos;


use function curl_close;
use function curl_exec;
use function curl_init;
use function curl_setopt;
use Exception;
use function json_decode;
use function json_encode;
use const true;

class Request
{
    public $method=null;
    public $host=null;
    public $url=null;
    public $header=[];
    public $result;

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }


    public function __construct($config)
    {
        $this->host=$config['host'];
    }

    /**
     * @return array
     */
    public function getHeader($key)
    {
        return $this->header[$key];
    }

    /**
     * @param array $header
     */
    public function setHeader($key,$value)
    {
        $this->header[$key] = $value;
    }



    /**
     * @return null
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param null $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return null
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param null $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * 发送请求
     */
    public function curlHttp()
    {
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://'.$this->host.$this->url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$this->header);

        if (!$result=curl_exec($ch))
        {
            throw new Exception("error");
        }
        self::setResult(json_decode($result,true));
        curl_close($ch);
    }
}