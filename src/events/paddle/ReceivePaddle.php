<?php

namespace LogSea\events\paddle;


use LogSea\config\OptionPaddle;
use LogSea\config\OptionShip;

class ReceivePaddle extends BasePaddle
{
    public function listen($server, $fd, $from_id, $data){
        go(function () use($data) {
            $client = new \Swoole\Coroutine\Http\Client(OptionPaddle::$host, OptionShip::$port);
            $client->upgrade("/");
            $client->push($data);
        });
    }

}