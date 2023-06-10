<?php

namespace EmadMohammed\WHMAPI\utilities;

class RegEx
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }


    public function isIP4()
    {
        return preg_match('/^([12]?[0-9]{1,2}\.)([12]?[0-9]{1,2}\.)([12]?[0-9]{1,2}\.)([12]?[0-9]{1,2})$/', $this->value);
    }




}