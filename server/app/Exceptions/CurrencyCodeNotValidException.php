<?php

namespace App\Exceptions;

use Exception;

class CurrencyCodeNotValidException extends \Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        $message .= " is not a valid currency";
        parent::__construct($message, $code, $previous);
    }
}
