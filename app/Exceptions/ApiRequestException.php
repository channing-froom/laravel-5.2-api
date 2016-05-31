<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

/**
 * Class ApiRequestException
 * @package VictorCMS\Exceptions
 */
class ApiRequestException extends Exception
{
    /** @var array */
    private $validationErrors;

    /**
     * Constructor
     *
     * @param string $message
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function setValidationErrors(MessageBag $validationErrors = null)
    {
        $this->validationErrors = $validationErrors->toArray();
    }

    public function getValidationErrors()
    {
        return $this->validationErrors;
    }
}
