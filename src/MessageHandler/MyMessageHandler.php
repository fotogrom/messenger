<?php


namespace App\MessageHandler;


use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Message\MyMessage;

class MyMessageHandler implements MessageHandlerInterface
{
     public function __invoke(MyMessage $message)
    {
        try {
            $fp = fopen("public/messages.txt", "a");
           fwrite($fp,$message->getContent());
           fclose($fp);
          


        }catch (\Exception $e){echo $e->getMessage(); }


    }


}