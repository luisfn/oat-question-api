<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

use Lfn\Oat\QuestionApi\Collection\QuestionCollection;

/**
 * Interface QuestionParserInterface
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
interface QuestionParserInterface
{
    /**
     * @return QuestionCollection
     */
    public function parse(): QuestionCollection;
}
