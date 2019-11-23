<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

use Lfn\Oat\QuestionApi\Collection\QuestionCollection;

/**
 * Class QuestionJsonParser
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
class QuestionJsonParser
{
    /**
     * @return QuestionCollection
     */
    public function parse(): QuestionCollection
    {
        return new QuestionCollection();
    }
}
