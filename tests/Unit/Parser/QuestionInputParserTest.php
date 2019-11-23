<?php declare(strict_types=1);

use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\DataObject\Choice;
use Lfn\Oat\QuestionApi\DataObject\Question;
use Lfn\Oat\QuestionApi\Exception\InputFileNotFoundException;
use Lfn\Oat\QuestionApi\Exception\InvalidInputTypeException;
use Lfn\Oat\QuestionApi\Parser\QuestionCsvParser;
use Lfn\Oat\QuestionApi\Parser\QuestionInputParser;
use Lfn\Oat\QuestionApi\Parser\QuestionJsonParser;
use PHPUnit\Framework\TestCase;

/**
 * Class QuestionInputParserTest
 */
class QuestionInputParserTest extends TestCase
{
    /** @var QuestionCollection */
    private $questionCollection;

    public function setUp(): void
    {
        $this->questionCollection = new QuestionCollection();

        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', '2019-11-23 00:00:00');

        $question1 = new Question('q1', $dateTime);
        $question1->addChoice(new Choice('c1'));
        $question1->addChoice(new Choice('c2'));
        $question1->addChoice(new Choice('c3'));
        $question1->addChoice(new Choice('c4'));

        $question2 = new Question('q2', $dateTime);
        $question2->addChoice(new Choice('c1'));
        $question2->addChoice(new Choice('c2'));
        $question2->addChoice(new Choice('c3'));
        $question2->addChoice(new Choice('c4'));

        $this->questionCollection->add($question1);
        $this->questionCollection->add($question2);
    }
    
    /**
     * @test
     */
    public function shouldTrowExceptionIfInputDoesNotExist(): void
    {
        $subject = $this->prepareSubject('invalidfile.json');

        $this->expectException(InputFileNotFoundException::class);

        $subject->parse();
    }

    /**
     * @test
     */
    public function shouldTrowExceptionIfInputHasInvalidType(): void
    {
        $subject = $this->prepareSubject(__DIR__ . '/../../../tests/data/questions.xyz');

        $this->expectException(InvalidInputTypeException::class);

        $subject->parse();
    }

    /**
     * @test
     */
    public function shouldParseQuestionsInputInJsonFormat(): void
    {
        $subject = $this->prepareSubject(__DIR__ . '/../../../tests/data/questions.json');

        $this->assertEquals($this->questionCollection, $subject->parse());
    }

    /**
     * @test
     */
    public function shouldParseQuestionsInputInCsvFormat(): void
    {
        $subject = $this->prepareSubject(__DIR__ . '/../../../tests/data/questions.csv');

        $this->assertEquals($this->questionCollection, $subject->parse());
    }

    /**
     * @param string $path
     *
     * @return QuestionInputParser
     */
    private function prepareSubject(string $path): QuestionInputParser
    {
        return new QuestionInputParser(
            $path,
            new Symfony\Component\Filesystem\Filesystem(),
            new QuestionCsvParser(),
            new QuestionJsonParser()
        );
    }
}