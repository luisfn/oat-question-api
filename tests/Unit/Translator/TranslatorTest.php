<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\Translator;

use Lfn\Oat\QuestionApi\Collection\ChoiceCollection;
use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\DataObject\Choice;
use Lfn\Oat\QuestionApi\DataObject\Question;
use Lfn\Oat\QuestionApi\Translator\Translator;
use PHPUnit\Framework\TestCase;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslatorTest extends TestCase
{
    /** @var Translator */
    private $subject;

    /** @var GoogleTranslate */
    private $googleTranslate;

    public function setUp(): void
    {
        $this->googleTranslate = $this->createMock(GoogleTranslate::class);
        $this->subject         = new Translator($this->googleTranslate);
    }

    /**
     * @test
     */
    public function shouldNotCallTranslateForEmptyCollection()
    {
        $collection = $this->createMock(QuestionCollection::class);
        $collection->expects($this->once())->method('getAll')->willReturn([]);

        $this->googleTranslate->expects($this->once())->method('setTarget')->with('pt');
        $this->googleTranslate->expects($this->never())->method('translate');

        $this->subject->translate($collection, 'pt');
    }

    /**
     * @test
     */
    public function shouldCallTranslateForCollectionWithItems()
    {
        $choice = $this->createMock(Choice::class);
        $choice->expects($this->once())->method('getText')->willReturn('c');

        $collection = $this->createMock(ChoiceCollection::class);
        $collection->expects($this->once())->method('getAll')->willReturn([$choice]);

        $question = $this->createMock(Question::class);
        $question->expects($this->once())->method('getText')->willReturn('q');
        $question->expects($this->once())->method('getChoices')->willReturn($collection);

        $collection = $this->createMock(QuestionCollection::class);
        $collection->expects($this->once())->method('getAll')->willReturn([$question]);

        $this->googleTranslate->expects($this->once())->method('setTarget')->with('pt');
        $this->googleTranslate->expects($this->exactly(2))->method('translate');

        $this->subject->translate($collection, 'pt');
    }
}