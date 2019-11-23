<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Exception;

use Exception;

/**
 * Class InputFileNotFoundException
 *
 * @package Lfn\Oat\QuestionApi\Exception
 */
class InputFileNotFoundException extends Exception
{
    /**
     * InputFileNotFoundException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
