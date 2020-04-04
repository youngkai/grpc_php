# grpc_php

1.pecl install grpc
2.pecl install protobuf
3.git clone https://github.com/grpc/grpc
4.git submodule update --init
5.make grpc_php_plugin
6.cp ./grpc_php_plugin ~/go/bin/
7.composer require grpc/grpc
8.
syntax = "proto3";
package lotteryservice;
service Greeter {
    rpc lottery(lotteryReq) returns (lotteryRes){}
}

message lotteryReq {
    string param = 1;
}

message lotteryRes {
    string data = 1;
}
9.protoc --php_out=. --grpc_out=. --plugin=protoc-gen-grpc=/Users/youngk/go/bin/grpc_php_plugin ./*.proto 
10.
{
    "require": {
        "grpc/grpc": "^1.27"
    },
    "autoload": {
        "psr-4": {
            "GPBMetadata\\":"GPBMetadata/",
            "Lotteryservice\\":"Lotteryservice/",
            "channel\\": "channel/"
        }
    }
}
11.mkdir channel
12.cd channel && touch channels.php
13.
<?php
namespace channel;

class channels
{
    public function lotteryService()
    {
        $client = new \Lotteryservice\GreeterClient('127.0.0.1:50052', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure()
        ]);

        return $client;
    }

}
14.
<?php

require __DIR__ . '/vendor/autoload.php';

$channels = new channel\channels();

$lotteryClient = $channels->lotteryService();

$lotteryRequest = new \Lotteryservice\lotteryReq();

$lotteryRequest->setParam('{"一等奖": 10,"二等奖":20,"三等奖":30,"四等奖":40}');

$lottery_res = $lotteryClient->lottery($lotteryRequest)->wait();

list($reply, $status) = $lottery_res;

$data = $reply->getData();

var_dump($data);die;
