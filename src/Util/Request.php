<?php


namespace cccdl\apple_sdk\Util;


use cccdl\apple_sdk\Exceptions\cccdlException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * 请求服务类
 * Trait Request
 * @package cccdl\apple_sdk\Util
 */
trait Request
{

    /**
     * post请求
     * @return mixed
     * @throws GuzzleException
     * @throws cccdlException
     */
    protected function get($url, $param)
    {

        //创建客户端
        $client = $this->createClient();

        $response = $client->get($url);

        var_dump($response->getStatusCode());
        var_dump($response->getBody());

        if ($response->getStatusCode() != 200) {
            throw new cccdlException('请求失败: ' . $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }
}
