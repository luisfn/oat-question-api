<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Exception;

use Exception;

/**
 * Class JsonParseException
 *
 * @package Lfn\Oat\QuestionApi\Exception
 */
class JsonParseException extends Exception
{
    /**
     * JsonParseException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
