<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\DataObject;

use DateTime;
use Lfn\Oat\QuestionApi\Collection\ChoiceCollection;
use Lfn\Oat\QuestionApi\DataObject\Question;
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
        $question = new Question('text', $dateTime);
        $choices  = new ChoiceCollection();

        $this->assertSame('text', $question->getText());
        $this->assertSame($dateTime, $question->getCreatedAt());
        $this->assertEquals($choices, $question->getChoices());
    }
}