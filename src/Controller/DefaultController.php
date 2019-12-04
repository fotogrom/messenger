<?php


namespace App\Controller;


use App\MessageHandler\MyMessageHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Message\MyMessage;
use Symfony\Component\Messenger\Stamp\HandledStamp;


class DefaultController extends AbstractController
{
    private $envelope;

    /**
     * @Route("/", name="homepage")
     */
    public function index(MessageBusInterface $bus)
    {
        $inputMessage = 'какой-то текст';
        $this->envelope = $bus->dispatch(new MyMessage($inputMessage));

        return new Response($this->render('Messages/index.html.twig',['inputMessage'=>$inputMessage]));
    }

    /**
     * @Route("/receive", name="receive_message")
     *
     */
    public function receive()
    {
        $fp = fopen("messages.txt","r");
        $message = fread($fp,4096);
        $message.="\r\n";
        return new Response($this->render("Messages/receive.html.twig",['message'=>$message]));
        fclose($fp);
    }
}