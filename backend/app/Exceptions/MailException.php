<?php

namespace App\Exceptions;

use Exception;

class MailException extends Exception
{
    protected $code = 403;
}
