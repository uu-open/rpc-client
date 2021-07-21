<?php

namespace UU\RPC;

use Hyperf\RpcClient\AbstractServiceClient;


/**
 * Class User
 * @package App\Service
 */
class RPCServiceClient extends AbstractServiceClient
{
    /**
     * 定义对应服务提供者的服务名称
     * @var string
     */
    protected $serviceName = '';
    protected $protocol = 'jsonrpc-http';

    public function __call($name, $arguments = [])
    {
        if (empty($this->serviceName)) {
            $this->serviceName = class_basename(static::class);
        }
        return $this->__request($name, $arguments);
    }

}