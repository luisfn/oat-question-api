<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\DataObject;

use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class QuestionTest
 *
 * @package Lfn\Oat\QuestionApi\Test\DataObject
 */
class QuestionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreateQuestionProperly(): void
    {
        $dateTime = new DateTime();
        $question = new Question('Test', $dateTime);
        $choices  = new ChoiceCollection();

        $this->assertSame('text', $question->getText());
        $this->assertSame($dateTime, $question->getCreatedAt());
        $this->assertSame($choices, $question->getChoices());
    }
}