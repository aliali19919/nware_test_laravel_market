<?php

namespace App\Logging;

use Illuminate\Support\Facades\Http;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

class CustomLogger extends AbstractProcessingHandler
{
    protected function write(LogRecord $record): void
    {
        $data=$record->toArray();
        $name=$data["context"]["name"]??"N/A";
        Http::post("http://127.0.0.1:8001/api/logs",["level"=>$data["level_name"],"message"=>$data["message"],"levelNum"=>$data["level"],"context"=>$name]);
    }

    public function __invoke(array $config)
    {
  $logger=new Logger("mylog");
  $logger->pushHandler($this);
  return $logger;
    }
}
