<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Exception;

use Exception;

/**
 * Class InvalidPositionException
 *
 * @package Lfn\Oat\QuestionApi\Exception
 */
class InvalidPositionException extends Exception
{
    /**
     * InvalidPositionException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
