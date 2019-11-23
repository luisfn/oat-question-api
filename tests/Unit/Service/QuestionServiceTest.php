<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\Service;

use Lfn\Oat\QuestionApi\Parser\QuestionInputParser;
use Lfn\Oat\QuestionApi\Service\QuestionService;
use Lfn\Oat\QuestionApi\Translator\Translator;
use PHPUnit\Framework\TestCase;

/**
 * Class QuestionServiceTest
 *
 * @package Lfn\Oat\QuestionApi\Test\Service
 */
class QuestionServiceTest extends TestCase
{
    /** @var QuestionService */
    private $subject;

    /** @var \PHPUnit\Framework\MockObject\MockObject */
    private $questionInputParser;

    /** @var \PHPUnit\Framework\MockObject\MockObject */
    private $translator;

    public function setUp(): void
    {
        $this->questionInputParser = $this->createMock(QuestionInputParser::class);
        $this->translator          = $this->createMock(Translator::class);

        $this->subject = new QuestionService($this->questionInputParser, $this->translator);
    }

    /**
     * @test
     */
    public function serviceShouldCallOnlyParse()
    {
        $this->translator->expects($this->never())->method('translate');
        $this->questionInputParser->expects($this->once())->method('parse');

        $this->subject->getQuestions(null);
    }

    /**
     * @test
     */
    public function serviceShouldCallOnlyParseAndTranslate()
    {
        $this->translator->expects($this->once())->method('translate');
        $this->questionInputParser->expects($this->once())->method('parse');

        $this->subject->getQuestions('pt');
    }
}