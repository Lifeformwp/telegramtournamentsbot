<?php


namespace APIAnswer;


class AnswerController
{
    public function __construct()
    {
        return 'Hello world';
    }
    
    public function __toString()
    {
        return 'Hello there';
    }
}