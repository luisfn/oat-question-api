<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Exception;

use Exception;

/**
 * Class InvalidInputTypeException
 *
 * @package Lfn\Oat\QuestionApi\Exception
 */
class InvalidInputTypeException extends Exception
{
    /**
     * InvalidInputTypeException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
