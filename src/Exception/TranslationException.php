<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Exception;

use Exception;

/**
 * Class TranslationException
 *
 * @package Lfn\Oat\QuestionApi\Exception
 */
class TranslationException extends Exception
{
    /**
     * TranslationException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
