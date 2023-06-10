<?php

namespace EmadMohammed\WHMAPI\exceptions;

class ResponseException extends \Exception
{

    public $response ;
    public function __construct($response , $code = 0 , $message = "" , $previous = null)
    {
        $this->response = $response ;
        parent::__construct($message, $code, $previous);
    }
}