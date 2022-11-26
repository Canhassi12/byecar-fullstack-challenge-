<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidClientIdException extends \Exception
{
    
    public static function invalidId(): InvalidClientIdException
    {
        return new static ('invalid client ID', Response::HTTP_BAD_REQUEST);
    }

}