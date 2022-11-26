<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidClientException extends \Exception
{
    
    public static function invalidName(): InvalidClientException
    {
        return new static ('invalid company name', Response::HTTP_BAD_REQUEST);
    }

}