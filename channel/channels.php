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