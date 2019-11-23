<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Exception;

use Exception;

/**
 * Class CsvParseException
 *
 * @package Lfn\Oat\QuestionApi\Exception
 */
class CsvParseException extends Exception
{
    /**
     * CsvParseException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
