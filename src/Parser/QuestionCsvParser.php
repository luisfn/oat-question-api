<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

use Lfn\Oat\QuestionApi\Collection\QuestionCollection;

/**
 * Class QuestionCsvParser
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
class QuestionCsvParser implements QuestionParserInterface
{
    /**
     * @return QuestionCollection
     */
    public function parse(): QuestionCollection
    {
        return new QuestionCollection();
    }
}
