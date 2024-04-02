<?php

namespace App\Exception;

use Hyperf\Server\Exception\ServerException;

class ApiException extends ServerException
{
    public function __construct($message='', $code=5000, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}