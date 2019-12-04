<?php


namespace App\Message;


class MyMessage
{
    /**
     * @var string
     */
    private $content;

    /**
     * MyMessage constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}