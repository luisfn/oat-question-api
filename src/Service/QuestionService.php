<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Service;

use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\Exception\CsvParseException;
use Lfn\Oat\QuestionApi\Exception\InputFileNotFoundException;
use Lfn\Oat\QuestionApi\Exception\InvalidInputTypeException;
use Lfn\Oat\QuestionApi\Exception\JsonParseException;
use Lfn\Oat\QuestionApi\Exception\TranslationException;
use Lfn\Oat\QuestionApi\Parser\QuestionInputParser;
use Lfn\Oat\QuestionApi\Translator\Translator;

/**
 * Class QuestionService
 *
 * @package Lfn\Oat\QuestionApi\Service
 */
class QuestionService
{
    /** @var QuestionInputParser */
    private $questionInputParser;

    /** @var Translator */
    private $translator;

    /**
     * QuestionService constructor.
     *
     * @param QuestionInputParser $questionInputParser
     * @param Translator          $translator
     */
    public function __construct(QuestionInputParser $questionInputParser, Translator $translator)
    {
        $this->questionInputParser = $questionInputParser;
        $this->translator          = $translator;
    }

    /**
     * @param string|null $lang
     *
     * @return QuestionCollection
     * @throws CsvParseException
     * @throws InputFileNotFoundException
     * @throws InvalidInputTypeException
     * @throws JsonParseException
     * @throws TranslationException
     */
    public function getQuestions(?string $lang): QuestionCollection
    {
        $collection = $this->questionInputParser->parse();

        if ($lang) {
            $this->translator->translate($collection, $lang);
        }

        return $collection;
    }
}
