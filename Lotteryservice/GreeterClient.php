<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Lotteryservice;

/**
 */
class GreeterClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Lotteryservice\LotteryReq $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function lottery(\Lotteryservice\LotteryReq $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/lotteryservice.Greeter/lottery',
        $argument,
        ['\Lotteryservice\LotteryRes', 'decode'],
        $metadata, $options);
    }

}
