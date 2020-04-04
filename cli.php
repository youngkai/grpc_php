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